
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Supplier</h2>

    <div style="background:white; padding:20px; border-radius:10px; max-width:600px;">
        <p><strong>Nama Supplier:</strong> {{ $supplier->name }}</p>
        <p><strong>Nama Kontak:</strong> {{ $supplier->contact_person ?? '-' }}</p>
        <p><strong>Telepon:</strong> {{ $supplier->phone ?? '-' }}</p>
        <p><strong>Email:</strong> {{ $supplier->email ?? '-' }}</p>
        <p><strong>Alamat:</strong> {{ $supplier->address ?? '-' }}</p>

        <a href="{{ route('suppliers.index') }}">Kembali</a>
        <a href="{{ route('suppliers.edit', $supplier->id) }}">Edit</a>
    </div>
</div>
@endsection
