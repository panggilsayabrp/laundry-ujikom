@extends('layouts.main')

@section('main')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Transaksi</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Tambah Data Transaksi</li>
        </ol>

        <div class="col-lg-6">
            <form action="{{ route('transactions.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="inv" class="form-label">Invoice</label>
                    <input type="text" name="invoice_kode" id="inv" class="form-control @error('invoice_kode') is-invalid @enderror" value="INV-{{ date('Ymd-his') }}" readonly>

                    @error('invoice_kode')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="outlet_id" class="form-label">Nama Outlet</label>
                    <select name="outlet_id" id="outlet_id" class="form-select @error('outlet_id') is-invalid @enderror">
                        <option value="">-- Pilih Outlet --</option>
                        @foreach($outlets as $outlet)
                            <option value="{{ $outlet->id }}">{{ $outlet->outlet_name }}</option>
                        @endforeach
                    </select>

                    @error('outlet_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="package_id" class="form-label">Nama Paket</label>
                    <select name="package_id" id="package_id" class="form-select @error('package_id') is-invalid @enderror">
                        <option value="">-- Pilih Paket --</option>
                        @foreach($packages as $package)
                            <option value="{{ $package->id }}">{{ $package->package_name }}</option>
                        @endforeach
                    </select>

                    @error('package_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="member_id" class="form-label">Nama Member</label>
                    <select name="member_id" id="member_id" class="form-select @error('member_id') is-invalid @enderror">
                        <option value="">-- Pilih Member --</option>
                        @foreach($members as $member)
                            <option value="{{ $member->id }}">{{ $member->member_name }}</option>
                        @endforeach
                    </select>

                    @error('member_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="date" class="form-label">Tanggal</label>
                    <input type="datetime-local" name="date" id="date" class="form-control @error('date') active @enderror" value="{{ old('date') }}">

                    @error('date')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="payment_deadline" class="form-label">Batas Waktu</label>
                    <input type="datetime-local" name="payment_deadline" id="payment_deadline" class="form-control @error('payment_deadline') active @enderror" value="{{ old('payment_deadline') }}">

                    @error('payment_deadline')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="payment_date" class="form-label">Tanggal Pembayaran</label>
                    <input type="datetime-local" name="payment_date" id="payment_date" class="form-control @error('payment_date') active @enderror" value="{{ old('payment_date') }}">

                    @error('payment_date')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="cost" class="form-label">Biaya Tambahan</label>
                    <input type="number" name="additional_cost" id="cost" class="form-control @error('additional_cost') is-invalid @enderror" value="{{ old('additional_cost') }}">

                    @error('additional_cost')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="discount" class="form-label">Diskon</label>
                    <input type="number" name="discount" id="discount" class="form-control @error('discount') is-invalid @enderror" value="{{ old('discount') }}">

                    @error('discount')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tax" class="form-label">Pajak</label>
                    <input type="number" name="tax" id="tax" class="form-control @error('tax') is-invalid @enderror" value="{{ old('tax') }}">

                    @error('tax')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="qty" class="form-label">Qty</label>
                    <input type="number" name="qty" id="qty" class="form-control @error('qty') is-invalid @enderror" value="{{ old('qty') }}">

                    @error('qty')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="order_status" class="form-label">Status Pesanan</label>
                    <select name="order_status" id="order_status" class="form-select @error('order_status') is-invalid @enderror">
                        <option value="">-- Pilih Status Pesanan --</option>
                        <option value="baru">Baru</option>
                        <option value="proses">Proses</option>
                        <option value="selesai">Selesai</option>
                        <option value="diambil">Diambil</option>
                    </select>

                    @error('order_status')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="payment_status" class="form-label">Status Pembayaran</label>
                    <select name="payment_status" id="payment_status" class="form-select @error('payment_status') is-invalid @enderror">
                        <option value="">-- Pilih Status Pembayaran --</option>
                        <option value="paid">Dibayar</option>
                        <option value="unpaid">Belum Dibayar</option>
                    </select>

                    @error('payment_status')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>

                    @error('description')
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
