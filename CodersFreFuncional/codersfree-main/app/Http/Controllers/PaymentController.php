<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use PhpParser\Node\Stmt\TryCatch;

/* require __DIR__  . '/vendor/autoload.php'; */

class PaymentController extends Controller
{

  public function checkout(Course $course)
  {
    $header = config('paypal.paypal.client_id');
    $token = 'algo';

    return view('payment.checkout', compact('course', 'header', 'token'));
  }

  public function failFull($courseId, $data)
  {
    $course = Course::find($courseId);

    return redirect()->route('payment.checkout', $course)->with('failed', 'Su pago no se concreto, por favor, vuelva a intentarlo');
  }

  public function failed($courseId, $data)
  {
    $course = Course::find($courseId);

    return redirect()->route('payment.checkout', $course)->with('failed', 'Su pago no se concreto, por favor, vuelva a intentarlo');
  }

  public function approved($courseId, $details)
  {

    $course = Course::find($courseId);
    $course->students()->attach(auth()->user()->id);
    return redirect()->route('courses.status', $course)->with('approved', 'Gracias por su compra, el curso queda habilitado.');
  }
}
