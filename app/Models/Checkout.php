<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory; 
    
    protected $table ='checkouts';
    protected $fillable = [
       'Ho',
       'Ten',
       'Email',
        'SDT',
        'province_name',
       'district_name' ,           
        'ward_name',
        'Diachi',
        'Note'
        ];
}
