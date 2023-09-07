<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormProductRequest;
use App\Models\Categorie;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    
    public function index()
    {
        return View("admin.products.index",[
            "products" => Product::orderBy("created_at","desc")->paginate(5)
        ]);
    }

    
    public function create()
    {
        return View("admin.products.create",[

            "product" => new Product(),
            "categories" => Categorie::all()
        ]);
    }


    public function store(FormProductRequest $request)
    {
        $data =  $request->validated();
        $imagePath = $request->validated("image")->store("produit","public");
        $data["image"] = $imagePath;
        $product = Product::create($data);
        $product->categories()->attach($data["categories"]);
        return redirect()->route("admin.product.index")->with("success","produit cree avec success");
    }

    public function show(string $id)
    {
        //  
    }

    public function edit(string $slug)
    {
        $product = Product::where("slug", $slug)->first();
        return View("admin.products.edit",[
            "product" => $product,
            "categories" => Categorie::all()
        ]);
    }

    public function update(FormProductRequest $request, Product $product)
    {
        $data = $request->validated();

        if(isset($data["image"]))
        {
            if ($product->image) {

                Storage::disk("public")->delete($product->image);
            }

            $data["image"] = $data["image"]->store("produit","public");
        }

        $product->categories()->sync($data["categories"]);
        $product->update( $data);
        return redirect()->route("admin.product.index")->with("success"," Le produit a ete editer  ");
    }

    
    public function destroy(Product $product)
    {
        if($product->image)
        {
            Storage::disk("public")->delete($product->image);
        }
        $product->delete();
        $product->categories()->detach();
        return redirect()->route("admin.product.index")->with("success","Le produit a ete supprimer ");
    }
}
