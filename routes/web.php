<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvestorAuthController;
use App\Http\Controllers\StartupAuthController;
use App\Http\Controllers\InvestorDashboardController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::prefix('investor')->group(function () {
    Route::get('register', [InvestorAuthController::class, 'showRegistrationForm'])->name('investor.register');
    Route::post('register', [InvestorAuthController::class, 'register']);
    Route::get('login', [InvestorAuthController::class, 'showLoginForm'])->name('investor.login');
    Route::post('login', [InvestorAuthController::class, 'login']);
    Route::post('logout', [InvestorAuthController::class, 'logout'])->name('investor.logout');
});

Route::prefix('startup')->group(function () {
    Route::get('register', [StartupAuthController::class, 'showRegistrationForm'])->name('startup.register');
    Route::post('register', [StartupAuthController::class, 'register']);
    Route::get('login', [StartupAuthController::class, 'showLoginForm'])->name('startup.login');
    Route::post('login', [StartupAuthController::class, 'login']);
    Route::post('logout', [StartupAuthController::class, 'logout'])->name('startup.logout');
});

Route::middleware(['auth.investor'])->group(function () {
    Route::get('/investor/dashboard', [InvestorDashboardController::class, 'index'])->name('investor.dashboard');
    Route::get('/investor/company/{id}', [InvestorDashboardController::class, 'show'])->name('investor.company.show');
});
