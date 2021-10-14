<?php

namespace App\Models;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
  protected $guarded = ['id'];

  use HasFactory;

  // Relacion uno a muchos inversa
  public function user()
  {
    return $this->belongsTo(User::class);
  }
  public function courses()
  {
    return $this->belongsTo(Course::class);
  }
}
