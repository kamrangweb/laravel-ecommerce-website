<?php

use FavoritesService\Controllers\FavoriteController;
use FavoritesService\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\FavouriteController;

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

// Test route
Route::get('/test-connection', [TestController::class, 'testConnection']);

Route::prefix('api/favorites')->group(function () {
    Route::post('/toggle', [FavoriteController::class, 'toggleFavorite']);
    Route::get('/user/{userId}', [FavoriteController::class, 'getUserFavorites']);
    Route::post('/check', [FavoriteController::class, 'checkFavoriteStatus']);
});

// Favourites routes
Route::prefix('favourites')->group(function () {
    Route::get('/', [FavouriteController::class, 'index']);
    Route::get('/{id}', [FavouriteController::class, 'show']);
    Route::post('/', [FavouriteController::class, 'store']);
    Route::put('/{id}', [FavouriteController::class, 'update']);
    Route::delete('/{id}', [FavouriteController::class, 'destroy']);
}); 