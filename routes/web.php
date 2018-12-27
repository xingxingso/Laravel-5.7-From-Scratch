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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/projects', 'ProjectsController@index');
// Route::get('/projects/create', 'ProjectsController@create');
// Route::get('projects/{project}', 'ProjectsController@show');
// Route::post('/projects', 'ProjectsController@store');
// Route::get('projects/{project}/edit', 'ProjectsController@edit');
// Route::patch('projects/{project}', 'ProjectsController@update');
// Route::delete('projects/{project}', 'ProjectsController@destroy');
Route::resource('projects', 'ProjectsController');
