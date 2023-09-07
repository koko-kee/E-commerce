<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ["name","slug","subtitle","description","quantity","price","image"];

    public  function getPrice()
    {
      return number_format($this->price,'0', ' ' , ' ') .'   ' . 'FCFA';
    }

    public function shortText($texte_original,$longueur_maximale)
    {
        return substr($texte_original, 0, $longueur_maximale) . '...';
    }
    
    public function categories()
    {
        return $this->belongsToMany(Categorie::class);
    }
    
}
