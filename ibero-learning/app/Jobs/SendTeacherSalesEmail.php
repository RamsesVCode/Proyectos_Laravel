<?php

namespace App\Jobs;

use App\Mail\TeacherNewSale;
use App\Models\Course;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendTeacherSalesEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $teacher;
    public $student;
    public $course;
    
    public function __construct(User $teacher, User $student,Course $course)
    {
        $this->teacher = $teacher;
        $this->student = $student;
        $this->course = $course;
    }
    public function handle()
    {
        try{
            Mail::to($this->teacher->email)
            ->send(new TeacherNewSale($this->teacher,$this->student,$this->course));
        }catch(\Exception $ex){
            \Log::info($ex->getMessage());
        }
    }
}
