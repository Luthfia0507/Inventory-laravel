
@extends('layouts.app')

@section('title', 'Dashboard | Lp_Store')
@section('heading', 'Dashboard')

@section('content')

<div style="margin-bottom: 22px;">
    <h2 style="font-size: 20px; margin: 0 0 7px;">
        Selamat Datang di Lp_Store ♡
    </h2>
    <p style="font-size: 13px; color: #967f86; margin: 0;">
        Berikut ringkasan kondisi inventory tokomu.
    </p>
</div>

{{-- Ringkasan --}}
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(190px, 1fr)); gap: 16px;">

    <div class="content-card">
        <div style="color: #967f86; font-size: 13px;">Total Produk</div>
        <div style="font-size: 30px; font-weight: 700; color: #b95f7c; margin-top: 10px;">
            {{ $totalProducts }}
        </div>
        <div style="font-size: 12px; color: #967f86;">Produk terdaftar</div>
    </div>

    <div class="content-card">
        <div style="color: #967f86; font-size: 13px;">Total Kategori</div>
        <div style="font-size: 30px; font-weight: 700; color: #a17a43; margin-top: 10px;">
            {{ $totalCategories }}
        </div>
        <div style="font-size: 12px; color: #967f86;">Kategori produk</div>
    </div>

    <div class="content-card">
        <div style="color: #967f86; font-size: 13px;">Total Supplier</div>
        <div style="font-size: 30px; font-weight: 700; color: #6685a5; margin-top: 10px;">
            {{ $totalSuppliers }}
        </div>
        <div style="font-size: 12px; color: #967f86;">Pemasok terdaftar</div>
    </div>

    <div class="content-card">
        <div style="color: #967f86; font-size: 13px;">Total Stok</div>
        <div style="font-size: 30px; font-weight: 700; color: #64866a; margin-top: 10px;">
            {{ number_format($totalStock, 0, ',', '.') }}
        </div>
        <div style="font-size: 12px; color: #967f86;">Jumlah seluruh stok</div>
    </div>

</div>

{{-- Stok Menipis --}}
<div class="content-card" style="margin-top: 22px;">
    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px;">
        <div>
            <h3 style="margin: 0 0 5px; font-size: 17px;">Produk dengan Stok Menipis</h3>
            <p style="margin: 0; font-size: 12px; color: #967f86;">
                Perhatikan produk yang perlu segera ditambah stoknya.
            </p>
        </div>

        <a href="{{ route('products.index') }}" class="btn btn-edit">
            Lihat Produk
        </a>
    </div>

    @if ($lowStockProducts->isEmpty())
        <div class="empty-state">
            Tidak ada produk dengan stok menipis.
        </div>
    @else
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Stok Tersisa</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lowStockProducts as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category->name ?? 'Tanpa Kategori' }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>
                                <span style="background: #fff0ed; color: #bd6558; padding: 6px 10px; border-radius: 20px; font-size: 11px;">
                                    Stok Menipis
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

{{-- Aktivitas Stok --}}
<div class="content-card" style="margin-top: 22px;">
    <div style="display: flex; justify-content: space-between; align-items: center; gap: 10px; flex-wrap: wrap;">
        <div>
            <h3 style="margin: 0 0 5px; font-size: 17px;">Aktivitas Stok Terbaru</h3>
            <p style="margin: 0; font-size: 12px; color: #967f86;">
                Catatan stok masuk dan keluar.
            </p>
        </div>

        <a href="{{ route('stock-movements.index') }}" class="btn btn-edit">
            Lihat Semua
        </a>
    </div>

    @if ($recentMovements->isEmpty())
        <div class="empty-state">
            Belum ada aktivitas stok.
        </div>
    @else
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Produk</th>
                        <th>Jenis</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($recentMovements as $movement)
                        <tr>
                            <td>{{ $movement->created_at->format('d/m/Y H:i') }}</td>
                            <td>{{ $movement->product->name ?? 'Produk dihapus' }}</td>
                            <td>
                                @if ($movement->type === 'in')
                                    <span style="color: #54835d; font-weight: 600;">Stok Masuk</span>
                                @else
                                    <span style="color: #bd6558; font-weight: 600;">Stok Keluar</span>
                                @endif
                            </td>
                            <td>{{ $movement->quantity }}</td>
                            <td>{{ $movement->description ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

@endsection
