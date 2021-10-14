<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const PENDING = 'PENDING';
    const SUCCESS = 'SUCCESS';
    use HasFactory;
    protected $fillable = [
        'user_id',
        'total_amount',
        'status',
    ];
    public function orderlines(){
        return $this->hasMany(OrderLine::class);
    }
}
