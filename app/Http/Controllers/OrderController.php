<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $title = 'Cart';
        // Ambil keranjang dari session
        $cart = session()->get('cart', []);

        // Ambil produk berdasarkan ID di keranjang
        $products = Product::whereIn('id', array_keys($cart))->get();

        // Hitung total harga
        $total = 0;
        foreach ($products as $product) {
            $total += $product->price * $cart[$product->id];
        }

        // Kirim data ke view
        return view('cart', compact('products', 'cart', 'total', 'title'));
    }

    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]++;
        } else {
            $cart[$id] = 1;
        }



        session()->put('cart', $cart);

        return redirect()->route('home')->with('success', 'Product added to cart.');
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Product removed from cart.');
    }

    public function update(Request $request, $product_id)
    {
        // Validasi input quantity
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        // Ambil keranjang dari session
        $cart = session()->get('cart', []);

        // Update quantity produk di keranjang
        if (isset($cart[$product_id])) {
            $cart[$product_id] = $request->quantity;
        }

        // Simpan keranjang ke session
        session()->put('cart', $cart);

        return response()->json(['success' => true]);
    }

    public function checkout()
    {
        // Ambil keranjang dari session
        $cart = session()->get('cart', []);

        // Ambil produk berdasarkan ID di keranjang
        $products = Product::whereIn('id', array_keys($cart))->get();

        // Validasi stok produk
        foreach ($products as $product) {
            if ($product->stock < $cart[$product->id]) {
                return response()->json([
                    'success' => false,
                    'message' => 'Not enough stock for product: ' . $product->name,
                ], 400);
            }
        }

        // Hitung total harga
        $total = 0;
        foreach ($products as $product) {
            $total += $product->price * $cart[$product->id];
        }

        // Simpan order ke database
        $order = Order::create([
            'total_price' => $total,
            'status' => 'completed',
        ]);

        // Simpan detail produk ke order_items dan kurangi stok
        foreach ($products as $product) {
            // Simpan detail produk ke order_items
            $order->items()->create([
                'product_id' => $product->id,
                'quantity' => $cart[$product->id],
                'price' => $product->price,
            ]);

            // Kurangi stok produk
            $product->stock -= $cart[$product->id];
            $product->save();
        }

        // Hapus keranjang dari session
        session()->forget('cart');

        // Kembalikan response JSON dengan order_id
        return response()->json([
            'success' => true,
            'order_id' => $order->id,
        ]);
    }

    public function thankyou($order_id)
    {
        $title = 'Thank You';

        $order = Order::with('items.product')->findOrFail($order_id);

        return view('thankyou', compact('title', 'order'));
    }
}
