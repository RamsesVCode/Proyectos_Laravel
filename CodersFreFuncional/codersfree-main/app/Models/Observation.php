<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Observation extends Model
{
  use HasFactory;

  protected $fillable = ['body', 'course_id'];


  // Relacion 1 a 1 inversa
  public function course()
  {
    return $this->belongsTo(Course::class);
  }
}
