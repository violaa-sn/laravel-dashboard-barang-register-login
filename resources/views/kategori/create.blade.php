@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">

        <!-- Header -->
        <div class="mb-4">
            <h3 class="fw-bold mb-1">Tambah Kategori</h3>
            <p class="text-muted mb-0">
                Tambahkan kategori baru untuk barang.
            </p>
        </div>

        <div class="row justify-content-center">

            <div class="col-lg-7">

                <div class="card shadow-sm border-0 rounded-4">

                    <div class="card-body p-4">

                        <form action="{{ route('kategori.store') }}" method="POST">

                            @csrf

                            <!-- Nama Kategori -->
                            <div class="mb-4">

                                <label class="form-label fw-semibold">
                                    Nama Kategori
                                </label>

                                <input type="text" name="nama_kategori"
                                    class="form-control @error('nama_kategori') is-invalid @enderror"
                                    value="{{ old('nama_kategori') }}" placeholder="Contoh : Elektronik">

                                @error('nama_kategori')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                            <!-- Tombol -->
                            <div class="d-flex justify-content-end gap-2">

                                <a href="{{ route('kategori.index') }}" class="btn btn-secondary">

                                    <i class="bi bi-arrow-left"></i>
                                    Kembali

                                </a>

                                <button type="submit" class="btn btn-primary">

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
