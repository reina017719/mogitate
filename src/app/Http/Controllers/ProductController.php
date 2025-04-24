<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with('seasons')->get();

        return view('products.index', compact('products'));
    }

    public function register()
    {
        return view('products.register');
    }

    public function store(RegisterRequest $request)
    {
        $product_data = $request->only(['name', 'price', 'description']);

        if ($request->hasFile('image'))
        {
            $img_path = $request->file('image')->store('public/fruits-img');
            $public_path = str_replace('public/', 'storage/', $img_path);
            $product_data['image'] = $public_path;
        }
        // dd($product_data);

        $product = Product::create($product_data);

        if ($request->has('season'))
        {
        $product->seasons()->sync($request->input('season', []));
        }

        return redirect('products');
    }

    public function product(Product $product)
    {
        $product = Product::with('seasons')->find($product->id);
        $selectedSeasons = $product->seasons->pluck('id')->toArray();
        // dd($selectedSeasons);

        return view('products.product', compact('product', 'selectedSeasons'));
    }

    public function update(ProductRequest $request)
    {
        $product_data = $request->only(['name', 'price', 'description']);

        if ($request->hasFile('image'))
        {
            $img_path = $request->file('image')->store('public/fruits-img');
            $public_path = str_replace('public/', 'storage/', $img_path);
            $product_data['image'] = $public_path;
        }

        $product = Product::findOrFail($request->id);
        $product->update($product_data);

        if ($request->has('season'))
        {
        $product->seasons()->sync($request->input('season', []));
        }

        return redirect('products');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->seasons()->detach();
        $product->delete();

        return redirect('/products');
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $products = Product::with('seasons')->keywordSearch($keyword)->get();

        return view('products.index', compact('products', 'keyword'));
    }
}