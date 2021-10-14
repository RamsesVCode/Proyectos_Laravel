<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
    ];
    use HasFactory;
    public function getRouteKeyName()
    {
        return 'slug';
    }
    //Relacion uno a muchos entre categoria y post
    public function posts(){
        return $this->hasMany(Post::class);
    }
}
