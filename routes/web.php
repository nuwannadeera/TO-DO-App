<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//new way of define route
//Route::view('/','welcome');

Route::get('/tasks', function () {
    $dataList = \App\Task::all();
    return view('tasks')->with('taskList',$dataList);
});



Route::post('saveTask','taskController@saveNewTask');

Route::get('/markAsComplete/{id}','taskController@updateCompleteTaskStatus');

Route::get('/markAsNotComplete/{id}','taskController@updateIncompleteTaskStatus');

Route::get('/deleteTask/{id}','taskController@deleteTask');

Route::get('/updateTask/{id}','taskController@updateTask');

Route::post('/updateTaskName/{id}','taskController@updateTaskName');
