@extends('backend.v_layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h4>{{ $judul }}</h4>

                <table class="table table-bordered">
                    <tr>
                        <th>Nama</th>
                        <td>{{ $show->user->nama }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $show->user->email }}</td>
                    </tr>
                    <tr>
                        <th>HP</th>
                        <td>{{ $show->user->hp }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            {{ $show->user->status == 1 ? 'Aktif' : 'NonAktif' }}
                        </td>
                    </tr>
                </table>

                <a href="{{ route('backend.customer.index') }}" class="btn btn-secondary">
                    Kembali
                </a>
            </div>
        </div>
    </div>
@endsection
