<?php

namespace App\Http\Controllers;

use App\Models\StockMovement;
use Illuminate\Http\Request;

class StockMovementController extends Controller
{
    public function index(Request $request)
    {
        $query = StockMovement::with('product')
            ->latest();

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        $movements = $query->paginate(10);

        return view('stock_movements.index', compact('movements'));
    }
}
