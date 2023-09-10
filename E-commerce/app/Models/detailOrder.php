<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailOrder extends Model
{
    use HasFactory;

    protected $fillable = ['product_id','quantity','unity_price'];
    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
    ];

    public function order()
    {
        return $this->belongsTo(Orders::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }


}
