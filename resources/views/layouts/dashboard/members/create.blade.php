@extends('layouts.main')

@section('main')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Member</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Tambah Data Member</li>
        </ol>

        <div class="col-lg-6">
            <form action="{{ route('members.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Member</label>
                    <input type="text" name="member_name" id="name" class="form-control @error('member_name') is-invalid @enderror" value="{{ old('member_name') }}">

                    @error('member_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Telepon</label>
                    <input type="number" name="member_phone" id="price" class="form-control @error('member_phone') is-invalid @enderror" value="{{ old('member_phone') }}">

                    @error('member_phone')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Alamat</label>
                    <textarea name="member_address" id="address" class="form-control @error('member_address') is-invalid @enderror">{{ old('member_address') }}</textarea>

                    @error('member_address')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="type" class="form-label">Jenis</label>
                    <select name="gender" id="type" class="form-select @error('gender') is-invalid @enderror">
                        <option value="">-- Jenis Kelamin --</option>
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                    </select>

                    @error('gender')
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
