<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::with('items.product')
            ->where('buyer_id', Auth::id())
            ->first();

        return view('cart.index', compact('cart'));
    }

    public function add(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);

        $cart = Cart::firstOrCreate([
            'buyer_id' => Auth::id(),
        ]);

        CartItem::create([
            'cart_id' => $cart->id,
            'product_id' => $product->id,
            'quantity' => 1,
            'subtotal' => $product->price,
        ]);

        return redirect()->back();
    }

    public function remove($id)
    {
        $item = CartItem::findOrFail($id);

        $item->delete();

        return redirect()->back();
    }
}