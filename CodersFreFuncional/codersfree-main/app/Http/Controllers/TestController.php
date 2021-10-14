<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller

{
  public $estados, $estado;

  public function index()
  {

    $usuario = auth()->user();
    $courses = Course::select('id', 'title')
      ->get();

    $estados = ['propios', 'no propios', 'todos'];
    $estado = 1;

    return view('tests.show', compact('courses', 'usuario', 'estado'));
  }
}
