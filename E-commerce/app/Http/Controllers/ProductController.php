<?php

namespace App\Http\Controllers;

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
                ->paginate(10)
        ]);
    }
    

    public function show(string $slug) : View
    {
        $product = Product::where('slug',$slug)->first();
        return  View('products.show',[
            'product' => $product
        ]);
    }
}
