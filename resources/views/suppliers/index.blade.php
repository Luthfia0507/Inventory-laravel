
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Supplier</h2>

    <a href="{{ route('suppliers.create') }}"
       style="display:inline-block; padding:10px 16px; background:#c96e8c; color:white; text-decoration:none; border-radius:8px; margin-bottom:20px;">
        + Tambah Supplier
    </a>

    @if(session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif

    <div style="background:white; padding:20px; border-radius:10px;">
        <table width="100%" cellpadding="12">
            <thead>
                <tr>
                    <th>Nama Supplier</th>
                    <th>Kontak</th>
                    <th>Telepon</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($suppliers as $supplier)
                    <tr>
                        <td>{{ $supplier->name }}</td>
                        <td>{{ $supplier->contact_person ?? '-' }}</td>
                        <td>{{ $supplier->phone ?? '-' }}</td>
                        <td>{{ $supplier->email ?? '-' }}</td>
                        <td>
                            <a href="{{ route('suppliers.show', $supplier->id) }}">Detail</a> |
                            <a href="{{ route('suppliers.edit', $supplier->id) }}">Edit</a>

                            <form action="{{ route('suppliers.destroy', $supplier->id) }}"
                                  method="POST"
                                  style="display:inline;"
                                  onsubmit="return confirm('Yakin ingin menghapus supplier ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" align="center">Belum ada supplier.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $suppliers->links() }}
    </div>
</div>
@endsection
