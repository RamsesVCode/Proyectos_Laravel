<?php
namespace App\Traits;

use App\Models\Coupon;
use App\Models\Course;
use App\Services\Cart;
use Illuminate\Http\Request;

trait ManageCart{
    public function showCart(){
        return view("learning.cart");
    }
    public function addCourseToCart(Course $course){
        $cart = new Cart;
        $cart->addCourse($course);
        session()->flash("message",["success",__("Curso añadido al carrito correctamente")]);
        return redirect()->route('cart');
    }
    public function removeCourseFromCart(Course $course){
        $cart = new Cart;
        $cart->removeCourse($course->id);
        session()->flash("message",["success",__("Curso eliminado del carrito correctamente")]);
        return back();
    }
    public function applyCoupon(Request $request){
        session()->remove("coupon");
        session()->save();
        $code = $request->coupon;
        $coupon = Coupon::available($code)->first();
        if(!$coupon){
            session()->flash("message",["danger",__("El cupon introducido no existe")]);
            return back();
        }
        $cart = new Cart;
        $coursesInCart = $cart->getContent()->pluck("id");
        $totalCourses = $coupon->courses()->whereIn("id",$coursesInCart)->count();

        if($totalCourses){
            session()->put("coupon",$code);
            session()->save();
            session()->flash("message",["success",__("El cupon se ha aplicado correctamente")]);
            return back();
        }
        session()->flash("message",["danger",__("El cupon no se puede aplicar")]);
        return back();
    }
}

?>