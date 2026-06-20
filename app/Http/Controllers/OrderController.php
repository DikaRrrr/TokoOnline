<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Midtrans\Snap;
use Midtrans\Config;

class OrderController extends Controller
{
    // --- Backend Order Management ---

    public function statusProses()
    {
        $order = Order::whereIn('status', ['Paid', 'Kirim'])->orderBy('id', 'desc')->get();
        return view('backend.v_pesanan.proses', [
            'judul' => 'Data Transaksi',
            'subJudul' => 'Pesanan Proses',
            'index' => $order
        ]);
    }

    public function statusSelesai()
    {
        $order = Order::where('status', 'Selesai')->orderBy('id', 'desc')->get();
        return view('backend.v_pesanan.selesai', [
            'judul' => 'Data Transaksi',
            'subJudul' => 'Pesanan Selesai',
            'index' => $order
        ]);
    }

    public function statusDetail($id)
    {
        $order = Order::findOrFail($id);
        return view('backend.v_pesanan.detail', [
            'judul' => 'Data Transaksi',
            'subJudul' => 'Detail Pesanan',
            'order' => $order,
        ]);
    }

    public function statusUpdate(Request $request, string $id)
    {
        $order = Order::findOrFail($id);
        
        $rules = ['alamat' => 'required'];
        if ($request->status != $order->status) $rules['status'] = 'required';
        if ($request->noresi != $order->noresi) $rules['noresi'] = 'required';
        if ($request->pos != $order->pos) $rules['pos'] = 'required';

        $validatedData = $request->validate($rules);
        Order::where('id', $id)->update($validatedData);

        return redirect()->route('pesanan.proses')->with('success', 'Data berhasil diperbaharui');
    }

    // --- Cart & Checkout Management ---

    public function addToCart($id)
    {
        $customer = Customer::where('user_id', Auth::id())->first();
        $produk = Produk::findOrFail($id);

        $order = Order::firstOrCreate(
            ['customer_id' => $customer->id, 'status' => 'pending'],
            ['total_harga' => 0]
        );

        $orderItem = OrderItem::firstOrCreate(
            ['order_id' => $order->id, 'produk_id' => $produk->id],
            ['quantity' => 1, 'harga' => $produk->harga]
        );

        if (!$orderItem->wasRecentlyCreated) {
            $orderItem->increment('quantity');
        }

        $order->increment('total_harga', $produk->harga);

        return redirect()->route('order.cart')->with('success', 'Produk berhasil ditambahkan ke keranjang');
    }

    public function viewCart()
    {
        $customer = Customer::where('user_id', Auth::id())->first();
        $order = Order::with('orderItems.produk')
            ->where('customer_id', $customer->id)
            ->where('status', 'pending')
            ->first();

        return view('v_order.cart', compact('order'));
    }

    public function updateCart(Request $request, $id)
    {
        $customer = Customer::where('user_id', Auth::id())->first();
        $order = Order::where('customer_id', $customer->id)->where('status', 'pending')->first();

        if ($order) {
            $orderItem = $order->orderItems()->where('id', $id)->first();
            if ($orderItem) {
                $quantity = $request->input('quantity');
                if ($quantity > $orderItem->produk->stok) {
                    return redirect()->route('order.cart')->with('error', 'Jumlah produk melebihi stok');
                }
                
                // Recalculate total
                $order->total_harga -= ($orderItem->harga * $orderItem->quantity);
                $orderItem->update(['quantity' => $quantity]);
                $order->total_harga += ($orderItem->harga * $quantity);
                $order->save();
            }
        }
        return redirect()->route('order.cart')->with('success', 'Jumlah produk berhasil diperbarui');
    }

    public function checkout()
    {
        $customer = Customer::where('user_id', Auth::id())->first();
        $order = Order::where('customer_id', $customer->id)->where('status', 'pending')->first();

        if ($order) {
            foreach ($order->orderItems as $item) {
                if ($item->produk->stok >= $item->quantity) {
                    $item->produk->decrement('stok', $item->quantity);
                } else {
                    return redirect()->route('order.cart')->with('error', "Stok produk {$item->produk->nama_produk} tidak mencukupi");
                }
            }
            $order->update(['status' => 'completed']);
        }
        return redirect()->route('order.history')->with('success', 'Checkout berhasil');
    }

    public function orderHistory()
    {
        $customer = Customer::where('user_id', Auth::id())->first();
        $orders = Order::where('customer_id', $customer->id)
            ->whereIn('status', ['Paid', 'Kirim', 'Selesai'])
            ->orderBy('id', 'desc')
            ->get();
            
        return view('v_order.history', compact('orders'));
    }

    public function removeFromCart(Request $request, $id)
    {
        $customer = Customer::where('user_id', Auth::id())->first();
        $order = Order::where('customer_id', $customer->id)->where('status', 'pending')->first();

        if ($order) {
            $orderItem = OrderItem::where('order_id', $order->id)->where('produk_id', $id)->first();
            if ($orderItem) {
                $order->decrement('total_harga', $orderItem->harga * $orderItem->quantity);
                $orderItem->delete();
                if ($order->total_harga <= 0) $order->delete();
            }
        }
        return redirect()->route('order.cart')->with('success', 'Produk dihapus dari keranjang');
    }

    // --- Ongkir (RajaOngkir) ---

