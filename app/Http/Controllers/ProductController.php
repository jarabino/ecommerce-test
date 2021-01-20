<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Sale;
class ProductController extends Controller
{
    //

    public function index()
    {
        $products = Product::where('status', 1)->get();
        if(auth()->user()->type === 2) {
            $products = Product::where('user_id', auth()->user()->id)->get();
        } else if(auth()->user()->type === 1){
            $products = Product::orderBy('status')->get();
        }
        return view('product.index', ['products' => $products]);
    }
    public function cart()
    {
        $items = Cart::where('user_id', auth()->user()->id)->get();
        return view('cart.index', ['items'=> $items]);
    }
    public function addToCart(Product $product)
    {
        Cart::create(
            [
                'user_id' => auth()->user()->id,
                'product_id' => $product->id,
                'quantity' =>1
            ]
        );
        return redirect('cart');
    }

    public function checkout(Cart $product)
    {
        Sale::create(
            [
                'user_id' => auth()->user()->id,
                'product_id' => $product->product_id,
                'quantity' =>1
            ]
        );
        $product->delete();
        return redirect('cart');
    }

    public function guest() 
    {
        $products = Product::where('status', 1)->get();
        return view('product.guest', ['products' => $products]);
    }
}
