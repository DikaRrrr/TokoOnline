@extends('backend.v_layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">

                <form action="{{ route('backend.customer.update', $edit->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <div class="card-body">
                        <h4 class="card-title">{{ $judul }}</h4>

                        <div class="row">
                            <!-- FOTO -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Foto</label>

                                    @if ($edit->user->foto)
                                        <img src="{{ asset('storage/img-user/' . $edit->user->foto) }}" width="100%">
                                    @else
                                        <img src="{{ asset('storage/img-user/img-default.jpg') }}" width="100%">
                                    @endif

                                    <input type="file" name="foto" class="form-control">
                                </div>
                            </div>

                            <!-- DATA -->
                            <div class="col-md-8">

                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="nama"
                                        value="{{ old('nama', $edit->user->nama) }}"
                                        class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email"
                                        value="{{ old('email', $edit->user->email) }}"
                                        class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>HP</label>
                                    <input type="text" name="hp"
                                        value="{{ old('hp', $edit->user->hp) }}"
                                        class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        <option value="1" {{ $edit->user->status == 1 ? 'selected' : '' }}>Aktif</option>
                                        <option value="0" {{ $edit->user->status == 0 ? 'selected' : '' }}>NonAktif</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="border-top">
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary">Perbaharui</button>
                            <a href="{{ route('backend.customer.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
@endsection