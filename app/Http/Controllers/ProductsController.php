<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{

    protected $products = [
        1 => 'Product 1',
        2 => 'Product 2',
        3 => 'Product 3',
    ];

    public function index(Request $request)
    {
        // Eager loading
        $category = $request->query('category', []);
        $min = $request->query('min_price');
        $max = $request->query('max_price');
        $sort = $request->query('sort');
        $search = $request->query('search');

        $query = Product::with('category', 'tags')
            ->when($search, function($query, $search) {
                $query->where('name', 'LIKE', "%{$search}%");
            })
            ->when($category, function($query, $category) {
                $query->whereIn('category_id', $category);
            })
            ->when($min, function($query, $min) {
                $query->where('price', '>=', $min);
            })
            ->when($max, function($query, $max) {
                $query->where('price', '<=', $max);
            });
        
        switch ($sort) {
            case 'price-low':
                $query->orderBy('price', 'ASC');
                break;
            case 'price-high':
                $query->orderBy('price', 'DESC');
                break;
            case 'name':
                $query->orderBy('name', 'ASC');
                break;
            default:
                $query->latest();
        }

        $products = $query->paginate();

        /*
        select categories.*
        (select count(*) from products where category_id = categories.id) as products_count
        from categories
        where exists (
            select 1 from products where products.category_id = categories.id
        )
        */

        /*$categories = Category::select([
            'categories.*',
            DB::raw('(select count(*) from products where category_id = categories.id) as products_count')
        ])->whereRaw('EXISTS (select 1 from products where products.category_id = categories.id)')
        ->get();*/

        $categories = Category::has('products')->withCount('products')->get();

        return view('front.products.index', [
            'products' => $products,
            'categories' => $categories,
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
