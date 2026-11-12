
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="content-card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px; flex-wrap: wrap; gap: 12px;">
            <div>
                <h2 style="margin: 0; color: #8f4560;">Tambah Supplier</h2>
                <p style="margin: 7px 0 0; color: #888; font-size: 14px;">
                    Masukkan informasi supplier untuk melengkapi data pemasok barang.
                </p>
            </div>

            <a href="{{ route('suppliers.index') }}"
               style="text-decoration: none; color: #a45b75; background: #fff1f4; padding: 10px 16px; border-radius: 8px; font-size: 14px;">
                ← Kembali
            </a>
        </div>

        @if ($errors->any())
            <div style="background: #fff0f0; color: #b42318; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px;">
                <strong>Periksa kembali data yang dimasukkan.</strong>
                <ul style="margin: 8px 0 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('suppliers.store') }}" method="POST">
            @csrf

            @include('suppliers.form')

            <div style="display: flex; justify-content: flex-end; gap: 10px; margin-top: 25px;">
                <a href="{{ route('suppliers.index') }}"
                   style="text-decoration: none; padding: 11px 20px; border-radius: 8px; background: #f3eeee; color: #725c63;">
                    Batal
                </a>

                <button type="submit"
                        style="border: none; cursor: pointer; padding: 11px 22px; border-radius: 8px; background: #c96e8c; color: white; font-weight: 600;">
                    Simpan Supplier
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
