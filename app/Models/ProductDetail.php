<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;

class ProductDetail extends Model
{
    use HasFactory;

    protected $table = 'product_details';
    protected $fillable = [
        "parent_id",
        "img",
        "album",
        "price",
        "discount",
        "summary",
        "description",
        "meta_keyword",
        "meta_description",
    ];
    public function product()
    {
        return $this->belongsTo(Product::class, 'id');
    }
}
