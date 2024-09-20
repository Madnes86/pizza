<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'status_id',
        'address',
        'delivery_time',
        'comment',
    ];

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function orderPositions()
    {
        return $this->hasMany(OrderPosition::class);
    }

    public function totalPrice()
    {
        return $this->orderPositions->sum(function ($position) {
            return $position->price * $position->quantity;
        });
    }
}
