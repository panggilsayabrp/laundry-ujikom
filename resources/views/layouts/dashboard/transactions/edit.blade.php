@extends('layouts.main')

@section('main')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Transaksi</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Edit Data Transaksi</li>
        </ol>

        <div class="col-lg-6">
            <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="inv" class="form-label">Invoice</label>
                    <input type="text" name="invoice_kode" id="inv" class="form-control @error('invoice_kode') is-invalid @enderror" value="{{ $transaction->invoice_kode }}" readonly>

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
                            @if(old('outlet_id', $transaction->outlet_id) == $outlet->id)
                                <option value="{{ $outlet->id }}" selected>{{ $outlet->outlet_name }}</option>
                            @else
                                <option value="{{ $outlet->id }}">{{ $outlet->outlet_name }}</option>
                            @endif
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
                            @if(old('package_id', $transaction->package_id) == $package->id)
                                <option value="{{ $package->id }}" selected>{{ $package->package_name }}</option>
                            @else
                                <option value="{{ $package->id }}">{{ $package->package_name }}</option>
                            @endif
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
                            @if(old('member_id', $transaction->member_id) == $member->id)
                                <option value="{{ $member->id }}" selected>{{ $member->member_name }}</option>
                            @else
                                <option value="{{ $member->id }}">{{ $member->member_name }}</option>
                            @endif
                        @endforeach
                    </select>

                    @error('member_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="cost" class="form-label">Biaya Tambahan</label>
                    <input type="number" name="additional_cost" id="cost" class="form-control @error('additional_cost') is-invalid @enderror" value="{{ old('additional_cost', $transaction->additional_cost) }}">

                    @error('additional_cost')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="discount" class="form-label">Diskon</label>
                    <input type="number" name="discount" id="discount" class="form-control @error('discount') is-invalid @enderror" value="{{ old('discount', $transaction->discount) }}">

                    @error('discount')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tax" class="form-label">Pajak</label>
                    <input type="number" name="tax" id="tax" class="form-control @error('tax') is-invalid @enderror" value="{{ old('tax', $transaction->tax) }}">

                    @error('tax')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="qty" class="form-label">Qty</label>
                    <input type="number" name="qty" id="qty" class="form-control @error('qty') is-invalid @enderror" value="{{ old('qty', $transaction->qty) }}">

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
                        <option value="baru" {{ $transaction->order_status != 'baru' ?: 'selected' }}>Baru</option>
                        <option value="proses" {{ $transaction->order_status != 'proses' ?: 'selected' }}>Proses</option>
                        <option value="selesai" {{ $transaction->order_status != 'selesai' ?: 'selected' }}>Selesai</option>
                        <option value="diambil" {{ $transaction->order_status != 'diambil' ?: 'selected' }}>Diambil</option>
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
                        <option value="paid" {{ $transaction->payment_status != 'paid' ?: 'selected' }}>Dibayar</option>
                        <option value="unpaid" {{ $transaction->payment_status != 'unpaid' ?: 'selected' }}>Belum Dibayar</option>
                    </select>

                    @error('payment_status')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $transaction->description) }}</textarea>

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
