@extends('layouts.main')

@section('main')
    @can('admin', \App\Models\User::class)
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Transaksi</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Kelola Data Transaksi</li>
            </ol>

            <div>
                <a href="{{ route('transactions.create') }}" class="btn btn-success">Tambah Data</a>
                <a href="/pdf" class="btn btn-outline-secondary">Generate Laporan</a>

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
                    <th>Nama Paket</th>
                    <th>Nama Konsumen</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                    </thead>

                    <tbody>
                    @forelse($transactions as $transaction)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $transaction->outlet->outlet_name }}</td>
                            <td>{{ $transaction->package->package_name }}</td>
                            <td>{{ $transaction->member->member_name }}</td>
                            <td>{{ $transaction->date }}</td>
                            <td>
                                @if($transaction->order_status != 'diambil')
                                    <a href="{{ route('transactions.edit', $transaction->id) }}" class="btn btn-warning">Edit</a>
                                @endif

                                <a href="{{ route('transactions.show', $transaction->id) }}" class="btn btn-info">Detail</a>

                                <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" class="d-inline">
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

    @elsecan('kasir', \App\Models\User::class)
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Transaksi</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Kelola Data Transaksi</li>
            </ol>

            <div>
                <a href="{{ route('transactions.create') }}" class="btn btn-success">Tambah Data</a>
                <a href="/pdf" class="btn btn-outline-secondary">Generate Laporan</a>

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
                    <th>Nama Paket</th>
                    <th>Nama Konsumen</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                    </thead>

                    <tbody>
                    @forelse($transactions as $transaction)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $transaction->outlet->outlet_name }}</td>
                            <td>{{ $transaction->package->package_name }}</td>
                            <td>{{ $transaction->member->member_name }}</td>
                            <td>{{ $transaction->date }}</td>
                            <td>
                                @if($transaction->order_status != 'diambil')
                                    <a href="{{ route('transactions.edit', $transaction->id) }}" class="btn btn-warning">Edit</a>
                                @endif

                                <a href="{{ route('transactions.show', $transaction->id) }}" class="btn btn-info">Detail</a>

                                <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" class="d-inline">
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

    @else
        <div class="container-fluid px-4">
            <h1 class="mt-4">Generate Laporan</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Generate Laporan Laundry</li>
            </ol>

            <div>
                <a href="/pdf" class="btn btn-outline-secondary">Generate Laporan</a>
            </div>
        </div>
    @endcan
@endsection

