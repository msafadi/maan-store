<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{

    protected $products = [
        1 => 'Product 1',
        2 => 'Product 2',
        3 => 'Product 3',
    ];

    public function index()
    {
        // Eager loading
        $products = Product::with('category', 'tags')->paginate();

        return view('products.index', [
            'products' => $products,
        ]);
    }

    public function show($id)
    {
        $product = Product::with('reviews.user')->findOrFail($id);
        return view('products.show', [
            'product' => $product,
        ]);
    }

    public function review(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'rating' => 'required|int|min:1|max:5',
            'review' => 'nullable|string',
        ]);

        $product = Product::findOrFail($request->product_id);

        $product->reviews()->create([
            'user_id' => Auth::id() ?? 1,
            'rating' => $request->rating,
            'review' => $request->review,
        ]);

        return redirect()->back();

    }
}
