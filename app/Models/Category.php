<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Subcategory;
use App\Models\Brand;
use App\Models\Product;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = ['name', 'alias', 'hidden', 'featured', 'meta_keyword', 'meta_description'];
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class, 'categories_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'categories_id');
    }
}
