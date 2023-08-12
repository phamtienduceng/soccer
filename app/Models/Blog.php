<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blogs';

    protected $primaryKey = 'post_id';

    protected $fillable = [
        'user_id',
        'title',
        'content',
        'category',
        'image',
        'published'=>'Inactive',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function cate()
    {
        return $this->belongsTo(Cate_blog::class, 'category', 'cate_blog_id');
    }
    
    public $timestamps = true;

    protected $dates = ['created_at', 'updated_at'];
}