```blade
@extends('layouts.app')

@section('content')

<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold mb-1">
                Trash Kategori
            </h3>

            <p class="text-muted mb-0">
                Daftar kategori yang telah dihapus.
            </p>
        </div>

        <a href="{{ route('kategori.index') }}" class="btn btn-secondary">
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

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">

                        <tr>
                            <th width="5%">No</th>
                            <th width="20%">Kode Kategori</th>
                            <th>Nama Kategori</th>
                            <th>Dihapus Pada</th>
                            <th width="20%">Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($kategori as $item)

                            <tr>

                                <td>
                                    {{ $kategori->firstItem() + $loop->index }}
                                </td>

                                <td>
                                    <span class="text-secondary">
                                        {{ $item->kode_kategori }}
                                    </span>
                                </td>

                                <td>
                                    <strong>{{ $item->nama_kategori }}</strong>
                                </td>

                                <td>

                                    <span class="badge bg-secondary">

                                        {{ $item->deleted_at->format('d M Y H:i') }}

                                    </span>

                                </td>

                                <td>

                                    {{-- Restore --}}
                                    <form action="{{ route('kategori.restore', $item->id) }}"
                                        method="POST"
                                        class="d-inline">

                                        @csrf
                                        @method('PATCH')

                                        <button
                                            type="submit"
                                            class="btn btn-success btn-sm"
                                            onclick="return confirm('Pulihkan kategori ini?')">

                                            <i class="bi bi-arrow-counterclockwise"></i>

                                        </button>

                                    </form>

                                    {{-- Hapus Permanen --}}
                                    <form action="{{ route('kategori.forceDelete', $item->id) }}"
                                        method="POST"
                                        class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Kategori akan dihapus permanen. Lanjutkan?')">

                                            <i class="bi bi-trash"></i>

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="5" class="text-center py-5">

                                    <i class="bi bi-trash3 fs-1 text-secondary"></i>

                                    <p class="text-muted mt-2 mb-0">
                                        Trash kategori masih kosong.
                                    </p>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            {{-- Pagination --}}
            <div class="d-flex justify-content-between align-items-center mt-4">

                {{ $kategori->links('pagination::bootstrap-5') }}

            </div>

        </div>

    </div>

</div>

@endsection
```
