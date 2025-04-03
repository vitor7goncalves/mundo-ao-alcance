<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DestinationsController;
use App\Http\Controllers\PaymentController;

Route::get("/", [HomeController::class, "home"])->name("home");
Route::get("/viagens-brasil", [DestinationsController::class, "brazilDestinations"])->name("brazilDestinations");
Route::get("/viagens-internacionais", [DestinationsController::class, "worldDestinations"])->name("worldDestinations");
Route::get("/entrar", [UserController::class, "login"])->name('login');
Route::get('/registrar-se', [UserController::class, 'register'])->name('register');
Route::get('/process-payment', [PaymentController::class,'payment'])->name('payment');

Route::post('/entrar', [UserController::class, 'authenticate'])->name('authenticate');
Route::post('/registrar-se', [UserController::class, 'store'])->name('store');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::post('/process-payment', [PaymentController::class, 'processPayment'])->name('processPayment');

Route::middleware(['auth'])->group(function () {
    Route::get('/meus-pacotes', [DestinationsController::class, 'getDestinations'])->name('getDestinations');
    Route::get('/cliente-area', [UserController::class, 'clientArea'])->name('clientArea');
    Route::post('excluir-usuario', [UserController::class, 'deleteUser'])->name('deleteUser');
    Route::post('/trocar-nome', [UserController::class, 'tradeName'])->name('tradeName');
    Route::post('/troca-telefone', [UserController::class, 'tradePhone'])->name('tradePhone');
    Route::post('/trocar-email', [UserController::class, 'tradeEmail'])->name('tradeEmail');
    Route::post('/trocar-senha', [UserController::class, 'tradePassword'])->name('tradePassword');
    Route::post('/meus-pacotes', [UserController::class, 'removeDestinations'])->name('removeDestinations');
    Route::post('/brazil', [UserController::class, 'updateTravelPackageBrazil'])->name('updateTravelPackageBrazil');
    Route::post('/world', [UserController::class, 'updateTravelPackageWorld'])->name('updateTravelPackageWorld');
});

