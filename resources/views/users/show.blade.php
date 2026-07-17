@extends('layouts.app')

@section('content')

<div class="container-fluid py-5">

    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card shadow-sm border-0 rounded-4">

                <div class="card-body p-4">

                    <div class="text-center mb-4">

                        <div class="rounded-circle bg-primary text-white d-inline-flex justify-content-center align-items-center mx-auto"
                            style="width:90px;height:90px;font-size:34px;font-weight:700;">

                            {{ strtoupper(substr($user->nama_user,0,1)) }}

                        </div>

                        <h4 class="mt-3 mb-1 fw-bold">
                            {{ $user->nama_user }}
                        </h4>

                        <small class="text-muted">
                            {{ $user->email }}
                        </small>

                    </div>

                    <table class="table table-borderless align-middle">

                        <tr>
                            <th width="35%">Nama User</th>
                            <td>{{ $user->nama_user }}</td>
                        </tr>

                        <tr>
                            <th>Email</th>
                            <td>{{ $user->email }}</td>
                        </tr>

                        <tr>
                            <th>No. Telepon</th>
                            <td>{{ $user->nomor_telepon }}</td>
                        </tr>

                        <tr>
                            <th>Tanggal Registrasi</th>
                            <td>
                                {{ \Carbon\Carbon::parse($user->tanggal_registrasi)->format('d F Y') }}
                            </td>
                        </tr>

                        <tr>
                            <th>Dibuat Pada</th>
                            <td>
                                {{ $user->created_at->format('d F Y H:i') }}
                            </td>
                        </tr>

                        <tr>
                            <th>Terakhir Diubah</th>
                            <td>
                                {{ $user->updated_at->format('d F Y H:i') }}
                            </td>
                        </tr>

                    </table>

                    <div class="text-end mt-4">

                        <a href="{{ route('users.index') }}"
                            class="btn btn-secondary">

                            <i class="bi bi-arrow-left"></i>
                            Kembali

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
