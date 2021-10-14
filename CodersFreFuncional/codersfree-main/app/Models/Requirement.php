<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
  protected $guarded = ['id'];

  use HasFactory;

  // Relacion uno a muchos inversa
  public function courses()
  {
    return $this->belongsTo(Course::class);
  }
}
