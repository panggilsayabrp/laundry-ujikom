<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - SB Admin</title>
    <link href="/css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body>
    <main>
        <div class="container mt-3">
            <h2>Laporan Transaksi Laundry</h2>
        </div>
       <div class="container mt-3 px-2 py-2">
           <table class="table table-hover">
               <thead>
               <th>No</th>
               <th>Invoice</th>
               <th>Nama Pelanggan</th>
               <th>Nama Outlet</th>
               <th>Nama Paket</th>
               <th>Tanggal</th>
               <th>Status Pesanan</th>
               <th>Status Pembayaran</th>
               <th>Jumlah Pembayaran</th>
               </thead>

               <tbody>
               @foreach($transactions as $transaction)
               <tr>
                   <td>{{ $loop->iteration }}</td>
                   <td>{{ $transaction->invoice_kode }}</td>
                   <td>{{ $transaction->member->member_name }}</td>
                   <td>{{ $transaction->outlet->outlet_name }}</td>
                   <td>{{ $transaction->package->package_name }}</td>
                   <td>{{ $transaction->date }}</td>
                   <td>{{ $transaction->order_status }}</td>
                   <td>{{ $transaction->payment_status }}</td>
                   <td>Rp.{{ number_format($transaction->package->package_price * $transaction->qty + $transaction->additional_cost + $transaction->tax - $transaction->discount) }}</td>
               </tr>
               @endforeach
               </tbody>
           </table>
       </div>
    </main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="/js/scripts.js"></script>
</body>
</html>
