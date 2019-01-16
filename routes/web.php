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

/**
 * GET /projects (index)
 * GET /projects/create (create)
 * GET /projects/1 (show)
 * POST /porjects (store)
 * GET /projects/1/edit (edit)
 * PATCH /projects/1 (update)
 * DELETE /projects/1 (destroy)
 */

use Illuminate\Http\Request;

// Route::get('/', function () {
Route::get('/', function (Request $request) {
    // session(['name' => 'JohnDoe']);
    // session()->forget('name');
    // return session('name');
    // return session('foobar', 'A default');
    // $request->session()->put('foobar', 'baz');
    // return $request->session()->get('foobar');
    // return $request->session()->get('zzzzz', 'default');
    // $request->flash();
    return view('welcome');
});

// Route::resource('projects', 'ProjectsController');
Route::resource('projects', 'ProjectsController')->middleware('can:update,project');

Route::post('/projects/{project}/tasks', 'ProjectTasksController@store');
// Route::patch('tasks/{task}', 'ProjectTasksController@update');
Route::post('/completed-tasks/{task}', 'CompletedTasksController@store');
Route::delete('/completed-tasks/{task}', 'CompletedTasksController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/shows', function () {
//     return view('welcome');
// });

