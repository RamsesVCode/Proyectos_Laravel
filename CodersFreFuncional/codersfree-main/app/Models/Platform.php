<?php

namespace App\Models;

use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
  protected $guarded = ['id'];

  use HasFactory;

  // relacion 1-n
  public function lessons()
  {
    return $this->hasMany(Lesson::class);
  }
}
