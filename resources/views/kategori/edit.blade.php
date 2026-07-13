@extends('layouts.app')

@section('content')

<div class="container-fluid py-4">

    <!-- Header -->
    <div class="mb-4">
        <h3 class="fw-bold mb-1">Edit Kategori</h3>
        <p class="text-muted mb-0">
            Perbarui data kategori barang.
        </p>
    </div>

    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card shadow-sm border-0 rounded-4">

                <div class="card-body p-4">

                    <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">

                        @csrf
                        @method('PUT')

                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Nama Kategori
                            </label>

                            <input
                                type="text"
                                name="nama_kategori"
                                class="form-control @error('nama_kategori') is-invalid @enderror"
                                value="{{ old('nama_kategori', $kategori->nama_kategori) }}"
                                placeholder="Masukkan nama kategori">

                            @error('nama_kategori')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="d-flex justify-content-end gap-2">

                            <a href="{{ route('kategori.index') }}"
                                class="btn btn-secondary">

                                <i class="bi bi-arrow-left"></i>
                                Kembali

                            </a>

                            <button
                                type="submit"
                                class="btn btn-warning text-white">

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