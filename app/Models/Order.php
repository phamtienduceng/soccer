<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'order_id';

    protected $fillable = [
        'order_status',
        'shipping_id',
        'payment_id',
        'customer_id',
        'order_total',
    ];
}