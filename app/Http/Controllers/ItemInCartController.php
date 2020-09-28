<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ItemInOrder;

class ItemInCartController extends Controller
{

    public function store(Request $request, $id)
    {
        if (session()->has('cart')) {
            $cart = session()->get('cart');
            if (array_key_exists($id, $cart)) {
                $cart[$id]['quantity'] += 1;
            } else {
                $cartdata = [];
                $cartdata['product_id'] = $id;
                $cartdata['name'] = $request->input('name');
                $cartdata['price'] = $request->input('price');
                $cartdata['quantity'] = 1;
                $cart[$id] = $cartdata;
            }
        } else {
            $cartdata = [];
            $cartdata['product_id'] = $id;
            $cartdata['name'] = $request->input('name');
            $cartdata['price'] = $request->input('price');
            $cartdata['quantity'] = 1;
            $cart[$id] = $cartdata;
        }
        session()->put('cart', $cart);

        return response("Done", 200);
    }

    public function minus($id)
    {

        $cart = session()->get('cart');
        if ($cart[$id]['quantity'] > 0) 
            $cart[$id]['quantity'] -= 1;
        else 
            unset($cart[$id]);
        session()->put('cart', $cart);
        return response('ok', 200);
    }

    public function plus($id)
    {
        $cart = session()->get('cart');
        $cart[$id]['quantity'] += 1;
        session()->put('cart', $cart);
        return response('ok', 200);
    }

    public function remove($id)
    {
        $cart = session()->get('cart');
        unset($cart[$id]);
        session()->put('cart', $cart);
        return response('ok', 200);
    }
}
