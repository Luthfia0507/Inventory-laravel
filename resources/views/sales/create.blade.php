
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Penjualan</h2>

    @if($errors->any())
        <div style="background:#ffe8ec;color:#a52e50;padding:12px;border-radius:8px;margin-bottom:15px;">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form action="{{ route('sales.store') }}" method="POST">
        @csrf

        <div style="background:white;padding:20px;border-radius:12px;margin-bottom:20px;">
            <label>Tanggal Penjualan *</label>
            <input type="date" name="sale_date"
                value="{{ old('sale_date', date('Y-m-d')) }}"
                required style="width:100%;padding:10px;margin:8px 0 15px;">

            <label>Catatan</label>
            <textarea name="notes"
                style="width:100%;padding:10px;margin-top:8px;">{{ old('notes') }}</textarea>
        </div>

        <div style="background:white;padding:20px;border-radius:12px;">
            <h3>Daftar Produk</h3>

            <div id="items-container"></div>

            <button type="button" onclick="addItem()"
                style="background:#f8e5eb;color:#a34e6d;border:0;padding:10px 15px;border-radius:8px;margin-top:15px;">
                + Tambah Produk
            </button>

            <div style="margin-top:25px;text-align:right;">
                <button type="submit"
                    style="background:#c96e8c;color:white;border:0;padding:12px 22px;border-radius:8px;">
                    Simpan Penjualan
                </button>

                <a href="{{ route('sales.index') }}" style="margin-left:10px;">
                    Batal
                </a>
            </div>
        </div>
    </form>
</div>

<script>
let itemIndex = 0;

const products = @json($products);

function addItem() {
    const container = document.getElementById('items-container');
    const index = itemIndex++;

    let options = '<option value="">-- Pilih Produk --</option>';

    products.forEach(product => {
        options += `<option value="${product.id}" data-price="${product.price}">
            ${product.name} (Stok: ${product.stock})
        </option>`;
    });

    const row = document.createElement('div');

    row.className = 'sale-item';
    row.style.cssText = 'border:1px solid #f0dce3;padding:15px;border-radius:10px;margin-top:15px;';

    row.innerHTML = `
        <div style="display:flex;justify-content:space-between;align-items:center;">
            <strong>Produk ${index + 1}</strong>
            <button type="button" onclick="this.closest('.sale-item').remove()"
                style="color:#c0395b;border:0;background:none;cursor:pointer;">
                Hapus
            </button>
        </div>

        <label>Produk</label>
        <select name="items[${index}][product_id]" required
            onchange="setPrice(this)"
            style="width:100%;padding:10px;margin:8px 0 15px;">
            ${options}
        </select>

        <label>Jumlah</label>
        <input type="number" name="items[${index}][quantity]"
            min="1" required placeholder="Masukkan jumlah"
            style="width:100%;padding:10px;margin:8px 0 15px;">

        <label>Harga Jual per Produk (Rp)</label>
        <input type="number" name="items[${index}][unit_price]"
            min="0" step="0.01" required placeholder="Harga jual"
            style="width:100%;padding:10px;margin:8px 0;">
    `;

    container.appendChild(row);
}

function setPrice(select) {
    const selected = select.options[select.selectedIndex];
    const price = selected.dataset.price || '';

    const row = select.closest('.sale-item');
    row.querySelector('[name$="[unit_price]"]').value = price;
}

addItem();
</script>
@endsection
