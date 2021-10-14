<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
  protected $guarded = ['id'];

  use HasFactory;
  // Relacion 1-n inversa
  public function courses()
  {
    return $this->belongsTo(Course::class);
  }

  // Relacion 1-n
  public function lessons()
  {
    return $this->hasMany(Lesson::class);
  }
}
