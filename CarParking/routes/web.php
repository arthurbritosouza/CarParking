<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CarParkingController;

use App\Models\Carros;
use App\Models\Reserva;
use App\Models\Usuario;
Route::get('/', function(){
    return redirect()->route('login');
});
Route::post('/login',[LoginController::class,'login']);
Route::post('/registrar',[LoginController::class,'registrar']);
Route::post('/cadastrar_veiculos',[CarParkingController::class,'cadastrar_veiculos']);
Route::get('/devolvido/{id}',[CarParkingController::class,'devolvido']);
Route::get('/estacionado/{id}',[CarParkingController::class,'estacionado']);
Route::get('/excluir_carros/{id}',[CarParkingController::class,'excluir_carros']);
Route::post('/cadastrar_reserva',[CarParkingController::class,'cadastrar_reserva']);

Route::get('/login', function(){
    return view('carparking/login');
})->name('login');

Route::get('/registrar', function(){
    return view('carparking/registrar');
});

Route::get('/dashboard', function () {
    $estacionados = Carros::where('user_id',Auth::user()->id)->where('status',1)->count();
    $reservados = Reserva::where('user_id',Auth::user()->id)->count();
    $devolvidos = Carros::where('user_id',Auth::user()->id)->where('status',2)->count();
    //dd($reservados);
    return view('carparking/dashboard',['estacionados' => $estacionados,'reservados' => $reservados,'devolvidos' => $devolvidos]);
})->name('dashboard');

Route::get('/veiculos', function () {
    $vec = Carros::where('user_id',Auth::user()->id)->where('status',1)->get();
    return view('carparking/veiculos',['vec' => $vec]);
})->name('veiculos');

Route::get('/veiculos_devolvidos', function () {
    $vec = Carros::where('user_id',Auth::user()->id)->where('status',2)->get();
    return view('carparking/veiculos_devolvidos',['vec' => $vec]);
})->name('veiculos_devolvidos');

Route::get('/reservas', function () {
    $reserva = Reserva::where('user_id',Auth::user()->id)->get();
    return view('carparking/reservas',['reserva' => $reserva]);
})->name('reservas');

