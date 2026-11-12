
@extends('layouts.app')

@section('title', 'Data Produk | Blush & Bloom')
@section('heading', $selectedCategory ? 'Produk ' . $selectedCategory->name : 'Data Produk')

@section('content')

<div class="content-card">

    {{-- Header --}}
    <div style="display: flex; justify-content: space-between; align-items: center; gap: 15px; flex-wrap: wrap;">
        <div>
            <h2 style="margin: 0 0 8px; font-size: 20px; color: #59464c;">
                {{ $selectedCategory ? 'Koleksi ' . $selectedCategory->name : 'Koleksi Produk' }}
            </h2>
            <p style="margin: 0; color: #967f86; font-size: 13px;">
                Kelola dan pantau seluruh produk tokomu.
            </p>
        </div>

        <a href="{{ route('products.create') }}" class="btn btn-primary"
           style="text-decoration: none; padding: 11px 18px; border-radius: 8px;">
            + Tambah Produk
        </a>
    </div>

    {{-- Ringkasan --}}
    <div style="display: flex; gap: 15px; flex-wrap: wrap; margin-top: 25px;">
        <div style="background: #fff5f7; padding: 16px 20px; border-radius: 12px; flex: 1; min-width: 150px;">
            <div style="font-size: 12px; color: #967f86;">Total Produk</div>
            <div style="font-size: 25px; font-weight: 700; color: #b95f7c; margin-top: 5px;">
                {{ $totalProducts }}
            </div>
        </div>

        <div style="background: #fffaf0; padding: 16px 20px; border-radius: 12px; flex: 1; min-width: 150px;">
            <div style="font-size: 12px; color: #967f86;">Total Stok</div>
            <div style="font-size: 25px; font-weight: 700; color: #a17a43; margin-top: 5px;">
                {{ $totalStock }}
            </div>
        </div>
    </div>

    {{-- Pesan --}}
    @if (session('success'))
        <div style="background: #effaf1; color: #327344; padding: 12px 16px; border-radius: 8px; margin-top: 20px;">
            {{ session('success') }}
        </div>
    @endif

    {{-- Daftar Produk --}}
    @if ($products->isEmpty())
        <div class="empty-state">
            <div style="font-size: 38px; margin-bottom: 12px;">♡</div>
            <h3 style="color: #59464c; margin-bottom: 8px;">
                Belum Ada Produk
            </h3>
            <p>Belum ada produk pada kategori ini.</p>

            <a href="{{ route('products.create') }}" class="btn btn-primary">
                + Tambah Produk
            </a>
        </div>
    @else
        <div class="table-wrap" style="margin-top: 25px;">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>SKU</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $products->firstItem() + $loop->index }}</td>
                            <td>{{ $product->sku ?? '-' }}</td>

                            <td style="font-weight: 600;">
                                {{ $product->name }}
                            </td>

                            <td>
                                <span class="badge">
                                    {{ $product->category->name ?? 'Tanpa Kategori' }}
                                </span>
                            </td>

                            <td>
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </td>

                            <td>
                                @if ($product->stock <= ($product->minimum_stock ?? 0))
                                    <span style="color: #bd6558; font-weight: 600;">
                                        {{ $product->stock }} (Menipis)
                                    </span>
                                @else
                                    {{ $product->stock }}
                                @endif
                            </td>

                            <td>
                                <div style="display: flex; gap: 6px; flex-wrap: wrap;">
                                    <a href="{{ route('products.edit', $product->id) }}"
                                       class="btn btn-edit">
                                        Edit
                                    </a>

                                    <form action="{{ route('products.destroy', $product->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-delete">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div style="margin-top: 20px;">
            {{ $products->links() }}
        </div>
    @endif

</div>

@endsection
