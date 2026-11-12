
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $category->name }}</h2>

    <a href="{{ route('categories.index') }}">← Kembali</a>

    <hr>

    @forelse ($category->products as $product)
        <div style="padding: 12px; border-bottom: 1px solid #eee;">
            <strong>{{ $product->name }}</strong>
            <p>Stok: {{ $product->stock }}</p>
            <p>Harga: Rp{{ number_format($product->price, 0, ',', '.') }}</p>
        </div>
    @empty
        <p>Belum ada produk dalam kategori ini.</p>
    @endforelse
</div>
@endsection
