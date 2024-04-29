<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogDetail extends Model
{
    use HasFactory;
    protected $table = 'blog_details';
    protected $fillable = [
        'id', 'parent_id',
        'meta_keyword', 'meta_description',
        'content',
    ];
}
