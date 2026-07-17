@extends('layouts.app')


@section('content')

<div class="container py-5">

    <div class="card shadow-sm border-0">

        <div class="card-header bg-white border-0 py-3">

            <div class="row align-items-center">

                <div class="col-md-6">
                    <h3 class="fw-bold mb-1">
                        List User
                    </h3>

                    <small class="text-muted">
                        Data seluruh user yang telah melakukan registrasi.
                    </small>
                </div>

                <div class="col-md-6">

                    <form method="GET">

                        <div class="input-group">

                            <input
                                type="text"
                                class="form-control"
                                name="search"
                                placeholder="Cari nama atau email..."
                                value="{{ request('search') }}"
                            >

                            <button class="btn btn-primary">

                                Cari

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>


        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-3">

                <div>

                    <span class="badge bg-primary fs-6">

                        Total :
                        {{ $users->total() }}
                        User

                    </span>

                </div>

            </div>

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">

                        <tr>

                            <th width="60">#</th>

                            <th>User</th>

                            <th>Email</th>

                            <th>No. Telepon</th>

                            <th>Tanggal Registrasi</th>

                            <th width="120">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                    @forelse($users as $user)

                        <tr>

                            <td>

                                {{ $loop->iteration + ($users->currentPage()-1) * $users->perPage() }}

                            </td>

                            <td>

                                <div class="d-flex align-items-center">

                                    <div
                                        class="rounded-circle bg-primary text-white fw-bold d-flex justify-content-center align-items-center me-3"
                                        style="width:48px;height:48px;"
                                    >

                                        {{ strtoupper(substr($user->nama_user,0,1)) }}

                                    </div>

                                    <div>

                                        <div class="fw-semibold">

                                            {{ $user->nama_user }}

                                        </div>

                                    </div>

                                </div>

                            </td>

                            <td>

                                {{ $user->email }}

                            </td>

                            <td>

                                {{ $user->nomor_telepon }}

                            </td>

                            <td>

                                {{ \Carbon\Carbon::parse($user->tanggal_registrasi)->format('d M Y') }}

                            </td>

                            <td>

                                <a
                                    href="{{ route('users.show',$user) }}"
                                    class="btn btn-outline-primary btn-sm"
                                >

                                    Detail

                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6" class="text-center py-5">

                                Tidak ada data user.

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

        <div class="card-footer bg-white">

            {{ $users->links() }}

        </div>

    </div>

</div>

@endsection
