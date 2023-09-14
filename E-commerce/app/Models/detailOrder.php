<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class detailOrder extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['product_id','quantity','unity_price'];

    protected $casts = [

        'deleted_at' => 'date',
        'created_at' => 'date',
    ];

    public function order()
    {
        return $this->belongsTo(Orders::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getDate()
    {
        $date = new DateTime($this->deleted_at);
        
        return $date->format("Y-m-d");
    }


}
