
@extends('layouts.app')

@section('title', 'Tambah Produk | Blush & Bloom')
@section('heading', 'Tambah Produk')

@section('content')

<div class="content-card" style="max-width: 850px;">

    <h2 style="margin-top: 0;">Tambah Produk Baru</h2>
    <p class="subtitle">Lengkapi informasi produk yang akan disimpan.</p>

    @if ($errors->any())
        <div style="background: #fff0ed; color: #bd514f; padding: 15px; border-radius: 10px; margin: 20px 0;">
            <strong>Periksa kembali data berikut:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="category_id">Kategori Produk</label>
            <select name="category_id" id="category_id" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="sku">Kode Produk (SKU)</label>
            <input type="text" name="sku" id="sku" class="form-control"
                value="{{ old('sku') }}" placeholder="Contoh: ELK-001" required>
        </div>

        <div class="form-group">
            <label for="name">Nama Produk</label>
            <input type="text" name="name" id="name" class="form-control"
                value="{{ old('name') }}" placeholder="Masukkan nama produk" required>
        </div>

        <div class="form-group">
            <label for="brand">Merek Produk</label>
            <input type="text" name="brand" id="brand" class="form-control"
                value="{{ old('brand') }}" placeholder="Masukkan merek produk">
        </div>

        <div class="form-group">
            <label for="price">Harga Produk (Rp)</label>
            <input type="number" name="price" id="price" class="form-control"
                value="{{ old('price') }}" min="0" step="1" required>
        </div>

        <div class="form-group">
            <label for="stock">Jumlah Stok</label>
            <input type="number" name="stock" id="stock" class="form-control"
                value="{{ old('stock', 0) }}" min="0" step="1" required>
        </div>

        <div class="form-group">
            <label for="minimum_stock">Batas Minimum Stok</label>
            <input type="number" name="minimum_stock" id="minimum_stock" class="form-control"
                value="{{ old('minimum_stock', 5) }}" min="0" step="1" required>
        </div>

        <div class="form-group">
            <label for="description">Deskripsi Produk</label>
            <textarea name="description" id="description" class="form-control"
                rows="4" placeholder="Masukkan deskripsi produk">{{ old('description') }}</textarea>
        </div>

        <div style="display: flex; gap: 10px; flex-wrap: wrap; margin-top: 25px;">
            <button type="submit" class="btn btn-primary">Simpan Produk</button>
            <a href="{{ route('products.index') }}" class="btn btn-edit">Kembali</a>
        </div>
    </form>

</div>

@endsection
