<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\InvestorController;
use App\Http\Controllers\StartupController;
use App\Http\Controllers\InvestmentController;
use App\Http\Controllers\InvestmentRoundController;
use App\Http\Controllers\CompanyController;

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [LoginController::class, 'login']);

// Protected routes for authenticated users
Route::middleware('auth:sanctum')->group(function () {
    // Investor routes
    Route::get('investors', [InvestorController::class, 'index']);
    Route::post('investors', [InvestorController::class, 'store']);
    Route::put('investors/{id}', [InvestorController::class, 'update']);

    // Startup routes
    Route::get('startups', [StartupController::class, 'index']);
    Route::post('startups', [StartupController::class, 'store']);
    Route::put('startups/{id}', [StartupController::class, 'update']);

    // Investment routes
    Route::post('investments', [InvestmentController::class, 'store']);

    // Investment round routes
    Route::get('investment-rounds', [InvestmentRoundController::class, 'index']);
    Route::post('investment-rounds', [InvestmentRoundController::class, 'store']);

    // Company routes
    Route::get('companies', [CompanyController::class, 'index']);
    Route::post('companies', [CompanyController::class, 'store']);
    Route::put('companies/{id}', [CompanyController::class, 'update']);
});

use App\Http\Controllers\Api\InvestorAuthController;
use App\Http\Controllers\Api\StartupAuthController;

use App\Http\Controllers\Api\InvestmentRoundsController;
use App\Http\Controllers\Api\conCompanyController;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('investors', InvestorController::class);
    Route::apiResource('startups', StartupController::class);
    Route::apiResource('investments', InvestmentController::class);
    Route::apiResource('investment-rounds', InvestmentRoundController::class);
    Route::apiResource('companies', CompanyController::class);
});
