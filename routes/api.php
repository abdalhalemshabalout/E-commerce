<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CategoryController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

        //list
    Route::get('get-category', [CategoryController::class, 'getCategory'])->middleware('auth:sanctum');


Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('register-admin', [AuthController::class, 'registerAdmin']);
    Route::post('register-customer', [AuthController::class, 'registerCustomer']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
    
});
Route::group([
    'prefix' => 'admin'
], function () {
    Route::post('create-employee', [UserController::class, 'CreateEmployee'])->middleware('auth:sanctum');
    Route::delete('delete-employee/{id}', [UserController::class, 'deleteEmployee'])->middleware('auth:sanctum');

    //Category
    Route::post('add-category', [CategoryController::class, 'addCategory'])->middleware('auth:sanctum');
    Route::post('update-category/{id}', [CategoryController::class, 'updateCategory'])->middleware('auth:sanctum');
    Route::delete('delete-category/{id}', [CategoryController::class, 'deleteCategory'])->middleware('auth:sanctum');

});

Route::group([
    'prefix' => 'employee'
], function () {
       
});
Route::group([
    'prefix' => 'customer'
], function () {

});
