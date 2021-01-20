<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;

class BuyerController extends Controller
{
    public function orders() {
        return view('buyer.orders');
    }
}
