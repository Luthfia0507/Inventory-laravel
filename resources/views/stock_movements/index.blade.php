
@extends('layouts.app')

@section('title', 'Riwayat Transaksi')

@section('heading', 'Riwayat Transaksi')

@section('content')

<div class="content-card">

    <div style="margin-bottom: 20px;">
        <h3 style="margin: 0 0 8px;">Riwayat Pergerakan Stok</h3>
        <p style="color: #967f86; font-size: 13px; margin: 0;">
            Catatan seluruh aktivitas stok masuk dan keluar.
        </p>
    </div>

    <form method="GET"
          action="{{ route('stock-movements.index') }}"
          style="display: flex; gap: 10px; flex-wrap: wrap;">

        <select name="type" class="form-control" style="max-width: 220px;">
            <option value="">Semua Aktivitas</option>
            <option value="in" {{ request('type') == 'in' ? 'selected' : '' }}>
                Stok Masuk
            </option>
            <option value="out" {{ request('type') == 'out' ? 'selected' : '' }}>
                Stok Keluar
            </option>
        </select>

        <button type="submit" class="btn btn-primary">
            Filter
        </button>

        <a href="{{ route('stock-movements.index') }}"
           class="btn btn-edit">
            Reset
        </a>
    </form>

    <div class="table-wrap">

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Nama Produk</th>
                    <th>Aktivitas</th>
                    <th>Jumlah</th>
                    <th>Keterangan</th>
                </tr>
            </thead>

            <tbody>
                @forelse($movements as $movement)
                    <tr>
                        <td>{{ $movements->firstItem() + $loop->index }}</td>

                        <td>
                            {{ $movement->created_at->format('d/m/Y H:i') }}
                        </td>

                        <td>
                            {{ $movement->product->name ?? 'Produk dihapus' }}
                        </td>

                        <td>
                            @if($movement->type == 'in')
                                <span style="background:#e8f5e9;color:#388e3c;padding:6px 10px;border-radius:20px;font-size:11px;">
                                    Stok Masuk
                                </span>
                            @elseif($movement->type == 'out')
                                <span style="background:#fff0ed;color:#bd6558;padding:6px 10px;border-radius:20px;font-size:11px;">
                                    Stok Keluar
                                </span>
                            @else
                                {{ ucfirst($movement->type) }}
                            @endif
                        </td>

                        <td>
                            {{ $movement->type == 'out' ? '-' : '+' }}{{ $movement->quantity }}
                        </td>

                        <td>
                            {{ $movement->description ?? '-' }}
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="6" class="empty-state">
                            Belum ada riwayat transaksi.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>

    <div style="margin-top: 20px;">
        {{ $movements->links() }}
    </div>

</div>

@endsection
