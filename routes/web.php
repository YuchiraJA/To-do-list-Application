<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
              use App\Http\Controllers\UserController;

              // Using PHP callable syntax...
             Route::get('/users', [UserController::class, 'index']);

             // Using string syntax...
             Route::get('/users', 'App\Http\Controllers\UserController@index');


*/

Route::get('/', function () {
    return view('welcome');
});

/* Route::get('/tasks', function () {
    return view('tasks');
}); */

Route::get('/tasks', function () {
    $data=App\Models\Task::all();
        return view('tasks')->with('tasks',$data);
    });
    


Route::post('/saveTask', [TaskController::class, 'store']);

// not workinf cod in version 8 laravel ====== Route::get('/markascompleted/{id}','TaskController@UpdateTaskAsCompleted');
// method 1
    //Route::get('/markascompleted/{id}','App\Http\Controllers\TaskController@UpdateTaskAsCompleted');
//method 2
    Route::get('/markascompleted/{id}', [TaskController::class, 'UpdateTaskAsCompleted']);




    //delete task
    Route::get('/deletetask/{id}', [TaskController::class, 'deletetask']);


    Route::get('/updatetask/{id}', [TaskController::class, 'updatetaskview']);

    Route::post('/updatetasks',[TaskController::class, 'updatetask']);