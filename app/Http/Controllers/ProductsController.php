<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{

    protected $products = [
        1 => 'Product 1',
        2 => 'Product 2',
        3 => 'Product 3',
    ];

    public function index()
    {
        return view('products', [
            'title' => config('app.name'),
            'products' => $this->products,
        ]);
    }

    public function show($categoty, $name = 0)
    {
        return 'Product Name: ' . $categoty . '/' . ($this->products[$name] ?? '');
    }
}
