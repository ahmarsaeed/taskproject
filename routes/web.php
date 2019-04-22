<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('users', 'UserController');
Route::resource('roles', 'RoleController');


Route::get('projects/complete_details' , 'ProjectsController@complete_details')->name('complete_details');
Route::resource('permissions', 'PermissionController');
Route::resource('projects', 'ProjectsController');




/* Task Routes Start*/
Route::resource('tasks' , 'TasksController');
Route::get('task/project_task' , 'TasksController@project_task')->name('project_task');
Route::get('task/project_task_table' , 'TasksController@project_task_table');
Route::get('task/task_detail' , 'TasksController@task_detail')->name('task_detail');

/* Task Routes End*/

/* Sub Task Routes Start*/

Route::get('subtasks' , 'SubTasksContoller@index')->name('sub_tasks_index');
Route::get('subtasks/{id}/edit' , 'SubTasksContoller@edit');
Route::post('subtasks/{id}/update' , 'SubTasksContoller@update');
Route::get('subtasks/tasks_list' , 'SubTasksContoller@tasks_list');
Route::get( 'subtasks/create' , 'SubTasksContoller@create')->name('sub_tasks_create');
Route::post('subtasks/store' , 'SubTasksContoller@store')->name('sub_tasks_store');
Route::get('subtasks/subtasks_detail/{subtask_id}' , 'SubTasksContoller@subtasks_detail');
Route::get('subtasks/project_task_select' , 'SubTasksContoller@project_task_select' )->name('project_task_select');
Route::get('subtasks/project_tasks_subtask_list' , 'SubTasksContoller@project_tasks_subtask_list');

/* Sub Task Routes End*/




