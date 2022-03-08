@extends('layouts.main')

@section('main')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Paket</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Edit Data Paket</li>
        </ol>

        <div class="col-lg-6">
            <form action="{{ route('packages.update', $package->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Paket</label>
                    <input type="text" name="package_name" id="name" class="form-control @error('package_name') is-invalid @enderror" value="{{ old('package_name', $package->package_name) }}">

                    @error('package_name')
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
                            @if(old('outlet_id', $package->outlet_id) == $outlet->id)
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

                <div class="mb-3">
                    <label for="type" class="form-label">Jenis</label>
                    <select name="type" id="type" class="form-select @error('type') is-invalid @enderror">
                        <option value="">-- Pilih Jenis Paket --</option>
                        <option value="kiloan" {{ $package->type != 'kiloan' ?: 'selected' }}>Kiloan</option>
                        <option value="selimut" {{ $package->type != 'selimut' ?: 'selected' }}>Selimut</option>
                        <option value="bed_cover" {{ $package->type != 'bed_cover' ?: 'selected' }}>Bed Cover</option>
                        <option value="kaos" {{ $package->type != 'kaos' ?: 'selected' }}>Kaos</option>
                        <option value="lain" {{ $package->type != 'lain' ?: 'selected' }}>Lain</option>
                    </select>

                    @error('type')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Harga</label>
                    <input type="number" name="package_price" id="price" class="form-control @error('package_price') is-invalid @enderror" value="{{ old('package_price', $package->package_price) }}">

                    @error('package_price')
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
