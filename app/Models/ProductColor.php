<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    use HasFactory;
    protected $table = 'product_colors';
    protected $fillable = [
        'product_id',
        'color',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function product_color_size()
    {
        return $this->hasMany(ProductColorSize::class);
    }

}
