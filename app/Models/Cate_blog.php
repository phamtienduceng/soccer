<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cate_blog extends Model
{
    use HasFactory;

    protected $table = 'categories_blog';

    protected $primaryKey = 'cate_blog_id';

    protected $fillable = [
        'name',
        'cate_blog_id',
    ];
}