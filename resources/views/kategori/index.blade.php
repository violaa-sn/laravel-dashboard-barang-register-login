@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">

        {{-- Header --}}
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h3 class="fw-bold mb-1">
                    Data Kategori
                </h3>
                <p class="text-muted mb-0">
                    Kelola kategori barang yang tersedia
                </p>
            </div>

            <a href="{{ route('kategori.create') }}" class="btn btn-primary px-4">
                <i class="bi bi-plus-lg me-1"></i>
                Tambah Kategori
            </a>

        </div>


        {{-- Card Table --}}
        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-body p-4">

                {{-- Alert --}}
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif



                <div class="table-responsive">

                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light text-secondary">

                            <form method="GET" action="{{ route('kategori.index') }}">

                                <div class="row mb-3">

                                    <div class="col-md-4">

                                        <div class="input-group">

                                            <input type="text" name="search" class="form-control"
                                                placeholder="Cari kategori..." value="{{ request('search') }}">

                                            <button class="btn btn-primary">

                                                <i class="bi bi-search"></i>

                                            </button>

                                        </div>

                                    </div>

                                </div>

                            </form>

                            <tr>
                                <th width="10%">No</th>
                                <th>Nama Kategori</th>
                                <th width="20%">Jumlah Barang</th>
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
                                        <div class="fw-semibold">
                                            {{ $item->nama_kategori }}
                                        </div>
                                    </td>


                                    <td>
                                        <span class="badge bg-primary-subtle text-primary">
                                            {{ $item->barang_count }} Barang
                                        </span>
                                    </td>


                                    <td>

                                        <a href="{{ route('kategori.edit', $item->id) }}" class="btn btn-sm btn-warning">

                                            <i class="bi bi-pencil"></i>

                                        </a>


                                        <form action="{{ route('kategori.destroy', $item->id) }}" method="POST"
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

                                    <td colspan="4" class="text-center py-4">

                                        <i class="bi bi-folder-x fs-2 text-muted"></i>

                                        <p class="text-muted mb-0">
                                            Belum ada kategori
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
