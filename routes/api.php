<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(ProjectController::class)->group(function(){
    Route::get("/getAll" , 'getAll');
    Route::get("/getOne/{projectId}" ,"getOne");
    Route::post('/project/create' , 'create');
    Route::put('project/{projectId}/edit' , 'edit');
    Route::delete('project/{projectId}/delete' , 'destroy');
});

