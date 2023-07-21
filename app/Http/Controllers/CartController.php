<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Carbon;
use App\Events\OrderConfirmation;

class CartController extends Controller
{
    public function store(Request $request)
    {

        $data =  $request->validate(
            [
                'name' =>  'required',
                'price' => 'required',
                'quantity' => 'required',
            ]
        );

        $user = auth('api')->user();
        $user_id = $user->id;

        $cart = new Cart();
        $cart->price =  $data['price'];
        $cart->quantity =  $data['quantity'];
        $cart->name =  $data['name'];
        $cart->user_id =  $user_id;
        $cart->user_address = $user->address;
        $cart->user_mobile = $user->mobile;
        $cart->user_name =  $user->name;
        $cart->created_at = Carbon::now();
        $cart->updated_at = Carbon::now();
        $saveddata =  $cart->save();
        // $saveddata =  Cart::create($data);
        return response(['cart' =>   $saveddata]);
    }

    public function index()
    {
        $user = auth('api')->user();
        $user_id = $user->id;

        $cartdate = Cart::where('user_id', $user_id)->get();
        return response(['data' => $cartdate]);
    }

    public function deleteAll()
    {
        $user = auth('api')->user();
        event(new OrderConfirmation($user));
    }
}
