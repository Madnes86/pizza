<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderPosition extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'dish_id',
        'price',
        'quantity',
    ];

    /**
     * Получить заказ, к которому относится позиция.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Получить блюдо, которое находится в позиции заказа.
     */
    public function dish()
    {
        return $this->belongsTo(Dish::class);
    }
}
