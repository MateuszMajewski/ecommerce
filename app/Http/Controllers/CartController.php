<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = session()->get('cart');
        $cart = json_decode(json_encode($cart), FALSE);
        return view('cart', ['cart' => $cart]);
    }
}
