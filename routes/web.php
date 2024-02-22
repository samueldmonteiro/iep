<?php

use Illuminate\Support\Facades\Route;
use App\Models\Course;
use App\Models\Polo;
use App\Models\Registration;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PoloController;
use App\Http\Controllers\Admin\PanelController;

use App\Http\Controllers\RegistrationController;
use \App\Http\Middleware\Authenticate;


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
        'courses' => Course::limit(3)->get(),
        'polos' => Polo::all()
    ]);
})->name('front.index');

Route::get('/contato', function () {
    return view('front.contact');
})->name('front.contact');


Route::resource('cursos', CourseController::class)->parameter('cursos', 'course')->names('courses');


Route::resource('polos', PoloController::class)->parameter('polos', 'polo')->names('polos');



Route::controller(RegistrationController::class)->group(function () {
    Route::post('/subscribe', 'subscribe');
    Route::post('/checkpayment', 'checkPayment');
    Route::any('/notificationpayment', 'notificationPayment');
    Route::get('/sucesso/{id}', 'successRegister');

});


Route::get('/check', function(){
    foreach(Registration::all() as $reg){
        echo "Nome: " . $reg->name . " CPF: " . $reg->cpf . " Pagamento" . $reg->payment . "<br>";
    }
});


Route::controller(PanelController::class)->prefix('admin')->middleware('auth')->group(function(){
    Route::get('/', 'index')->name('admin.index');
    Route::get('/acesso', 'loginPage')->name('admin.loginPage')->withoutMiddleware('auth');
    Route::post('/login', 'login')->name('admin.login')->withoutMiddleware('auth');
    Route::get('/sair', 'logout')->name('admin.logout');

    Route::get('/criar/curso', 'createCourse')->name('admin.createCourse');
    Route::get('/criar/polo', 'createPortal')->name('admin.createPortal');
});