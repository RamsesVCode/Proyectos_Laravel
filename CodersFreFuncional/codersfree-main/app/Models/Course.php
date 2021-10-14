<?php

namespace App\Models;

use App\Models\Audience;
use App\Models\Category;
use App\Models\Goal;
use App\Models\Image;
use App\Models\Lesson;
use App\Models\Level;
use App\Models\Observation;
use App\Models\Price;
use App\Models\Requirement;
use App\Models\Review;
use App\Models\Section;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
  use HasFactory;

  protected $guarded = ['id', 'status'];
  protected $withCount = ['students', 'reviews'];

  const BORRADOR = 1;
  const REVISION = 2;
  const PUBLICADO = 3;

  public function getRatingAttribute()
  {
    if ($this->reviews_count) {
      return round($this->reviews->avg('rating'), 1);
    } else {
      return 5;
    }
  }

  // Query Scopes
  public function scopeCategory($query, $category_id)
  {
    if ($category_id) {
      return $query->where('category_id', $category_id);
    }
  }
  public function scopeLevel($query, $level_id)
  {
    if ($level_id) {
      return $query->where('level_id', $level_id);
    }
  }
  public function scopeStatus($query, $state_id)
  {
    if ($state_id) {
      return $query->where('status', $state_id);
    }
  }

  public function getRouteKeyName()
  {
    return "slug";
  }

  // Relacion 1 a 1
  public function observation()
  {
    return $this->hasOne(Observation::class);
  }

  // Relacion 1 a muchos
  public function reviews()
  {
    return $this->hasMany(Review::class);
  }
  public function requirements()
  {
    return $this->hasMany(Requirement::class);
  }
  public function goals()
  {
    return $this->hasMany(Goal::class);
  }
  public function Audiences()
  {
    return $this->hasMany(Audience::class);
  }
  public function sections()
  {
    return $this->hasMany(Section::class);
  }

  // relacion 1 a muchos inversa
  public function teacher()
  {
    return $this->belongsTo(User::class, 'user_id');
  }
  public function level()
  {
    return $this->belongsTo(Level::class);
  }
  public function category()
  {
    return $this->belongsTo(Category::class);
  }
  public function price()
  {
    return $this->belongsTo(Price::class);
  }

  // relaci{on muchos a muchos
  public function students()
  {
    return $this->belongsToMany(User::class);
  }

  // Relacion 1-1 polimorfica
  public function image()
  {
    return  $this->morphOne(Image::class, 'imageable');
  }

  public function lessons()
  {
    return $this->hasManyThrough(Lesson::class, Section::class);
  }
}
