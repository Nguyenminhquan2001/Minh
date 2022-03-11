<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $table ='bills';
    protected $fillable = [
                'usename_buy_product',
                'checkout_id', 
                'customer_id',
                'date_order',
                'product_qty',
                'product_totalprice',
                'payment',
                'note'

        ];
   
}
