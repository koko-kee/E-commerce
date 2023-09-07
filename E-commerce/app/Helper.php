<?php

use App\Models\Product;

function getPrice($price)
{
   return number_format($price,'0', ' ' , ' ');
}


function getImage(int $id)
{
  return  Product::find($id)->image;
}