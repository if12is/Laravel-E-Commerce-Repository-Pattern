<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'order_number',
        'user_id',
        'status',
        'payment_method',
        'payment_status',
        'payment_id',
        'total_amount',
        'payment_type',
        'payment_details',
        'shipping_address',
        'shipping_name',
        'shipping_price',
        'shipping_phone',
        'shipping_email',
        'shipping_city',
        'shipping_country',
        'shipping_zip',
        'shipping_notes'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
