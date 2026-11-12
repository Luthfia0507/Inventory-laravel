
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Kategori</h2>

    <div class="card">
        <div class="card-body">
            @forelse ($categories as $category)
                <div style="padding: 15px; border-bottom: 1px solid #eee;">
                    <h5>{{ $category->name }}</h5>
                    <p>{{ $category->products_count }} Produk</p>

                    <a href="{{ route('categories.show', $category->id) }}">
                        Lihat Produk
                    </a>
                </div>
            @empty
                <p>Belum ada kategori.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
