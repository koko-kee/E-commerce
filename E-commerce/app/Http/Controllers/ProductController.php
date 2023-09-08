<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    
    public function index() : View
    {
        return View('products.index', [
            'products' => Product::orderBy('created_at', 'desc')
                ->with("categories")
                ->paginate(10),
            "categories" => Categorie::select("id","name")->get()
        ]);
    }
    

    public function show(string $slug) : View
    {

        $product = Product::where('slug',$slug)->first();
        $stock = $product->quantity == 0 ? "indisponible" : "disponible" ;

        return  View('products.show',[
            'product' => $product->load("categories"),
            "categories" => Categorie::select("id","name")->get(),
            "stock" => $stock
        ]);
    }
}
