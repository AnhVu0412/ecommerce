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
        'message',
        'status',
        'tracking_no'
    ];
    public function items() {
        return $this->hasMany('App\Models\OrderItem');
    }
}
