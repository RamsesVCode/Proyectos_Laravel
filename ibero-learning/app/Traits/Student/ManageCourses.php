<?php
namespace App\Traits\Student;

use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

trait ManageCourses {
    public function courses() {
        $courses = auth()->user()->purchasedCourses();
        return view('student.courses.index', compact('courses'));
    }
    public function downloadInvoice(){
        $users = User::all();
        $path = Storage::url(Course::all()->random()->picture);
        $pdf = \PDF::loadView('student.invoice',compact('users','path'));
        // dd($pdf);
        // return $this->attachData($pdf->output(),'reporte.pdf',['mime'=>'application/pdf']);
        // return $pdf->download("reporte.pdf");
        return $pdf->stream("reporte.pdf");
    }
}
