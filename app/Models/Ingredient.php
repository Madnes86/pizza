<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
    ];

    /**
     * Получить блюда, в которые входит данный ингредиент.
     */
    public function dishes()
    {
        return $this->belongsToMany(Dish::class, 'dish_ingredient');
    }
}
