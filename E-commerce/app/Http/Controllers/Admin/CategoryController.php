<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormCategoryRequest;
use App\Models\Categorie;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return View("admin.categories.index",[
            "categories" => Categorie::orderBy("created_at","desc")->paginate(5)
        ]);
    }

  
    public function create()
    {
        return View("admin.categories.create",[
            "category" => new Categorie()
        ]);
    }

    public function store(FormCategoryRequest $request)
    {
        Categorie::create($request->validated());
        return redirect()->route("admin.category.index")->with("success", "la categorie a ete create ");
    }

    public function show(string $id)
    {
        //
    }

  
    public function edit($id)
    {
        $category = Categorie::find($id);
        return View("admin.categories.edit",[
            "category" => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FormCategoryRequest $request, string $id)
    {
        $category = Categorie::find($id);
        $category->update($request->validated());
        return redirect()->route("admin.category.index")->with("success", "la categorie a ete update ");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Categorie::find($id);
        $category->delete();
        $category->products()->detach();
        return redirect()->route("admin.category.index")->with("success", "la categorie a ete delete ");
    }
}
