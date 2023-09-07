<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\View\View;
class CartController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth");
    }
    
    public function index()
    {
        return  View('cart.index');
    }

    public function increase(string $rowId)
    {
       $product = Cart::get($rowId);

       if($product->qty < Product::find($product->id)->quantity)
       {
            Cart::update($rowId,$product->qty + 1);
            return redirect()->route('cart.index');
       }
       return redirect()->route('cart.index')->with("danger","impossible d'ajouter au panier");



    }

    public function decrease(string $rowId)
    {
        $product = Cart::get($rowId);
        Cart::update($rowId,$product->qty - 1);
       return redirect()->route('cart.index');
    }

    public function store(Request $request)
    {
        $duplicata = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === (int)$request->id;
        });
    
        if (count($duplicata) > 0) {
            return redirect()->route('product.index')->with('danger', 'Le produit a déjà été ajouté.');
        }
    
        $product = Product::find($request->id);
        Cart::add($product->id,$product->name, 1, $product->price)->associate(Product::class);
    
        return redirect()->route('product.index')->with('success', 'Le produit a été ajouté.');
    }
    

    public function destroy()
    {
        Cart::destroy();
        return redirect()->route('product.index')->with('success','le panier a ete vide');

    }

    public function remove(string $rowId)
    {
        Cart::remove($rowId);
        return redirect()->route('cart.index')->with('success','le produit a ete supprimer');
    }
}
