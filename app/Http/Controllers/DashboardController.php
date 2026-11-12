<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\StockMovement;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $totalSuppliers = Supplier::count();
        $totalStock = Product::sum('stock');

        // Produk dengan stok menipis
        $lowStockProducts = Product::with('category')
            ->get()
            ->filter(function ($product) {
                return $product->stock <= ($product->minimum_stock ?? 5);
            })
            ->take(5);

        // Riwayat stok terbaru
        $recentMovements = StockMovement::with('product')
            ->latest()
            ->take(8)
            ->get();

        return view('dashboard', compact(
            'totalProducts',
            'totalCategories',
            'totalSuppliers',
            'totalStock',
            'lowStockProducts',
            'recentMovements'
        ));
    }
}
