<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BlogDetail;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blogs';
    protected $fillable = [
        'id', 'title',
        'summary', 'img'
    ];
    public function blog_detail()
    {
        return $this->hasOne(BlogDetail::class,'parent_id', 'id');
    }
}
