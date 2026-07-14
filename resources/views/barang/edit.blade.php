@extends('layouts.app')

@section('title', 'edit')

@section('content')

<div class="container-fluid py-4">

    <div class="mb-4">
        <h3 class="fw-bold mb-1">Edit Barang</h3>
        <p class="text-muted mb-0">
            Perbarui data barang.
        </p>
    </div>

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow-sm border-0 rounded-4">

                <div class="card-body p-4">

                    <form action="{{ route('barang.update',$barang->id) }}" method="POST">

                        @csrf
                        @method('PUT')

                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Nama Barang
                            </label>

                            <input type="text"
                                name="nama_barang"
                                class="form-control @error('nama_barang') is-invalid @enderror"
                                value="{{ old('nama_barang',$barang->nama_barang) }}">

                            @error('nama_barang')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>

                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label class="form-label fw-semibold">
                                    Kategori
                                </label>

                                <select
                                    name="kategori_id"
                                    class="form-select @error('kategori_id') is-invalid @enderror">

                                    @foreach($kategori as $item)

                                        <option
                                            value="{{ $item->id }}"
                                            {{ old('kategori_id',$barang->kategori_id)==$item->id ? 'selected':'' }}>

                                            {{ $item->nama_kategori }}

                                        </option>

                                    @endforeach

                                </select>

                                @error('kategori_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="col-md-6 mb-3">

                                <label class="form-label fw-semibold">
                                    Harga
                                </label>

                                <input
                                    type="number"
                                    name="harga"
                                    class="form-control @error('harga') is-invalid @enderror"
                                    value="{{ old('harga',$barang->harga) }}">

                                @error('harga')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                            </div>

                        </div>

                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Stok
                            </label>

                            <input
                                type="number"
                                name="stok"
                                class="form-control @error('stok') is-invalid @enderror"
                                value="{{ old('stok',$barang->stok) }}">

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

                            <button class="btn btn-warning text-white">

                                <i class="bi bi-pencil-square"></i>
                                Update

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection