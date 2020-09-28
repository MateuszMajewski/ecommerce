<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;


class AdminController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');

        //$this->middleware('role:admin');
        if ( Auth::check() && Auth::user()->role = "admin")
        {

        } else {
            redirect('/');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin', ['products' => Product::all(), 'categories' => Category::all(), 'orders' => Order::all()]);
    }
}
