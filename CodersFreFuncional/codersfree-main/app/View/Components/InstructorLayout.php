<?php

namespace App\View\Components;

use App\Models\Course;
use Illuminate\View\Component;

class InstructorLayout extends Component
{

  public $course;
  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($course = null)
  {
    $this->course = $course;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {
    return view('layouts.instructor');
  }
}
