<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('project')->middleware(['auth:sanctum'])->controller(ProjectController::class)->group(function(){
    Route::get("/getAll" , 'getAll');
    Route::get("/getOne/{projectId}" ,"getOne");
    Route::post('/create' , 'create');
    Route::put('/{projectId}/edit' , 'edit');
    Route::delete('/{projectId}/delete' , 'destroy');
});

Route::prefix('auth')
->controller(AuthController::class)->group(
    function(){
     Route::post('/register' , 'register');
     Route::post('/login' , 'login');
     Route::post('/logout' , 'logout');
});