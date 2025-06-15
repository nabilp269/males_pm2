<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\product;
use App\Http\Resources\ProductResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('user-token')->plainTextToken;

            return response()->json([
                'status' => true,
                'message' => 'Login berhasil!',
                'token' => $token,
                'user' => $user,
            ], 200);
        }

        return response()->json([
            'status' => false,
            'message' => 'Email atau password salah!',
        ], 401);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'alamat' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:20',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Pendaftaran berhasil!',
            'user' => $user,
        ], 201);
    }

    public function logout(Request $request)
    {
        // Menghapus semua token milik user
        $request->user()->tokens()->delete();

        return response()->json([
            'status' => true,
            'message' => 'Logout berhasil!',
        ], 200);
    }

    public function index()
    {

        try {
            $bestProducts = Product::withSum('orderItems as total_sold', 'quantity')
                ->orderByDesc('total_sold')
                ->take(6)
                ->get();

            // $products = Product::all();
            // return response()->json([
            //     'status' => 'success',
            //     'code' => 200,
            //     'product' => $products
            // ], 200);

            return ProductResource::collection($bestProducts);

        } catch (Exception $e) {
            return response()->json([
                'status' => 'fail',
                'code' => 500,
                'message' => $e->getMessage()
            ], 500);
        }

    }

    public function allProduk(Request $request)
    {
        try {
            $query = Product::query();

            // Filter berdasarkan kategori
            if ($request->has('kategori') && $request->kategori != 'Semua') {
                $query->where('kategori', $request->kategori);
            }

            // Pencarian berdasarkan nama
            if ($request->has('search')) {
                $query->where('name', 'like', '%' . $request->search . '%');
            }

            $products = $query->get();

            $bestSellerIDs = Product::withSum('orderItems as total_sold', 'quantity')
                ->orderByDesc('total_sold')
                ->take(6)
                ->pluck('id')
                ->toArray();

                
            return response()->json([
                'status' => 'success',
                'code' => 200,
                'products' => ProductResource::collection($products),
                'best_seller_ids' => $bestSellerIDs
            ]);


        } catch (Exception $e) {
            return response()->json([
                'status' => 'fail',
                'code' => 500,
                'message' => $e->getMessage()
            ], 500);
        }
    }

}
