<?php

namespace App\Http\Controllers;

use App\Events\CancelOrderProcessed;
use App\Models\Orders;
use App\Models\Categorie;
use Illuminate\View\View;
use App\Mail\OrderCarryOut;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Events\confirmOrderProcessed;
use App\Models\detailOrder;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Database\Eloquent\Builder;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        $orders = Orders::where('user_id', Auth::id())
                        ->orderBy("created_at","desc")
                        ->paginate(10);
        return view('orders.index',[
            "orders" => $orders
        ]);
    }

    
    public function show($id)
    {
        $order = Orders::findOrFail($id);
        $count = $order->detailOrder->count();
        $countArticle = $order->detailOrder->count() > 1  ? "$count Articles" : "$count Article" ;
        return view('orders.show',  [
            "order" => $order,
            "count" => $countArticle
        ]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            "address" => ["required"],
            "tel" => ["required","numeric", "digits:9"] 
        ]);



        $orders = Orders::create([

            'user_id' => $user->id,
            'amounts' => Cart::subtotal(),
            'address' => $request->input("address"),
            'tel' => $request->input("tel")
        ]);

        foreach (Cart::content() as $cartItem) {

            $product = Product::find($cartItem->id);
            $product->quantity -= $cartItem->qty;
            $product->save();
            
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
    
        $detailOrder = DetailOrder::findOrFail($id);
        $order = Orders::findOrFail($detailOrder->orders_id);
        $product = Product::findOrFail($detailOrder->product_id);
         

        $product->quantity += $detailOrder->quantity;
        $product->save();

        $order->amounts -=  $detailOrder->quantity *  $product->price;
        $order->save(); 

        $detailOrder->delete();

        $numberOfDetails = $order->detailOrder->count();
    
        if ($numberOfDetails === 0) {

            $order->order_statut = "annulée";
            $order->save();
        }
    
        $user = Auth::user();
        event(new CancelOrderProcessed($user, $detailOrder));
        return  redirect()->route('order.cancelPage');
    }


    public function showFinalizeOrdersPage() : View
    {
        return View("orders.finalizeOrder",[
            "categories" => Categorie::select("id","name")->get()
        ]);
    }

    

    public function showClosedOrders()
    {
        $orders = Orders::where('user_id', Auth::id())
                    ->with([
                        'detailOrder' => function ($query)
                        {
                            $query->onlyTrashed()->orderBy("deleted_at", "desc");
                        }
                    ])
                    ->withCount([
                        'detailOrder' => function (Builder $query)
                        {
                            $query->onlyTrashed();
                        }
                    ])
                    ->paginate(10);

        return view('orders.closed', [
            "orders" => $orders
        ]);
    }

    public function thankYou()
    {
        Session::flash('thanks','votre commande a bien ete traitee');
        return View('orders.thankyou',[
            "categories" => Categorie::select("id","name")->get()
        ]);
    }

    public function cancelPage()
    {
        Session::flash('cancel','votre commande a bien ete annuler');
        return View('orders.cancel',[
            "categories" => Categorie::select("id","name")->get()
        ]);
    }

   

}
