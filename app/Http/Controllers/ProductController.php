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
    public function store(Request $request)
    {

        $validated = $request->validate([
            'brand' => 'required|string',
            'producer' => 'required|string',
            'type' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'weight' => 'required|decimal:2',
            'amount' => 'required|integer',
            'price' => 'required|decimal:2',
            'file' => 'required|image:jpg, jpeg, png'
        ]);


        $file = $request->file('file');
        $name = '/avatars/' . uniqid() . '.' . $file->extension();
        $file->storePubliclyAs('public', $name);
        $fileData['file'] = $name;

        $productCreate = Product::create([
            'brand' => $request->get('brand'),
            'producer' => $request->get('producer'),
            'type' => $request->get('type'),
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'weight' => $request->get('weight'),
            'amount' => $request->get('amount'),
            'price' => $request->get('price'),
            'file' => $name,
        ]);

        return redirect()->route('product.list')->with('message', 'You created new product!');
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('product.list')->with('error', 'Product not found.');
        }

        $product->delete();

        return redirect()->route('product.list')->with('message', 'You deleted the product.');
    }


    public function edit($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('product.list')->with('error', 'Product not found.');
        }

        return inertia('Edit', ['product' => $product]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'brand' => 'required|string',
            'producer' => 'required|string',
            'type' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'weight' => 'required|decimal:2',
            'amount' => 'required|integer',
            'price' => 'required|decimal:2',
        ]);

        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('product.list')->with('error', 'Product not found.');
        }

        $product->update($validated);

        return redirect()->route('product.list')->with('message', 'Product updated successfully.');
    }
}
