
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Lp_Store')</title>

    <style>
        :root {
            --pink: #d9829b;
            --pink-dark: #b95f7c;
            --pink-light: #f9e5eb;
            --ivory: #fffaf5;
            --white: #ffffff;
            --text: #59464c;
            --muted: #967f86;
            --border: #f0dfe3;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: "Segoe UI", Arial, sans-serif;
            background: var(--ivory);
            color: var(--text);
        }

        .sidebar {
            width: 245px;
            min-height: 100vh;
            background: var(--white);
            border-right: 1px solid var(--border);
            padding: 30px 20px;
            position: fixed;
            top: 0;
            left: 0;
        }

        .brand {
            font-size: 23px;
            font-weight: 700;
            color: var(--pink-dark);
            margin-bottom: 6px;
        }

        .brand-subtitle {
            font-size: 12px;
            color: var(--muted);
            margin-bottom: 38px;
        }

        .menu-label {
            font-size: 11px;
            font-weight: 700;
            color: var(--muted);
            letter-spacing: 1.5px;
            margin: 22px 0 12px;
        }

        .menu-link {
            display: block;
            padding: 13px 15px;
            margin-bottom: 8px;
            text-decoration: none;
            color: var(--text);
            border-radius: 12px;
            transition: 0.2s;
        }

        .menu-link:hover,
        .menu-link.active {
            background: var(--pink-light);
            color: var(--pink-dark);
        }

        .main {
            margin-left: 245px;
            padding: 32px;
            min-height: 100vh;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            margin-bottom: 30px;
        }

        .topbar h1 {
            font-size: 25px;
            margin: 0 0 7px;
        }

        .subtitle {
            font-size: 14px;
            color: var(--muted);
        }

        .profile {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 30px;
            padding: 11px 16px;
            font-size: 13px;
        }

        .content-card {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 18px;
            padding: 25px;
            box-shadow: 0 5px 20px rgba(130, 75, 90, 0.04);
        }

        .btn {
            display: inline-block;
            border: none;
            border-radius: 10px;
            padding: 11px 16px;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            font-family: inherit;
        }

        .btn-primary {
            background: var(--pink);
            color: white;
        }

        .btn-primary:hover { background: var(--pink-dark); }
        .btn-edit { background: var(--pink-light); color: var(--pink-dark); }
        .btn-delete { background: #fff0ed; color: #bd6558; }

        .table-wrap { width: 100%; overflow-x: auto; }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 13px;
        }

        th {
            background: #fff5f7;
            color: var(--pink-dark);
            text-align: left;
            font-weight: 700;
        }

        th, td {
            padding: 15px 12px;
            border-bottom: 1px solid var(--border);
        }

        tbody tr:hover { background: #fffcfb; }

        .badge {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            background: var(--pink-light);
            color: var(--pink-dark);
            font-size: 11px;
            font-weight: 600;
        }

        .alert-success {
            padding: 14px 16px;
            margin-bottom: 20px;
            border-radius: 10px;
            background: #edf7ed;
            color: #397344;
        }

        .form-group { margin-bottom: 20px; }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 13px;
            font-weight: 600;
        }

        .form-control {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid var(--border);
            border-radius: 10px;
            background: #fffdfb;
            color: var(--text);
            font-size: 14px;
            font-family: inherit;
        }

        .form-control:focus {
            outline: 2px solid var(--pink-light);
            border-color: var(--pink);
        }

        .error {
            color: #bd514f;
            font-size: 12px;
            margin-top: 6px;
        }

        .empty-state {
            text-align: center;
            color: var(--muted);
            padding: 35px 12px;
        }

        @media (max-width: 760px) {
            .sidebar {
                position: static;
                width: 100%;
                min-height: auto;
                padding: 20px;
                border-right: none;
                border-bottom: 1px solid var(--border);
            }

            .brand-subtitle { margin-bottom: 18px; }

            .main {
                margin-left: 0;
                padding: 20px 14px;
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column;
            }

            .content-card { padding: 16px; }
        }
    </style>
</head>
<body>

    <aside class="sidebar">
        <div class="brand">♡ Lp_Store</div>
        <div class="brand-subtitle">Makeup & Skincare Store</div>

        <div class="menu-label">MENU UTAMA</div>

        <a href="{{ route('dashboard') }}"
            class="menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            🏠 &nbsp; Dashboard
        </a>

        <a href="{{ route('products.index') }}"
           class="menu-link {{ !request()->filled('category_id') ? 'active' : '' }}">
             🗒️&nbsp; Data Produk
        </a>

        <a href="{{ route('suppliers.index') }}"
            class="menu-link {{ request()->routeIs('suppliers.*') ? 'active' : '' }}">
             🏢 &nbsp; Data Supplier
        </a>

        <a href="{{ route('purchases.index') }}"
            class="menu-link {{ request()->routeIs('purchases.*') ? 'active' : '' }}">
            📦 &nbsp; Pembelian Barang
        </a>

        <a href="{{ route('sales.index') }}"
            class="menu-link {{ request()->routeIs('sales.*') ? 'active' : '' }}">
            🛍️ &nbsp; Penjualan
        </a>

        <a href="{{ route('stock-movements.index') }}"
            class="menu-link {{ request()->routeIs('stock-movements.*') ? 'active' : '' }}">
            📋 &nbsp; Riwayat Transaksi
        </a>

        <div class="menu-label">KATEGORI</div>

        <a href="{{ route('products.index', ['category_id' => 5]) }}"
           class="menu-link {{ request('category_id') == 5 ? 'active' : '' }}">
            🌸 &nbsp; Make-up
        </a>

        <a href="{{ route('products.index', ['category_id' => 6]) }}"
           class="menu-link {{ request('category_id') == 6 ? 'active' : '' }}">
            🧴 &nbsp; Skincare
        </a>
    </aside>

    <main class="main">
        <header class="topbar">
            <div>
                <h1>@yield('heading', 'Dashboard Produk')</h1>
                <div class="subtitle">
                    Kelola koleksi kecantikanmu dengan mudah.
                </div>
            </div>
            <div class="profile">♡ Beauty Store</div>
        </header>

        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

</body>
</html>
