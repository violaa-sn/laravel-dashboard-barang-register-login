@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h3 class="fw-bold mb-1">Data Barang</h3>
                <p class="text-muted mb-0">
                    Kelola seluruh data barang.
                </p>
            </div>

            <a href="{{ route('barang.create') }}" class="btn btn-primary px-4">
                <i class="bi bi-plus-lg me-1"></i>
                Tambah Barang
            </a>

        </div>

        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-body p-4">

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="table-responsive">

                    <table class="table table-hover align-middle">

                        <thead class="table-light">
                            <form method="GET" action="{{ route('barang.index') }}">

                                <div class="row mb-3">

                                    <div class="col-md-4">

                                        <div class="input-group">

                                            <input type="text" name="search" class="form-control"
                                                placeholder="Cari barang..." value="{{ request('search') }}">

                                            <button class="btn btn-primary">

                                                <i class="bi bi-search"></i>

                                            </button>

                                        </div>

                                    </div>

                                </div>

                            </form>

                            <tr>

                                <th width="5%">No</th>
                                <th>Nama Barang</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th width="15%">Aksi</th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($barang as $item)
                                <tr>

                                    <td>
                                        {{ $barang->firstItem() + $loop->index }}
                                    </td>

                                    <td>
                                        <strong>{{ $item->nama_barang }}</strong>
                                    </td>

                                    <td>

                                        <span class="badge text-bg-primary">

                                            {{ $item->kategori->nama_kategori }}

                                        </span>

                                    </td>

                                    <td>

                                        Rp {{ number_format($item->harga, 0, ',', '.') }}

                                    </td>

                                    <td>

                                        @if ($item->stok > 10)
                                            <span class="badge text-bg-success">
                                                {{ $item->stok }}
                                            </span>
                                        @elseif($item->stok > 0)
                                            <span class="badge text-bg-warning">
                                                {{ $item->stok }}
                                            </span>
                                        @else
                                            <span class="badge text-bg-danger">
                                                Habis
                                            </span>
                                        @endif

                                    </td>

                                    <td>

                                        <a href="{{ route('barang.edit', $item->id) }}" class="btn btn-sm btn-warning">

                                            <i class="bi bi-pencil"></i>

                                        </a>


                                        <form action="{{ route('barang.destroy', $item->id) }}" method="POST"
                                            class="d-inline">

                                            @csrf
                                            @method('DELETE')


                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Hapus kategori ini?')">

                                                <i class="bi bi-trash"></i>

                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="6" class="text-center py-5">

                                        <i class="bi bi-box-seam fs-1 text-secondary"></i>

                                        <p class="text-muted mt-2">
                                            Belum ada data barang.
                                        </p>

                                    </td>

                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div>

                <div class="d-flex justify-content-between align-items-center mt-4">

                    {{ $barang->links('pagination::bootstrap-5') }}

                </div>

            </div>

        </div>

    </div>
@endsection
