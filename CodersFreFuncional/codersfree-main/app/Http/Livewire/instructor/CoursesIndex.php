<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

class CoursesIndex extends Component
{
  public $search;

  use WithPagination;

  public function render()
  {
    $courses = Course::where('user_id', auth()->user()->id)
      ->where('title', 'LIKE', '%' . $this->search . '%')
      ->latest('id')
      ->paginate(8);
    return view('livewire.instructor.courses-index', compact('courses'));
  }

  public function limpiar_page()
  {
    $this->reset('page');
  }
}
