<?php
namespace App\Services;
use App\Helpers\Currency;
use App\Models\Coupon;
use App\Models\Course;
use Illuminate\Support\Collection;
class Cart{
    protected Collection $cart;
    public function __construct(){
        if(session()->has("cart")){
            $this->cart = session()->get("cart");
        }else{
            $this->cart = new Collection();
            // $this->cart = [];
        }
    }
    public function getContent(){
        return $this->cart;
    }
    public function save(){
        // session("cart",$this->cart);
        session()->put("cart",$this->cart);
        session()->save();
    }
    public function addCourse(Course $course){
        $this->cart->push($course);
        $this->save();
    }
    public function removeCourse(int $id){
        $this->cart = $this->cart->reject(function(Course $course) use ($id){
            return $course->id == $id;
        });
        $this->save();
    }
    public function totalAmount($formatted = false){
        $ammount = $this->cart->sum(function(Course $course){
            return $course->price;
        });
        if($formatted){
            return Currency::formatCurrency($ammount);
        }
        return $ammount;
    }
    public function taxes($formatted = true){
        $total = $this->totalAmount(false);
        if($total){
            $total = ($total*env('TAXES'))/100;
            if($formatted){
                return Currency::formatCurrency($total);
            }
            return $total;
        }
        return 0;
    }
    public function hasProducts(){
        return $this->cart->count();
    }
    public function clear(){
        $this->cart = new Collection();
    }
    public function totalAmountWithDiscount($formatted = true){
        $amount = $this->totalAmount(false);
        $withDiscount = $amount;
        if (session()->has("coupon")){
            $coupon = Coupon::available(session("coupon"))->first();
            if (!$coupon) {
                return $amount;
            }
            $coursesInCart = $this->getContent()->pluck("id");
            if ($coursesInCart) {
                // courses attached to coupon in database
                $coursesForApply = $coupon->courses()->whereIn("id", $coursesInCart);

                // id courses attached on database for apply coupon
                $idCourses = $coursesForApply->pluck("id")->toArray();

                if (!count($idCourses)) {
                    $this->removeCoupon();
                    session()->flash("message", ["danger", __("El cupón no se puede aplicar")]);
                    return $amount;
                }

                // total price courses without discount applied
                $priceCourses = $coursesForApply->sum("price");

                // check discount type and apply
                if ($coupon->discount_type === Coupon::PERCENT) {
                    $discount = round($priceCourses - ($priceCourses * ((100 - $coupon->discount) / 100)), 2);
                    $withDiscount = $amount - $discount;
                }
                if ($coupon->discount_type === Coupon::PRICE) {
                    $withDiscount = $amount - $coupon->discount;
                }
            } else {
                $this->removeCoupon();
                return $amount;
            }
        }
        // if ($formatted) {
        //     return Currency::formatCurrency($withDiscount);
        // }
        return $withDiscount;
    }
    protected function removeCoupon(){
        session()->remove("coupon");
        session()->save();
    }
}
?>