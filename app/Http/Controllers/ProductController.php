<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Validator;


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

        $validated = Validator::make($request->all(), [
            'brand' => 'required|string',
            'producer' => 'required|string',
            'type' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'weight' => 'required|decimal:2',
            'amount' => 'required|integer',
            'price' => 'required|decimal:2',
        ]);

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
