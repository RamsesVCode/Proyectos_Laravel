<?php

namespace App\Models;

use App\Models\Reaction;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

  protected $guarded = ['id'];

  use HasFactory;

  // Relaciones 1-N inversa
  public function user()
  {
    return $this->belongsTo(User::class);
  }

  // Relacion polimorfica
  public function commentable()
  {
    return $this->morphTo();
  }

  // Relacion 1-N polimorfica
  public function comments()
  {
    return $this->morphMany(Comment::class, 'commentable');
  }
  public function reactions()
  {
    return $this->morphMany(Reaction::class, 'reactionable');
  }
}
