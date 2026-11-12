
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Riwayat Penjualan</h2>

    <a href="{{ route('sales.create') }}"
       style="display:inline-block;background:#c96e8c;color:white;padding:10px 18px;border-radius:8px;text-decoration:none;margin-bottom:20px;">
        + Tambah Penjualan
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
                    <th>No. Penjualan</th>
                    <th>Tanggal</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($sales as $sale)
                    <tr>
                        <td>{{ $sale->sale_number }}</td>
                        <td>{{ $sale->sale_date->format('d-m-Y') }}</td>
                        <td>Rp{{ number_format($sale->total_amount, 0, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('sales.show', $sale->id) }}">Detail</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" align="center">
                            Belum ada transaksi penjualan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $sales->links() }}
    </div>
</div>
@endsection
