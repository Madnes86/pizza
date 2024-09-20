<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image_path',
        'price',
    ];

    /**
     * Получить позиции заказов, в которых присутствует данное блюдо.
     */
    public function orderPositions()
    {
        return $this->hasMany(OrderPosition::class);
    }

    /**
     * Получить ингредиенты, которые входят в состав данного блюда.
     */
    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'dish_ingredient');
    }
}
