<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class SellerController extends Controller
{
    //
    public function add() 
    {
        return view('seller.post-product');
    }
    public function store(Request $request) 
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'price' => 'required|numeric'
        ]);

        Product::create(
            [
                'name' => $validated['name'],
                'description' => $validated['description'],
                'price' => $validated['price'],
                'status' => 0,
                'user_id' => auth()->user()->id,
            ]
        );
        return redirect('/products');
    }

    public function sales()
    {
        return view('seller.sales');
    }
}
