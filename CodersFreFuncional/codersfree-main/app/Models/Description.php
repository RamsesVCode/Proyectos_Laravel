<?php

namespace App\Models;

use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
  protected $guarded = ['id'];

  use HasFactory;

  //Relacion 1-1 inversa
  public function lesson()
  {
    return $this->belongsTo(Lesson::class);
  }
}
