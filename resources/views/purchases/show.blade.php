
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Pembelian</h2>

    <div style="background:white;padding:20px;border-radius:12px;margin-bottom:20px;">
        <p><strong>Nomor Pembelian:</strong> {{ $purchase->purchase_number }}</p>
        <p><strong>Supplier:</strong> {{ $purchase->supplier->name }}</p>
        <p><strong>Tanggal:</strong> {{ $purchase->purchase_date->format('d-m-Y') }}</p>
        <p><strong>Catatan:</strong> {{ $purchase->notes ?? '-' }}</p>
    </div>

    <div style="background:white;padding:20px;border-radius:12px;overflow-x:auto;">
        <h3>Produk yang Dibeli</h3>

        <table width="100%" cellpadding="12">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Jumlah</th>
                    <th>Harga Beli</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($purchase->items as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>Rp{{ number_format($item->purchase_price, 0, ',', '.') }}</td>
                        <td>Rp{{ number_format($item->subtotal, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h3 style="text-align:right;margin-top:20px;">
            Total: Rp{{ number_format($purchase->total_amount, 0, ',', '.') }}
        </h3>
    </div>

    <a href="{{ route('purchases.index') }}"
       style="display:inline-block;margin-top:20px;">
        ← Kembali
    </a>
</div>
@endsection
