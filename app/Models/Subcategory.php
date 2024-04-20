<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;

class Subcategory extends Model
{
    use HasFactory;

    protected $table = 'subcategories';
    protected $fillable = ['name', 'alias', 'hidden', 'featured', 'meta_keyword', 'meta_description', 'categories_id'];
    public function categories()
    {
        return $this->hasOne(Category::class, 'id', 'categories_id');
    }
    public function products()
    {
        return $this->hasMany(Product::class, 'subcategories_id');
    }
}
