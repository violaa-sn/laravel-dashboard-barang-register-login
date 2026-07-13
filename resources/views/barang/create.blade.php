@extends('layouts.app')

@section('content')

<div class="container-fluid py-4">

    <div class="mb-4">
        <h3 class="fw-bold mb-1">Tambah Barang</h3>
        <p class="text-muted mb-0">
            Tambahkan data barang baru.
        </p>
    </div>

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow-sm border-0 rounded-4">

                <div class="card-body p-4">

                    <form action="{{ route('barang.store') }}" method="POST">

                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Barang</label>

                            <input type="text"
                                name="nama_barang"
                                class="form-control @error('nama_barang') is-invalid @enderror"
                                value="{{ old('nama_barang') }}"
                                placeholder="Masukkan nama barang">

                            @error('nama_barang')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label class="form-label fw-semibold">Kategori</label>

                                <select name="kategori_id"
                                    class="form-select @error('kategori_id') is-invalid @enderror">

                                    <option value="">-- Pilih Kategori --</option>

                                    @foreach($kategori as $item)

                                        <option value="{{ $item->id }}"
                                            {{ old('kategori_id') == $item->id ? 'selected' : '' }}>

                                            {{ $item->nama_kategori }}

                                        </option>

                                    @endforeach

                                </select>

                                @error('kategori_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="col-md-6 mb-3">

                                <label class="form-label fw-semibold">Harga</label>

                                <input type="number"
                                    name="harga"
                                    class="form-control @error('harga') is-invalid @enderror"
                                    value="{{ old('harga') }}"
                                    placeholder="0">

                                @error('harga')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                            </div>

                        </div>

                        <div class="mb-4">

                            <label class="form-label fw-semibold">Stok</label>

                            <input type="number"
                                name="stok"
                                class="form-control @error('stok') is-invalid @enderror"
                                value="{{ old('stok') }}"
                                placeholder="0">

                            @error('stok')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>

                        <div class="d-flex justify-content-end gap-2">

                            <a href="{{ route('barang.index') }}"
                                class="btn btn-secondary">

                                <i class="bi bi-arrow-left"></i>
                                Kembali

                            </a>

                            <button class="btn btn-primary">

                                <i class="bi bi-check-circle"></i>
                                Simpan

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection