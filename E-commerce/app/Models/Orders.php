<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
     
    protected  $cast = [
    ];

    protected $fillable = ['user_id','order_statut','amounts','address'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function detailOrder()
    {
        return $this->hasMany(detailOrder::class);
    }
}
