<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ValuationController;
use Illuminate\Support\Facades\Route;

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

//  My Routes
Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get("/template", [DashboardController::class, "template"])->name("template");

    // route for ahp method
    Route::get('/ahp', [DashboardController::class, 'ahpView'])->name('ahp');
    Route::post('/ahp', [DashboardController::class, 'store'])->name('peoplevaluation.store');

    Route::get('/people', [PeopleController::class, 'index'])->name('people');
    Route::post('/people', [PeopleController::class, 'store'])->name('people.store');
    Route::post('/peoples', [PeopleController::class, 'stores'])->name('peoples.store');
    Route::put('/people/{id}', [PeopleController::class, 'update'])->name('people.update');
    Route::delete('/people/{id}', [PeopleController::class, 'destroy'])->name('people.destroy');

    Route::get('/valuation', [ValuationController::class, "index"])->name('valuation');
    Route::post('/valuation', [ValuationController::class, "store"])->name('valuation.store');
    Route::put('/valuation/{id}', [ValuationController::class, "update"])->name('valuation.update');
    Route::delete('/valuation/{id}', [ValuationController::class, "destroy"])->name('valuation.destroy');
});

// Laravel's default routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
