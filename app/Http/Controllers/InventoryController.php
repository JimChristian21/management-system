<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;
use App\Models\Product;

class InventoryController extends Controller
{

    public function index() {

        return Inertia::render('Inventory', [
            'products' => Product::all()
        ]);
    }
}
