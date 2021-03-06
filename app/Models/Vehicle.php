<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $guarded = [];
    public function order()
    {
        $this->hasMany(Order::class);
    }
    use HasFactory;
}
