<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/page1', function () {
    return '<h1>my first page</h1>';
});

Route::get('/page2/{name?}/{age?}', function ($name = null, $age = null) {
    $emptyUrlCase =  !$name ? 'welcome to page 2': 'welcome ' . $name . ' ';
    return response(!$age ?$emptyUrlCase: $emptyUrlCase.' your age is ' . $age , 200);
})
    ->where('name', '[A-Za-z]+')
    ->name('page2');

url('page2' , ['name' => 'foulen' , 'age'=> null ]);

Route::get('/dashboard', function () {
    return  view('admin/dashboard');
});









