<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;

class Productcontroller extends Controller
{
    public function index()
    {
        try {
            $products = Product::all();
            // return response()->json([
            //     'status' => 'success',
            //     'code' => 200,
            //     'product' => $products
            // ], 200);

            return ProductResource::collection($products);

        } catch (Exception $e) {
            return response()->json([
                'status' => 'fail',
                'code' => 500,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        try {

            // ->with('user,id,nama,alamat');
            // untuk join tabel

            $product = Product::findOrFail($id);

            // return response()->json([
            //     'status' => 'success',
            //     'code' => 200,
            //     'product' => $product
            // ], 200);
            
            
            return new ProductResource($product);

        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => 'fail',
                'code' => 404,
                'message' => 'Product not found'
            ], 404);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'fail',
                'code' => 500,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request)
    {
  
        try {
            
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'price' => 'required|numeric',
                'description' => 'nullable|string',
                'image_url' => 'nullable|url',
                'stok' => "nullable|integer|min:0",
                'kategori' => 'required|string|max:255'
            ]);
            
            $imagePath = $request->image_url ?? 'default-product.jpg';

            $product = Product::create([
                'name' => $request->name,
                'price' => $request->price,
                'description' => $request->description,
                'image' => $imagePath,
                'stok' => $request->stok,
                'kategori'=>$request->kategori,
            ]);

     

            return response()->json([
                'status' => 'success',
                'code' => 200,
                'product' => $product
            ], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'status' => 'fail',
                'code' => 422,
                'errors' => $e->errors()
            ], 422);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'fail',
                'code' => 500,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'name' => 'sometimes|string|max:255',
                'description' => 'sometimes|nullable|string',
                'price' => 'sometimes|numeric',
                'image_url' => 'sometimes|nullable|url',
                'stok' => 'sometimes|integer|min:0',
                'kategori' => 'required|string|max:255'
            ]);
    
            $product = Product::findOrFail($id);
    
            $product->update($request->only(['name', 'description', 'price', 'image_url','stok']));
    
            return response()->json([
                'status' => 'success',
                'code' => 200,
                'product' => $product
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => 'fail',
                'code' => 404,
                'message' => 'Product not found'
            ], 404);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'status' => 'fail',
                'code' => 422,
                'errors' => $e->errors()
            ], 422);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'fail',
                'code' => 500,
                'message' => $e->getMessage()
            ], 500);
        }
    }
    

    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->delete();

            return response()->json([
                'status' => 'success',
                'code' => 200,
                'product' => $product
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => 'fail',
                'code' => 404,
                'message' => 'Product not found'
            ], 404);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'fail',
                'code' => 500,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
