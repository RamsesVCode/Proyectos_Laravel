<?php

namespace App\Models;

use App\Models\Comment;
use App\Models\Description;
use App\Models\Platform;
use App\Models\Reaction;
use App\Models\Resource;
use App\Models\Section;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
  use HasFactory;

  protected $guarded = ['id'];

  public function getCompletedAttribute()
  {
    return $this->users->contains(auth()->user()->id);
  }

  // Relacion 1-1
  public function description()
  {
    return $this->hasOne(Description::class);
  }

  // Relacion 1-n inversa
  public function section()
  {
    return $this->belongsTo(Section::class);
  }
  public function platform()
  {
    return $this->belongsTo(Platform::class);
  }

  // Relacion N-N inversa
  public function users()
  {
    return $this->belongsToMany(User::class);
  }

  // Relacion 1-1 polimorfica
  public function resource()
  {
    return $this->morphOne(Resource::class, 'resourceable');
  }

  // Relacion 1-N polimorfica
  public function comments()
  {
    return $this->morphMany(Comment::class, 'comentable');
  }

  public function reactions()
  {
    return $this->morphMany(Reaction::class, 'reactionable');
  }
}
