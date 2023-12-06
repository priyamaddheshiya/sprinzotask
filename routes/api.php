<?php

use Illuminate\Http\Request;
use App\Http\Controllers\FoodItemController;
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
Route::get('/food-items', [FoodItemController::class, 'index']);
Route::get('/food-items/{id}', [FoodItemController::class, 'show']);
Route::post('/food-items', [FoodItemController::class, 'store']);
Route::put('/food-items/{id}', [FoodItemController::class, 'update']);
Route::delete('/food-items/{id}', [FoodItemController::class, 'destroy']);
Route::get('/food-items/by-donor/{donorId}', [FoodItemController::class, 'foodItemsByDonor']);
