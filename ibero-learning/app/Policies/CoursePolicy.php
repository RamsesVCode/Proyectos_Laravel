<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Course;
use Illuminate\Auth\Access\HandlesAuthorization;

class CoursePolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }
    public function purchaseCourse(User $user,Course $course){
        $isTeacher = $user->id == $course->user_id;
        $coursePurchased = $course->students->contains($user->id);
        return !$isTeacher  && !$coursePurchased;
    }
    public function review(User $user, Course $course){
        $coursePurchased = $course->students->contains($user->id);
        $review = $course->reviews->contains($user->id);
        return $coursePurchased && !$review;
    }
}
