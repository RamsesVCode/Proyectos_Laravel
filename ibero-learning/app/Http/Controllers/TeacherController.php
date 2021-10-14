<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Traits\Teacher\ManageCoupon;
use Illuminate\Http\Request;
use App\Traits\Teacher\ManageCourses;
use App\Traits\Teacher\ManageProfits;
use App\Traits\Teacher\ManageUnits;

class TeacherController extends Controller
{
    use ManageCourses, ManageUnits, ManageCoupon, ManageProfits;
    public function index(){
        return view('teacher.index');
    }
    public function profits(){
        return view("teacher.profits.index");
    }
}
