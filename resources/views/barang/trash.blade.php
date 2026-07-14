@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold mb-1">
                Trash Barang
            </h3>

            <p class="text-muted mb-0">
                Daftar barang yang telah dihapus.
            </p>
        </div>

        <a href="{{ route('barang.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-1"></i>
            Kembali
        </a>

    </div>

    {{-- Card --}}
    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4">

            {{-- Alert --}}
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Table --}}
            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">

                        <tr>
                            <th width="5%">No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Dihapus Pada</th>
                            <th width="20%">Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($barang as $item)

                            <tr>

                                <td>
                                    {{ $barang->firstItem() + $loop->index }}
                                </td>

                                <td>
                                    <span class="text-secondary">
                                        {{ $item->kode_barang }}
                                    </span>
                                </td>

                                <td>
                                    <strong>{{ $item->nama_barang }}</strong>
                                </td>

                                <td>

                                    <span class="badge text-bg-primary">
                                        {{ $item->kategori?->nama_kategori ?? 'Kategori dihapus' }}
                                    </span>

                                </td>

                                <td>

                                    Rp {{ number_format($item->harga,0,',','.') }}

                                </td>

                                <td>

                                    @if($item->stok > 10)

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

                                    {{ $item->deleted_at->format('d M Y H:i') }}

                                </td>

                                <td>

                                    {{-- Restore --}}
                                    <form action="{{ route('barang.restore', $item->id) }}"
                                        method="POST"
                                        class="d-inline">

                                        @csrf
                                        @method('PATCH')

                                        <button
                                            class="btn btn-success btn-sm"
                                            onclick="return confirm('Pulihkan barang ini?')">

                                            <i class="bi bi-arrow-counterclockwise"></i>

                                        </button>

                                    </form>

                                    {{-- Hapus Permanen --}}
                                    <form action="{{ route('barang.forceDelete', $item->id) }}"
                                        method="POST"
                                        class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Barang akan dihapus permanen. Lanjutkan?')">

                                            <i class="bi bi-trash"></i>

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="8" class="text-center py-5">

                                    <i class="bi bi-trash3 fs-1 text-secondary"></i>

                                    <p class="text-muted mt-2 mb-0">
                                        Trash masih kosong.
                                    </p>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            {{-- Pagination --}}
            <div class="d-flex justify-content-between align-items-center mt-4">

                {{ $barang->links('pagination::bootstrap-5') }}

            </div>

        </div>

    </div>

</div>
@endsection
