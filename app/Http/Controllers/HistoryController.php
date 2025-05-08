<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;


class HistoryController extends Controller
{
    public function index($id)
    {
        $product = Product::where('user_id', auth()->id())->latest()->get();
        return view('history', ['product' => $product]);
    }
}