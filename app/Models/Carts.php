<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    use HasFactory;
    protected $table = 'carts';
    protected $fillable = [
        'user_id' ,
        'product_id' ,
        'product_quantity'
    ];
    public function products(){
        return $this->belongsTo(Product::class , "product_id" , "id");
    }
}
