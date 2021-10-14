<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_ud','user_id',
    ];
    public static function booted(){
        parent::boot();
        if(!app()->runningInConsole()){
            self::creating(function ($table){
                $table->user_id = auth()->id();
            });
        }
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function course(){
        return $this->belongsTo(Course::class);
    }
}
