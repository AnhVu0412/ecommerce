<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class OrderItem extends Model
{
    use HasFactory;
    protected $table;
    protected $fillable = [
        'order_id',
        'prod_id',
        'price',
        'qty',

    ];


    /**
     * @return BelongsTo
     */
    public function products(): BelongsTo
    {
        return $this->belongsTo(Product::class,'prod_id','id');
    }

    public function order() {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
