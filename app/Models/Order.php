<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;

class Order extends Model
{
    use HasFactory;
    protected $table;
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'city',
        'address',
        'country',
        'total_price',
        'payment_mode',
        'payment_id',
        'message',
        'status',
        'tracking_no'
    ];
    public function orderitems() {
        return $this->hasMany(OrderItem::class);
    }
}
