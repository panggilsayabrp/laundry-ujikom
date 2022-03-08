@extends('layouts.main')

@section('main')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Outlet</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Kelola Data Outlet</li>
        </ol>

        <div>
            <a href="{{ route('outlets.create') }}" class="btn btn-success">Tambah Data</a>

            @if(session('success'))
            <div class="alert alert-info alert-dismissible fade show mt-3" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <table class="table table-hover mt-3">
                <thead>
                <th>No</th>
                <th>Nama Outlet</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Aksi</th>
                </thead>

                <tbody>
                @forelse($outlets as $outlet)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $outlet->outlet_name }}</td>
                        <td>{{ $outlet->outlet_address }}</td>
                        <td>{{ $outlet->outlet_phone }}</td>
                        <td>
                            <a href="{{ route('outlets.edit', $outlet->id) }}" class="btn btn-warning">Edit</a>

                            <form action="{{ route('outlets.destroy', $outlet->id) }}" method="POST" class="d-inline">
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
                        <td>Data Kosong</td>
                        <td></td>
                        <td></td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

