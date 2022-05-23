<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => ['auth:sanctum']], function (){
    Route::post('/logout',[AuthController::class, 'logout']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users',function (){
    return "sandes";
});

Route::post('/register',[AuthController::class, 'register']);
Route::post('/login',[AuthController::class, 'login']);

// Authenticated Routes
Route::middleware('auth:sanctum')->group(function(){


 Route::get('responses',function(){
        return response(["zdas"=>"sxz"],200)
        ->header('Content-Type','application/json')
        ->cookie('MY_COOKIE','shagina',3600);
    })->name('responses');

    Route::get('/users/{id}', [AuthController::class, 'show']);

});
