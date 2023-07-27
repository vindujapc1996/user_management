<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=[
        'product_name',
        'product_detail',
        'image',
        'product_price',
        'discount',
    ];
    protected $primaryKey='product_id';
    use HasFactory;
}
