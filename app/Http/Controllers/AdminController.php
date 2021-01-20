<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
class AdminController extends Controller
{
    //
    public function approve(Product $product) 
    {
        $product->status = 1;
        $product->save();
        return redirect('products');
    }

    public function seller() 
    {
        $list = User::where('type', 2)->get();
        return view('admin.seller', ['list' => $list]);
    }

    public function privilege(User $user) 
    {
        $user->update([
            'type' => 3
        ]);
        return redirect('/seller-list');
    }
}