    public function getProvinces()
    {
        $response = Http::withHeaders(['key' => env('RAJAONGKIR_API_KEY')])
            ->get(env('RAJAONGKIR_BASE_URL') . '/province');
        return response()->json($response->json());
    }

    public function getCities(Request $request)
    {
        $response = Http::withHeaders(['key' => env('RAJAONGKIR_API_KEY')])
            ->get(env('RAJAONGKIR_BASE_URL') . '/city', ['province' => $request->province_id]);
        return response()->json($response->json());
    }

    public function getCost(Request $request)
    {
        $response = Http::withHeaders(['key' => env('RAJAONGKIR_API_KEY')])
            ->post(env('RAJAONGKIR_BASE_URL') . '/cost', $request->only(['origin', 'destination', 'weight', 'courier']));
        return response()->json($response->json());
    }

        public function selectShipping(Request $request)
    {
        $customer = Customer::where('user_id', Auth::id())->first();

        // Pastikan order dengan status 'pending' ada untuk customer ini  
        $order = Order::where('customer_id', $customer->id)->where('status', 'pending')->first();

        // Cek apakah order ada 
        if (!$order || $order->orderItems->count() == 0) {
            return redirect()->route('order.cart')->with('error', 'Keranjang belanja kosong.');
        }
        // Inisialisasi total 
        $totalHarga = 0;
        $totalBerat = 0;

        // Hitung total harga dan total berat 
        foreach ($order->orderItems as $item) {
            $totalHarga += $item->harga * $item->quantity;
            $totalBerat += $item->produk->berat * $item->quantity;
        }

        // Kirim total ke view 
        return view('v_order.select_shipping', compact(
            'order',
            'totalHarga',
            'totalBerat'
        ));
    }

    public function updateongkir(Request $request)
    {
        $customer = Customer::where('user_id', Auth::id())->first();
        $order = Order::where('customer_id', $customer->id)->where('status', 'pending')->first();

        if ($order) {
            $order->update([
                'kurir' => $request->kurir,
                'layanan_ongkir' => $request->layanan_ongkir,
                'biaya_ongkir' => $request->biaya_ongkir,
                'estimasi_ongkir' => $request->estimasi_ongkir,
                'total_berat' => $request->total_berat,
                'alamat' => "{$request->alamat}, <br> {$request->city_name}, <br> {$request->province_name}",
                'pos' => $request->pos
            ]);
            return redirect()->route('order.selectpayment');
        }
        return back()->with('error', 'Gagal menyimpan data ongkir');
    }

    // --- Payment (Midtrans) ---

    public function selectPayment()
    {
        $customer = Auth::user();
        $order = Order::with('orderItems.produk')->where('customer_id', $customer->customer->id)->where('status', 'pending')->first();
        
        $totalHarga = $order->orderItems->sum(fn($i) => $i->harga * $i->quantity);
        $grossAmount = $totalHarga + $order->biaya_ongkir;

        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $params = [
            'transaction_details' => [
                'order_id' => $order->id . '-' . time(),
                'gross_amount' => (int) $grossAmount,
            ],
            'customer_details' => [
                'first_name' => $customer->nama,
                'email' => $customer->email,
                'phone' => $customer->hp,
            ],
        ];

        return view('v_order.select_payment', [
            'order' => $order,
            'snapToken' => Snap::getSnapToken($params),
        ]);
    }

    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        
        if ($hashed == $request->signature_key) {
            $order = Order::find(explode('-', $request->order_id)[0]);
            if ($order) $order->update(['status' => 'Paid']);
        }
    }

    // --- Laporan (Reports) ---

    public function cetakOrderProses(Request $request)
    {
        $request->validate([
            'tanggal_awal' => 'required|date',
            'tanggal_akhir' => 'required|date|after_or_equal:tanggal_awal',
        ]);

        $order = Order::whereIn('status', ['Paid', 'Kirim'])
            ->whereBetween('created_at', [$request->tanggal_awal, $request->tanggal_akhir])
            ->orderBy('id', 'desc')
            ->get();

        return view('backend.v_pesanan.cetakproses', [
            'judul' => 'Laporan',
            'subJudul' => 'Laporan Pesanan Proses',
            'tanggalAwal' => $request->tanggal_awal,
            'tanggalAkhir' => $request->tanggal_akhir,
            'cetak' => $order
        ]);
    }

    public function cetakOrderSelesai(Request $request)
    {
        $request->validate([
            'tanggal_awal' => 'required|date',
            'tanggal_akhir' => 'required|date|after_or_equal:tanggal_awal',
        ]);

        $order = Order::where('status', 'Selesai')
            ->whereBetween('created_at', [$request->tanggal_awal, $request->tanggal_akhir])
            ->orderBy('id', 'desc')
            ->get();

        $totalPendapatan = $order->sum(fn($row) => $row->total_harga + $row->biaya_ongkir);

        return view('backend.v_pesanan.cetakselesai', [
            'judul' => 'Laporan',
            'subJudul' => 'Laporan Pesanan Selesai',
            'tanggalAwal' => $request->tanggal_awal,
            'tanggalAkhir' => $request->tanggal_akhir,
            'cetak' => $order,
            'totalPendapatan' => $totalPendapatan
        ]);
    }

    public function invoiceBackend($id)
    {
        return view('backend.v_pesanan.invoice', [
            'judul' => 'Data Transaksi',
            'subJudul' => 'Invoice',
            'order' => Order::findOrFail($id),
        ]);
    }
}