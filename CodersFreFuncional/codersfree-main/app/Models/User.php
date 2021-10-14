<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Profile;
use App\Models\Review;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
  use HasApiTokens;
  use HasFactory;
  use HasProfilePhoto;
  use HasTeams;
  use Notifiable;
  use TwoFactorAuthenticatable;
  use HasRoles;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name', 'email', 'password',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password',
    'remember_token',
    'two_factor_recovery_codes',
    'two_factor_secret',
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];

  /**
   * The accessors to append to the model's array form.
   *
   * @var array
   */
  protected $appends = [
    'profile_photo_url',
  ];
  // Relacion 1 a 1
  public function profile()
  {
    return $this->hasOne(Profile::class);
  }

  // Relacion 1 a muchos
  public function courses_dictated()
  {
    return $this->hasMany(Course::class);
  }
  public function reviews()
  {
    return $this->hasMany(Review::class);
  }
  public function comments()
  {
    return $this->hasMany(Comment::class);
  }
  public function reactions()
  {
    return $this->hasMany(Reaction::class);
  }

  // Relacion N-N inversa
  public function courses_enrolled()
  {
    return $this->belongsToMany(Course::class);
  }

  public function lessons()
  {
    return $this->belongsToMany(Lesson::class);
  }
}
