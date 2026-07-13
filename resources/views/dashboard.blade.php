@extends('layouts.app')

@section('content')
    <div class="container-fluid px-0">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h3 class="fw-bold mb-1">
                    Dashboard
                </h3>

                <p class="text-muted mb-0">
                    Selamat datang kembali, {{ auth()->user()->nama_user }}
                </p>
            </div>


            <div class="d-flex gap-2">

                <a href="{{ route('barang.create') }}" class="btn btn-primary rounded-3 px-3">

                    <i class="bi bi-plus-lg"></i>
                    Tambah Barang

                </a>


                <a href="{{ route('kategori.create') }}" class="btn btn-outline-primary rounded-3 px-3">

                    <i class="bi bi-folder-plus"></i>
                    Tambah Kategori

                </a>

            </div>

        </div>



        <!-- Cards -->

        <div class="row g-4 mb-4">


            <div class="col-md-4">

                <div class="card border-0 shadow-sm rounded-4 h-100">

                    <div class="card-body">

                        <p class="text-muted mb-2">
                            Total Barang
                        </p>


                        <h2 class="fw-bold">
                            {{ $totalBarang }}
                        </h2>


                        <small class="text-success">
                            Data barang tersedia
                        </small>

                    </div>

                </div>

            </div>




            <div class="col-md-4">

                <div class="card border-0 shadow-sm rounded-4 h-100">

                    <div class="card-body">

                        <p class="text-muted mb-2">
                            Total Kategori
                        </p>


                        <h2 class="fw-bold">
                            {{ $totalKategori }}
                        </h2>


                        <small class="text-success">
                            Kategori aktif
                        </small>

                    </div>

                </div>

            </div>




            <div class="col-md-4">

                <div class="card border-0 shadow-sm rounded-4 h-100">

                    <div class="card-body">

                        <p class="text-muted mb-2">
                            Total Stok
                        </p>


                        <h2 class="fw-bold">
                            {{ $totalStok }}
                        </h2>


                        <small class="text-success">
                            Jumlah seluruh barang
                        </small>

                    </div>

                </div>

            </div>


        </div>


        <!-- Barang Terbaru -->

        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-header bg-white border-0 pt-4 px-4">

                <div class="d-flex justify-content-between align-items-center">

                    <h5 class="fw-bold mb-0">
                        Barang Terbaru
                    </h5>


                    <a href="{{ route('barang.index') }}" class="btn btn-sm btn-outline-primary rounded-3">

                        Lihat Semua

                    </a>

                </div>

            </div>


            <div class="card-body">


                <div class="table-responsive">

                    <table class="table align-middle">


                        <thead>

                            <tr>

                                <th>
                                    Nama Barang
                                </th>

                                <th>
                                    Kategori
                                </th>

                                <th>
                                    Stok
                                </th>

                                <th>
                                    Harga
                                </th>

                                <th>
                                    Tanggal Input
                                </th>

                            </tr>

                        </thead>



                        <tbody>


                            @forelse($barangTerbaru as $barang)
                                <tr>

                                    <td class="fw-semibold">
                                        {{ $barang->nama_barang }}
                                    </td>


                                    <td>
                                        {{ $barang->kategori->nama_kategori ?? '-' }}
                                    </td>


                                    <td>
                                        {{ $barang->stok }}
                                    </td>


                                    <td>
                                        Rp {{ number_format($barang->harga, 0, ',', '.') }}
                                    </td>


                                    <td>
                                        {{ $barang->created_at->format('d M Y') }}
                                    </td>


                                </tr>


                            @empty

                                <tr>

                                    <td colspan="5" class="text-center text-muted">

                                        Belum ada data barang

                                    </td>

                                </tr>
                            @endforelse


                        </tbody>


                    </table>


                </div>


            </div>


        </div>


    </div>
@endsection
