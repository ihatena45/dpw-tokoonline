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

        $cart = Cart::where('buyer_id', Auth::id())
            ->where('product_id', $product->id)
            ->first();

        if ($cart) {

            $cart->increment('quantity', 1);
        } else {

            Cart::create([
                'buyer_id' => Auth::id(),
                'product_id' => $product->id,
                'quantity' => 1,
            ]);
        }

        return redirect('/cart');
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
