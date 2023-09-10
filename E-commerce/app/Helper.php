<?php

use App\Models\Categorie;
use App\Models\Product;

function getPrice($price)
{
   return number_format($price,'0', ' ' , ' ');
}

function getImage(int $id)
{
  return  Product::find($id)->image;
}

function getCategories(int $id)
{
  return  Product::find($id)->load("categories")->categories;
}