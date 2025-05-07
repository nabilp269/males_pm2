<?php

namespace App\Http\Controllers;

use App\Models\product;

abstract class Controller
{
    public function index(){

        $products = Product::all();
        
    }
}
