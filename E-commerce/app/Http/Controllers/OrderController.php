<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Categorie;
use Illuminate\View\View;
use App\Mail\OrderCarryOut;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Events\confirmOrderProcessed;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        $orders = Orders::where('user_id', Auth::id())->get();
        return view('orders.index',[
            "orders" => $orders
        ]);
    }

    
    public function show($id)
    {
        $order = Orders::findOrFail($id);
        //dd($order->detailOrder);
        return view('orders.show',  [
            "order" => $order
        ]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $orders = Orders::create([
            'user_id' => $user->id,
            'amounts' => Cart::total(),
            'address' => 'dakar'
        ]);
        
        foreach (Cart::content() as $cartItem) {

            $orders->detailOrder()->create([

                'product_id' => $cartItem->id,
                'quantity' => $cartItem->qty,
                'unity_price' => $cartItem->price 
            ]);
        }
        
        Cart::destroy();
        event(new confirmOrderProcessed($user, $orders));
        return  redirect()->route('order.thankYou');
    }

    public function confirmOrder($id)
    {
       $order = Orders::find($id);
       $order->order_statut = "en attende d'expedtion";
       $order->save();
       return redirect()->route("product.index")->with("success","Merci pour votre Achat");
    }

    public function edit($id)
    {
        // Logique de modification de commande ici
    }


    public function update(Request $request, $id)
    {
        // Logique de mise à jour de commande ici
    }

    public function cancel($id)
    {
        // Logique d'annulation de commande ici
    }


    public function thankYou()
    {
        Session::flash('thanks','votre commande a bien ete traitee');
        return View('checkout.thankyou',[
            "categories" => Categorie::select("id","name")->get()
        ]);
    }

   

}
