<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];
    use HasFactory;
    //Relacion uno a muchos inversa con users
    public function user(){
        return $this->belongsTo(User::class);
    }
    //Relacion uno a muchos inversa con categories
    public function category(){
        return $this->belongsTo(Category::class);
    }
    //Relacion muchos a muchos con tags
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
    //Relacion uno a uno polimorfica
    public function image(){
        return $this->morphOne(Image::class,'imageable');
    }
}
