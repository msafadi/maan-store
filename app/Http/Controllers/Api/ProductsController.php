<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = $request->name;

        $products = Product::with('category:id,name', 'tags', 'images')
            ->when($name, function($query, $name) {
                $query->where('name', 'LIKE', "%{$name}%");
            })
            ->paginate();

        return response()->json($products, 200, [
            'x-developer' => 'Mohammed',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        if (!$user->tokenCan('products.create')) {
            return response()->json([
                'message' => 'Not allowed',
            ], 403);
        }

        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'image_path' => 'image',
        ]);

        if ($request->hasFile('image')) {
            $image_path = $request->file('image')->store('uploads', 'public');
        }

        $request->merge([
            'slug' => Str::slug($request->name),
            'image_path' => $image_path ?? null,
        ]);

        $product = Product::create($request->all());

        $product->refresh();
        
        return Response::json($product, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return $product->load('tags', 'images', 'category:id,name');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = Auth::guard('sanctum')->user();
        if (!$user->tokenCan('products.update')) {
            return response()->json([
                'message' => 'Not allowed',
            ], 403);
        }

        $request->validate([
            'name' => 'sometimes|required',
            'category_id' => 'sometimes|required',
            'image_path' => 'image',
        ]);
        
        $product = Product::findOrFail($id);
        $product->update($request->all());
        
        return [
            'message' => __('Product updated'),
            'data' => $product,
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::guard('sanctum')->user();
        if (!$user->tokenCan('products.delete')) {
            return response()->json([
                'message' => 'Not allowed',
            ], 403);
        }

        $product = Product::findOrFail($id);
        $product->delete();

        return [
            'message' => __('Product deleted')
        ];
    }
}
