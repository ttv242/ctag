<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order';

    protected $fillable = [
        'users_id',
        'voucher_id',
        'name',
        'phone',
        'address',
        'email',
        'note',
        'status',
    ];


    public function users()
    {
        return $this->hasOne(User::class, 'id', 'users_id');
    }
    public function voucher()
    {
        return $this->hasOne(Voucher::class, 'id', 'voucher_id');
    }
    public function order_item()
    {
        return $this->hasMany(OrderItem::class, 'parent_id');
    }
}
