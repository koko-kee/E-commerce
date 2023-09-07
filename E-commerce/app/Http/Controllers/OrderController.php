<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth");
    }
    

    public function store(Request $request)
    {

        $order = Orders::create([

            'user_id' =>  Auth::user()->id,
            'amounts' => $amount = Cart::total(),
            'address' => 'dakar'
        ]);

        foreach (Cart::content() as $cartItem) {

            $order->detailOrder()->create([

                'product_id' => $cartItem->id,
                'quantity' => $cartItem->qty,
                'unity_price' => $cartItem->price 

            ]);
        }
        Cart::destroy();
        return  redirect()->route('order.thankYou');
        
    }

    public function thankYou()
    {
        Session::flash('success','votre commande a bien ete traitee');
        return View('checkout.thankyou');
    }

   

}
