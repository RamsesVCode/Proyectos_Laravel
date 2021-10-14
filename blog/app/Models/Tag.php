<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'color',
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }
    use HasFactory;
    //Relacion muchos a muchos con las etiquetas
    public function posts(){
        return $this->belongsToMany(Post::class);
    }
}
