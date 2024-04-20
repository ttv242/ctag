<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table = 'brands';
    protected $fillable = [
        'name',
        'alias',
        'img',
        'hidden',
        'featured',
        'meta_keyword',
        'meta_description',
    ];
    public function products()
    {
        return $this->hasMany(Product::class, 'brands_id');
    }
}
