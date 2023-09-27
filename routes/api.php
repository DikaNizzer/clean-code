<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MenuController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// get All Menu
Route::get('/menu', [MenuController::class, 'getAllMenu']);
// Get All Category
Route::get('/category', [MenuController::class, 'getAllCategory']);
// get all category and menu
Route::get('/category-menu', [MenuController::class, 'getCategoryMenu']);
// create kategori
Route::post('/category', [MenuController::class, 'createCategory']);
// Update
Route::post('/category-update', [MenuController::class, 'update']);
// Detail
Route::post('/category-detail', [MenuController::class, 'show']);


