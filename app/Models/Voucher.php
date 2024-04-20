<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $table = 'voucher';

    protected $fillable = [
        'code',
        'percent',

    ];

    public function order()
    {
        return $this->hasMany(Order::class, 'voucher_id');
    }
}
