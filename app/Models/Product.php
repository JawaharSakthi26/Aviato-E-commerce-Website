<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category','prodName','prodDescription','prod_price','prodSku','prodQuantity'
    ];

    public function images()
    {

        return $this->hasMany(ProductImage::class, 'prod_Id');
        
    }
}
