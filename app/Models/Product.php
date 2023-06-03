<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'discount',
        'stock',
        'category_id'
    ];


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function product_color_size()
    {
        return $this->hasMany(ProductColorSize::class, 'product_id');
    }

    public function order_detail()
    {
        return $this->hasMany(OrderDetail::class, 'product_id');
    }

    public function product_image()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function product_color()
    {
        return $this->hasMany(ProductColor::class, 'product_id');
    }

    public function product_size()
    {
        return $this->hasMany(ProductSize::class, 'product_id');
    }
}
