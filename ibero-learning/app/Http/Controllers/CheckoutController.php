<?php

namespace App\Http\Controllers;

use App\Jobs\SendTeacherSalesEmail;
use App\Mail\StudentNewOrder;
use App\Mail\TeacherNewSale;
use App\Models\Order;
use App\Services\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function index(){
        return view("learning.checkout.index");
    }
    public function processOrder(){
        $cart = new Cart();
        //Creando la orden
        $order = Order::create([
            'user_id' => auth()->id(),
            'total_amount'=>$cart->totalAmount(),
            'status' => Order::SUCCESS,
        ]);
        //Creando las lineas de orden
        foreach($cart->getContent() as $course){
            $order->orderlines()->create([
                'course_id' => $course->id,
                'price' => $course->price,
            ]);
        }
        //Creando los cursos de usuario
        $user = auth()->user();
        $courses = $cart->getContent()->pluck("id");
        $user->courses_learning()->attach($courses);
        $cart->clear();
        $email = new StudentNewOrder($user,$order);
        Mail::to($user->email)->send($email);
        foreach($order->orderlines as $linea){
            SendTeacherSalesEmail::dispatch(
                $linea->course->teacher,
                $user,
                $linea->course
            )->onQueue("emails");
        }
        session()->flash("message",["success","El pago se realizó con exito"]);
        return redirect()->route("courses.index");
    }
}
