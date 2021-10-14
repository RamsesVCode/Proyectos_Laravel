<?php
namespace App\Traits\Student;

use App\Models\Order;

trait ManageOrders {
    public function orders() {
        $orders = auth()->user()->orders;
        return view('student.orders.index', compact('orders'));
    }

    // public function showOrder(Order $order) {
    //     $order
    //         ->load("order_lines.course", "coupon")
    //         ->loadCount("order_lines");
    //     return view('student.orders.show', compact('order'));
    // }
    public function download_report(){
        $orders = auth()->user()->confirmedOrders();
        $totalOrder = auth()->user()->totalOrder;
        // dd(auth()->user()->totalOrder);
        $pdf = \PDF::loadView("student.orders.download_report",compact('orders','totalOrder'));
        return $pdf->stream("miarchivo.pdf");
    }
}
