<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BikeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\BaladeController;
use App\Http\Controllers\BikeTypeController;
use App\Http\Controllers\EventTypeController;
use App\Http\Controllers\BaladeTypeController;
use App\Http\Controllers\CategorieTController;
use App\Http\Controllers\TrotinetteController;
use App\Http\Controllers\AssociationController;
use App\Http\Controllers\AssociationTypeController;

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


Route::get('/bikes', function (BikeController $bikeController) {
    // return bikes index controller
    return $bikeController->create();
});
Route::get('/trotinettes', function (TrotinetteController $trotinetteController) {
    // return trotinette index controller
    return $trotinetteController->index();
});
Route::get('/categoriets', function (CategorieTController $categorieTController) {
    // return trotinette index controller
    return $categorieTController->index();
});

Route::get('/balades', function (BaladeController $baladeController) {
    // return balade index controller
    return $baladeController->index();
});

Route::get('/balades', function (BaladeController $baladeController) {
    // return balade index controller
    return $baladeController->index();
});

Route::get('/page1', function () {
    return '<h1>my first page</h1>';
});

Route::get('/page2/{name?}/{age?}', function ($name = null, $age = null) {
    $emptyUrlCase =  !$name ? 'welcome to page 2' : 'welcome ' . $name . ' ';
    return response(!$age ? $emptyUrlCase : $emptyUrlCase . ' your age is ' . $age, 200);
})
    ->where('name', '[A-Za-z]+')
    ->name('page2');

url('page2', ['name' => 'foulen', 'age' => null]);

Route::get('/dashboard', function () {
    return  view('admin/dashboard');
});



Auth::routes();



Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin/dashboard');
    });
    Route::resource('/bike', BikeController::class);
    Route::resource('/biketype', BikeTypeController::class);

    Route::resource('/event', EventController::class);
    Route::resource('/eventype', EventTypeController::class);
    Route::resource('/balade', BaladeController::class);
    Route::resource('/baladetype', BaladeTypeController::class);

    Route::resource('/association', AssociationController::class);
    Route::resource('/associationtype', AssociationTypeController::class);
    Route::resource('trotinettes', TrotinetteController::class);
    Route::resource('categoriets', CategorieTController::class);

});
Route::get('/balade_search/', [BaladeController::class, 'balade_search'])->name('balade_search');
Route::get('/balade_tri/', [BaladeController::class, 'balade_tri'])->name('balade_tri');
Route::get('/search_event/', [EventController::class, 'search'])->name('search');
Route::get('/tri_event/', [EventController::class, 'tri'])->name('tri');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::redirect('/', '/home');
