<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
  protected $guarded = ['id'];

  use HasFactory;
  const LIKE = 1;
  const DISLIKE = 2;

  // Relaciones 1-N inversa
  public function user()
  {
    return $this->belongsTo(User::class);
  }

  // Relacion polimorfica
  public function reactionable()
  {
    return $this->morphTo();
  }
}
