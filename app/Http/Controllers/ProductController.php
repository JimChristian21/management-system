<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Product;

class ProductController extends Controller
{

    function index() {

        return Inertia::render('Inventory/Product', [
            'products' => Product::all()
        ]);
    }
}
