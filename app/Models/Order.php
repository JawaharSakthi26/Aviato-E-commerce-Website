<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','name','address','zip_code','city','country','product_total'
    ];

    public function order_details(){

        return $this->hasMany(Order_details::class);
        
    }
}
