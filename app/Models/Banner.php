<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $table = 'banner';
    protected $fillable = [
        'id', 'parent_id',
        'title', 'img', 'url'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class, 'id');
    }
}
