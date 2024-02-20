<?php

use Illuminate\Support\Facades\Route;
use App\Models\Course;
use App\Models\Registration;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PaymentController;

use App\Http\Controllers\RegistrationController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('front.index', [
        'courses' => Course::limit(3)->get()
    ]);
})->name('front.index');


Route::resource('cursos', CourseController::class)->parameter('cursos', 'course')->names('courses');



Route::controller(RegistrationController::class)->group(function () {
    Route::post('/subscribe', 'subscribe');
    Route::post('/checkpayment', 'checkPayment');
    Route::any('/notificationpayment', 'notificationPayment');
});


Route::get('/check', function(){
    foreach(Registration::all() as $reg){
        echo "Nome: " . $reg->name . " CPF: " . $reg->cpf . " Pagamento" . $reg->payment . "<br>";
    }
});