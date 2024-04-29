<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class General extends Model
{
    use HasFactory;
    protected $table = 'general';

    protected $fillable = [
        'id', 'meta_keyword',
        'meta_description', 'company_name',
        'introduce', 'email',
        'facebook', 'phone',
        'logo'
    ];
}
