<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    //

    function index() {

        return Inertia::render('Inventory/Product', [
            'Sample' => 'test'
        ]);
    }
}