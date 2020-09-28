<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Request as RequestHttp;
use Illuminate\Http\Request;
use App\Models\Order;

use Guzzle\Http\Exception\ClientErrorResponseException;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('order');
    }
    
    function sucess(Request $request, $id){
        $order = Order::find($id);
        if($request->error){
            $order->status = 'sucess';
            $order->save();
            return view('success');
        }
        else{
            $order->status = 'fail';
            $order->save();
            return view('failure');
        }
            
    }

    function makeOrder(Request $request){
        $options = ['allow_redirects' => false];
        $client = new \GuzzleHttp\Client($options);

        $email = $request->input('email', "john.doe@example.com");
        $name = $request->input('name', 'John');
        $surname = $request->input('surname', "Doe");
        $phone = $request->input('phone', '654111654');

        $total_amount = 0;
        $cart = session()->get('cart');
        $products = [];
        foreach($cart as $item){
            $product = [];
            $product['name'] = $item['name'];
            $product['unitPrice'] = $item['price'];
            $product['quantity'] = $item['quantity'];

            $total_amount += $item['price'];
            array_push($products, $product);
        }

        $order = new Order;
        $order->user_id = 1;
        $order->status = 'payment';
        $order->value = $total_amount;
        $order->save();

        $method = 'POST';
        $uri = 'https://secure.snd.payu.com/api/v2_1/orders';
        $headers =
            [
                'Authorization' => "Bearer d9a4536e-62ba-4f60-8017-6053211d3f47",
                'Content-Type' => 'application/json'
            ];
        $json = [
            "notifyUrl" => "http://matmajewski.pl",
            "continueUrl" => "http://localhost:8000/order/sucess/" . $order->id . "/",
            "customerIp" => "127.0.0.1",
            "merchantPosId" => "300746",
            "description" => "Zakupy",
            "currencyCode" => "PLN",
            "totalAmount" => $total_amount * 100,
            "buyer" => [
                "email" => $email,
                "phone" => $phone,
                "firstName" => $name,
                "lastName" => $surname,
                "language" => "pl"
            ],
            "products" => $products,
        ];



        $request = new RequestHttp($method, $uri, $headers, json_encode($json));
        try {
            $response = $client->send($request);
        } catch (\GuzzleHttp\Exception\BadResponseException $exception) {
            $response = $exception->getResponse();
        }

        $json = json_decode($response->getBody()->getContents(), true);

        $cart = [];
        session()->put('cart', $cart);

        return redirect($json['redirectUri']);
    }
}
