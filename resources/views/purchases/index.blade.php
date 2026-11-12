
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Riwayat Pembelian</h2>

    <a href="{{ route('purchases.create') }}"
       style="display:inline-block;background:#c96e8c;color:white;padding:10px 18px;border-radius:8px;text-decoration:none;margin-bottom:20px;">
        + Tambah Pembelian
    </a>

    @if(session('success'))
        <div style="background:#e8f7ec;color:#24723a;padding:12px;border-radius:8px;margin-bottom:15px;">
            {{ session('success') }}
        </div>
    @endif

    <div style="background:white;padding:20px;border-radius:12px;overflow-x:auto;">
        <table width="100%" cellpadding="12">
            <thead>
                <tr>
                    <th>No. Pembelian</th>
                    <th>Supplier</th>
                    <th>Tanggal</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($purchases as $purchase)
                    <tr>
                        <td>{{ $purchase->purchase_number }}</td>
                        <td>{{ $purchase->supplier->name }}</td>
                        <td>{{ $purchase->purchase_date->format('d-m-Y') }}</td>
                        <td>Rp{{ number_format($purchase->total_amount, 0, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('purchases.show', $purchase->id) }}">
                                Detail
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" align="center">
                            Belum ada transaksi pembelian.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $purchases->links() }}
    </div>
</div>
@endsection
