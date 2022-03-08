@extends('layouts.main')

@section('main')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Detail Transaksi</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Transaksi ini diterbitkan untuk {{ $transaction->member->member_name }} dengan nomor invoice {{ $transaction->invoice_kode }}</li>
        </ol>

        <div class="mt-3 py-3">
            <h4>Data Pelanggan</h4>
            <table class="table table-hover mt-3">
                <thead>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Nomor Telepon</th>
                </thead>

                <tbody>
                    <tr>
                        <td>{{ $transaction->member->member_name }}</td>
                        <td>{{ $transaction->member->gender }}</td>
                        <td>{{ $transaction->member->member_address }}</td>
                        <td>{{ $transaction->member->member_phone }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            <h4>Data Pesanan</h4>
            <table class="table table-hover mt-2">
                <thead>
                <th>Nama Paket</th>
                <th>Harga</th>
                <th>QTY</th>
                <th>Biaya Tambahan</th>
                <th>Pajak</th>
                <th>Diskon</th>
                </thead>

                <tbody>
                    <tr>
                        <td>{{ $transaction->package->package_name }}</td>
                        <td>Rp.{{ number_format($transaction->package->package_price) }}</td>
                        <td>{{ $transaction->qty }}</td>
                        <td>Rp.{{ number_format($transaction->additional_cost) }}</td>
                        <td>Rp.{{ number_format($transaction->tax) }}</td>
                        <td>Rp.{{ number_format($transaction->discount) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            <h4>Data Pembayaran</h4>
            <table class="table table-hover mt-4">
                <thead>
                <th>Jumlah</th>
                <th>Batas Waktu</th>
                <th>Tgl Bayar</th>
                <th>Status Pesanan</th>
                <th>Status Pembayaran</th>
                </thead>
                <tbody>
                <tr>
                    <td>Rp.{{ number_format($transaction->package->package_price * $transaction->qty + $transaction->additional_cost + $transaction->tax - $transaction->discount) }}</td>
                    <td>{{ $transaction->payment_deadline }}</td>
                    <td>{{ $transaction->payment_date }}</td>
                    <td>{{ $transaction->order_status }}</td>
                    <td>{{ $transaction->payment_status }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection

{{--Rumus pajak 10%--}}
{{--number_format(($transaction->package->package_price * $transaction->qty + $transaction->additional_cost) * 10/100 - $transaction->discount)--}}

