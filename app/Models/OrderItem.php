<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_item';

    protected $fillable = [
        'parent_id',
        'products_id',
        'amount',
    ];


    public function order()
    {
        return $this->hasOne(Order::class, 'id', 'parent_id');
    }

    public function products()
    {
        return $this->hasOne(Product::class, 'id', 'products_id');
    }
}
