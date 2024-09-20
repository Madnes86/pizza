<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'issue',
    ];

    // Определяем связь с моделью Order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
