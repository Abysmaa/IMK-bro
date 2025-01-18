<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $title = 'Home';
        $products = Product::all();
        $categories = Category::all();
        return view('home', compact(['products', 'title', 'categories']));
    }

    public function getCategory($id)
    {
        $category = Category::findOrFail($id);
        $title = "Category " . $category->name;
        $products = Product::where('category_id', $category->id)->get();

        return view('category', compact(['products', 'title', 'category']));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'image' => 'nullable|image',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image = $imagePath;
        }

        $product->save();

        return redirect()->route('home')->with('success', 'Product added successfully.');
    }
}
