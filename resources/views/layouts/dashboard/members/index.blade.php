@extends('layouts.main')

@section('main')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Paket</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Kelola Data Paket</li>
        </ol>

        <div>
            <a href="{{ route('members.create') }}" class="btn btn-success">Tambah Data</a>

            @if(session('success'))
                <div class="alert alert-info alert-dismissible fade show mt-3" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <table class="table table-hover mt-3">
                <thead>
                <th>No</th>
                <th>Nama Member</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>Telepon</th>
                <th>Aksi</th>
                </thead>

                <tbody>
                @forelse($members as $member)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $member->member_name }}</td>
                        <td>{{ $member->member_address }}</td>
                        <td>{{ $member->gender }}</td>
                        <td>{{ $member->member_phone }}</td>
                        <td>
                            <a href="{{ route('members.edit', $member->id) }}" class="btn btn-warning">Edit</a>

                            <form action="{{ route('members.destroy', $member->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure ?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td></td>
                        <td></td>
                        <td class="text-center">Data Kosong</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

