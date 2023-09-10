<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
     
    protected $casts = [
        'created_at' => 'date',
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

    public function getDate()
    {
        $date = new DateTime($this->created_at);
        
        return $date->format("Y-m-d");
    }
}
