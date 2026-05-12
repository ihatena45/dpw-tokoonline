<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::with('product')
            ->where('buyer_id', Auth::id())
            ->get();

        return view('cart.index', compact('carts'));
    }

    public function add(int $id)
    {
        $product = Product::findOrFail($id);

        // Produk habis
        if ($product->stock <= 0) {

            return back()->with('error', 'Product out of stock');
        }

        $cart = Cart::where('buyer_id', Auth::id())
            ->where('product_id', $product->id)
            ->first();

        if ($cart) {

            // Qty cart tidak boleh melebihi stock
            if ($cart->quantity >= $product->stock) {

                return back()->with('error', 'Stock limit reached');
            }

            $cart->increment('quantity');

        } else {

            Cart::create([
                'buyer_id' => Auth::id(),
                'product_id' => $product->id,
                'quantity' => 1,
            ]);
        }

        return back()->with('success', 'Product added to cart');
    }

public function remove(int $id)
{
    $cart = Cart::where('buyer_id', Auth::id())
        ->findOrFail($id);

    if ($cart->quantity > 1) {

        $cart->decrement('quantity');

    } else {

        $cart->delete();
    }

    return redirect('/cart')
        ->with('success', 'Cart updated');
}
}