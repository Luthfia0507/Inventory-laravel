
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Supplier</h2>

    <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST">
        @csrf
        @method('PUT')

        @include('suppliers.form')

        <button type="submit">Simpan Perubahan</button>
        <a href="{{ route('suppliers.index') }}">Batal</a>
    </form>
</div>
@endsection
