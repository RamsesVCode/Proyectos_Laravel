<?php

namespace App\Models;

use App\Traits\Student\ManageCourses;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use Billable;

    const ADMIN='ADMIN';
    const TEACHER='TEACHER';
    const STUDENT='STUDENT';
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function isTeacher(){
        return $this->role == User::TEACHER;
    }
    public function courses_learning(){
        return $this->belongsToMany(Course::class,"course_student");
    }
    public function orders(){
        return $this->hasMany(Order::class);
    }
    public function scopePurchasedCourses(){
        return $this->courses_learning()->with("categories")->paginate();
    }
    public function scopeConfirmedOrders(){
        return $this->orders()->with("orderlines")->paginate();
    }
    public function getTotalOrderAttribute(){
        return $this->orders()->pluck("total_amount")->sum();
    }
}
