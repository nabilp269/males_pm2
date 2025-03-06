<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function show($id) {
        if (!is_numeric($id)) {
            abort(404);
        }
        $product = Product::findOrFail($id);
        return view('products.detail', compact('product'));
    }
    
    
}
