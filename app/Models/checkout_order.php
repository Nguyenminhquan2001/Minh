<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class checkout_order extends Model
{
    use HasFactory;
    protected $table ='checkout_orders';
    protected $fillable = [
             
        'id_checkout',
        'bill_id',       
        'product_id',
        'product_name', 
        'soluong',
        'toltal_price',
        'payment'
        ];
}
