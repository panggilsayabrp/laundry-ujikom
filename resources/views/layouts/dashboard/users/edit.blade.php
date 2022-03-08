@extends('layouts.main')

@section('main')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data User</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Tambah Data User</li>
        </ol>

        <div class="col-lg-6">
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}">

                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username', $user->username) }}">

                    @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select name="role" id="role" class="form-select @error('role') is-invalid @enderror">
                        <option value="">-- Pilih Role --</option>
                        <option value="admin" {{ $user->role != 'admin' ?: 'selected' }}>Admin</option>
                        <option value="kasir" {{ $user->role != 'kasir' ?: 'selected' }}>Kasir</option>
                        <option value="owner" {{ $user->role != 'owner' ?: 'selected' }}>Owner</option>
                    </select>

                    @error('role')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="outlet_id" class="form-label">Nama Outlet</label>
                    <select name="outlet_id" id="outlet_id" class="form-select @error('outlet_id') is-invalid @enderror">
                        <option value="">-- Pilih Outlet --</option>
                        @forelse($outlets as $outlet)
                            @if(old('outlet_id', $user->outlet_id) == $outlet->id)
                                <option value="{{ $outlet->id }}" selected>{{ $outlet->outlet_name }}</option>
                            @else
                                <option value="{{ $outlet->id }}">{{ $outlet->outlet_name }}</option>
                            @endif
                        @empty
                            <option value="">Tidak Ada Data</option>
                        @endforelse
                    </select>

                    @error('outlet_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </form>
        </div>
    </div>
@endsection
