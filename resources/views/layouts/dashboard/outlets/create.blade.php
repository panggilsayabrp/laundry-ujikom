@extends('layouts.main')

@section('main')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Outlet</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Tambah Data Outlet</li>
        </ol>

        <div class="col-lg-6">
            <form action="{{ route('outlets.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="outlet_name" class="form-label">Nama Outlet</label>
                    <input type="text" name="outlet_name" id="outlet_name" class="form-control @error('outlet_name') is-invalid @enderror" value="{{ old('outlet_name') }}">

                    @error('outlet_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">No Telepon</label>
                    <input type="number" name="outlet_phone" id="phone" class="form-control @error('outlet_phone') is-invalid @enderror" value="{{ old('outlet_phone') }}">

                    @error('outlet_phone')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="outlet_address" class="form-label">Nama Outlet</label>
                    <textarea name="outlet_address" id="outlet_address" class="form-control @error('outlet_address') is-invalid @enderror">{{ old('outlet_address') }}</textarea>

                    @error('outlet_address')
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
