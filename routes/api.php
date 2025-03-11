<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\APi\UserController;
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

// Route::get('/user', function () {
//     return response()->json(['message' => 'This is a public route']);
// });

Route::apiResource('users',UserController::class);

// use App\Http\Controllers\UserController;

// Route::get('test', [UserController::class, 'index']);
// Route::get('hello', function () {
//     return response()->json([
//         'message' => 'Hello, this is a test API!'
//     ]);
// });


Route::get('testing', function () {
    return 'this is a testing for api';
});
