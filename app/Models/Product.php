<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\ProductDetail;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'name',
        'alias',
        'brands_id',
        'categories_id',
        'subcategories_id',
        'best_rated',
        'best_seller',
        'trend',
        'hidden',
        'featured',
        'target_time',
    ];
    public function categories()
    {
        return $this->hasOne(Category::class, 'id', 'categories_id');
    }
    public function subcategories()
    {
        return $this->hasOne(Subcategory::class, 'id', 'subcategories_id');
    }
    public function brands()
    {
        return $this->hasOne(Brand::class, 'id', 'brands_id');
    }
    public function product_details()
    {
        return $this->hasOne(ProductDetail::class, 'parent_id');
    }
    public function order_item()
    {
        return $this->hasMany(OrderItem::class, 'products_id');
    }
}
