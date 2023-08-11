<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'products_id';

    protected $fillable = [
        'products_model',
        'categories_id',
        'products_thumbnails',
        'products_price',
        'products_material',
        'products_size',
        'products_style',
        'products_maxload',
        'products_status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id');
    }
}
