<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();

        return inertia('Index', compact('product'));
    }
    public function create(){

        return inertia('Create');
    }
    public function store(Request $request){

        Product::create([
            'brand' => $request->get('brand'),
            'producer' => $request->get('producer'),
            'type' => $request->get('type'),
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'weight' => $request->get('weight'),
            'amount' => $request->get('amount'),
            'price' => $request->get('price')
        ]);

        return redirect()->route('product.list');

    }
}
