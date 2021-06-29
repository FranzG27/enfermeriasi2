<?php

use App\Http\Controllers\NurseController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\FrontendController;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

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



Route::get('/', [App\Http\Controllers\FrontendController::class, 'index']);//anyone

Route::get('/new-appointment/{doctorId}/{date}', [App\Http\Controllers\FrontendController::class, 'show'])->name('create.appointment');//anyone can see the route but only patints can really make an appointment

Route::get('/dashboard',[App\Http\Controllers\DashboardController::class, 'index']);
        //when we send index at the end of the route we are saying that this route is going to the index method of the controller we are mentioning in the route

Route::group(['middleware'=>['auth','patient']],function(){

        Route::post('/book/appointment',[App\Http\Controllers\FrontendController::class, 'store'])->name('booking.appointment');//only patient

        Route::get('/my-booking',[App\Http\Controllers\FrontendController::class, 'myBookings'])->name('my.booking');//only patient

        Route::get('/user-profile',[App\Http\Controllers\ProfileController::class, 'index']);
        //only patient
        Route::post('/profile',[App\Http\Controllers\ProfileController::class, 'store'])->name('profile.store'); //only patient
        Route::post('/profile-pic',[App\Http\Controllers\ProfileController::class, 'profilePic'])->name('profile.pic');//only patient
        Route::get('/my-prescription',[App\Http\Controllers\FrontendController::class, 'myPrescription'])->name('my.prescription');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>['auth','admin']],function(){
    Route::resource('nurse', NurseController::class);
    
    

});

//cuando usamos Route::resource('user',xxx) estamos hacinedo referencia a todos los metodos del controlador resource que creamos de nurse, entonces por eso no hay necesidad de poner el nombre como en los get o catch
//y para llmar desde la url solo ponemos el nombre del controlador nurse/xxxx
//xxx= siendo el metodo del controlador que queremos llamar y ya dentro del metodo podemos llamar a una vista o una accion 
//Route::get('/nurse/create', [NurseController::class,'create'])->name('nurse.create');

Route::group(['middleware'=>['auth','nurse']],function(){
    
    Route::resource('appointment', AppointmentController::class);

    Route::post('/appointment/check',[AppointmentController::class,'check'])->name('appointment.check');
    
    Route::post('/appointment/update',[AppointmentController::class,'updateTime'])->name('update');

    Route::get('/patients',[App\Http\Controllers\PatientlistController::class, 'index'])->name('patient');
    Route::get('/patients/all',[App\Http\Controllers\PatientlistController::class, 'allTimeAppointment'])->name('all.appointments');
    Route::get('/status/update/{id}',[App\Http\Controllers\PatientlistController::class, 'toggleStatus'])->name('update.status');
    Route::get('patient-today',[App\Http\Controllers\PrescriptionController::class, 'index'])->name('patients.today');
    Route::Post('/prescription',[App\Http\Controllers\PrescriptionController::class, 'store'])->name('prescription');
    Route::get('/prescription/{userId}/{date}',[App\Http\Controllers\PrescriptionController::class, 'show'])->name('prescription.show');
    Route::get('/prescribed-patients',[App\Http\Controllers\PrescriptionController::class, 'patientsFromPrescription'])->name('prescribed.patients');
});
