<?php

namespace App\Models;

use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'total_price',
        'fname',
        "lname",
        'email',
        'address1',
        'address2',
        'phone',
        'city',
        'state',
        'country',
        'zipcode' ,
        'status', 
        'message',
        'tracking_no'
    ];

    public function orderitems(){
        return $this->hasMany(OrderItem::class);
    }
}
