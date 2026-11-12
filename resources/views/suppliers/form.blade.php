
<div style="background:white; padding:20px; border-radius:10px; max-width:600px;">

    @if($errors->any())
        <div style="color:red; margin-bottom:15px;">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <label>Nama Supplier *</label>
    <input type="text" name="name"
        value="{{ old('name', $supplier->name ?? '') }}"
        required style="width:100%; padding:10px; margin:8px 0 15px;">

    <label>Nama Kontak</label>
    <input type="text" name="contact_person"
        value="{{ old('contact_person', $supplier->contact_person ?? '') }}"
        style="width:100%; padding:10px; margin:8px 0 15px;">

    <label>Nomor Telepon</label>
    <input type="text" name="phone"
        value="{{ old('phone', $supplier->phone ?? '') }}"
        style="width:100%; padding:10px; margin:8px 0 15px;">

    <label>Email</label>
    <input type="email" name="email"
        value="{{ old('email', $supplier->email ?? '') }}"
        style="width:100%; padding:10px; margin:8px 0 15px;">

    <label>Alamat</label>
    <textarea name="address"
        style="width:100%; padding:10px; margin:8px 0 15px;">{{ old('address', $supplier->address ?? '') }}</textarea>
</div>
