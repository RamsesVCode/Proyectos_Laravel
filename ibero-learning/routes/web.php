<?php

use App\Http\Controllers\BillingController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TopicController;
use App\Models\Course;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[WelcomeController::class,'index'])->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('courses',[CourseController::class,'index'])->name('courses.index');
Route::post('courses/search',[CourseController::class,'search'])->name('courses.search');
Route::get('courses/{course}',[CourseController::class,'show'])->name('courses.show');
Route::get("courses/{course}/learn",[CourseController::class,'learn'])->name('courses.learn')
->middleware('can_access_to_course');
Route::get('courses/{course}/review',[CourseController::class,'createReview'])->name('courses.reviews.create');
Route::post('courses/{course}/review',[CourseController::class,'storeReview'])->name('courses.reviews.store');
Route::get("courses/category/{category}",[CourseController::class,'category'])->name('courses.category');
Route::get("courses/{course}/topics",[TopicController::class,'index'])->name('courses.topics.index')
->middleware('can_access_to_course');



Route::get('teacher',[TeacherController::class,'index'])->name('teacher.index')
->middleware('teacher');
Route::get('teacher/courses',[TeacherController::class,'courses'])->name('teacher.courses');
Route::get('teacher/courses/create',[TeacherController::class,'createCourse'])->name('teacher.courses.create');
Route::post('teacher/courses/store',[TeacherController::class,'storeCourse'])->name('teacher.courses.store');
Route::get('teacher/courses/{course}',[TeacherController::class,'editCourse'])->name('teacher.courses.edit');
Route::put('teacher/courses/{course}',[TeacherController::class,'updateCourse'])->name('teacher.courses.update');

Route::get('teacher/units',[TeacherController::class,'units'])->name('teacher.units');
Route::get('teacher/units/create',[TeacherController::class,'createUnit'])->name('teacher.units.create');
Route::post('teacher/units/store',[TeacherController::class,'storeUnit'])->name('teacher.units.store');
Route::get('teacher/units/{unit:title}',[TeacherController::class,'editUnit'])->name('teacher.units.edit');
Route::put('tacher/units/{unit}',[TeacherController::class,'updateUnit'])->name('teacher.units.update');
Route::delete('teacher/units/{unit:title}',[TeacherController::class,'destroyUnit'])->name('teacher.units.destroy');

Route::get('teacher/coupons',[TeacherController::class,'coupons'])->name('teacher.coupons');
Route::get('teacher/coupons/create',[TeacherController::class,'createCoupon'])->name('teacher.coupons.create');
Route::post('teacher/store',[TeacherController::class,'storeCoupon'])->name('teacher.coupons.store');
Route::get('teacher/{coupon}',[TeacherController::class,'editCoupon'])->name('teacher.coupons.edit');
Route::put('teacher/{coupon}',[TeacherController::class,'updateCoupon'])->name('teacher.coupons.update');
Route::delete('teacher/{coupon}',[TeacherController::class,'destroyCoupon'])->name('teacher.coupons.destroy');

Route::get('student',[StudentController::class,'index'])->name('student.index')
->middleware('auth');
Route::get("student/credit-card",[BillingController::class,'creditCardForm'])->name("student.billing.credit_card_form");
Route::post("student/credit-card",[BillingController::class,'processCreditCardForm'])->name("student.billing.process_credit_card");
Route::get("student/courses",[StudentController::class,'courses'])->name("student.courses");
Route::get("student/orders",[StudentController::class,'orders'])->name('student.orders.index');
Route::get("student/orders/download_report",[StudentController::class,'download_report'])->name('student.orders.download_report');
Route::put("student/wishlist/{course}/toggle",[StudentController::class,'toggleItemOnWishList'])->name('student.wishlist.toggle');


Route::get("/add-course-to-cart/{course}",[StudentController::class,'addCourseToCart'])->name('add_course_to_cart');
Route::get("/cart",[StudentController::class,'showCart'])->name("cart");
Route::get('/remove-course-from-cart/{course}',[StudentController::class,'removeCourseFromCart'])->name('remove_course_from_cart');
Route::post('/apply-coupon',[StudentController::class,'applyCoupon'])->name('apply_coupon');


Route::get("checkout",[CheckoutController::class,'index'])->name("checkout_form")
->middleware("auth");
Route::post("/checkout",[CheckoutController::class,'processOrder'])->name("process_checkout");


Route::get("/teacher/profits",[TeacherController::class,'profits'])->name('teacher.profits');