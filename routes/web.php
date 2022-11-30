<?php

use App\Http\Controllers\PadlockController;
use App\Http\Controllers\PadlockTypeController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

Route::get('padlock-type', [PadlockTypeController::class, 'index'])
    ->name('padlockType.index')
    ->middleware('auth');

Route::get('padlock-type/create', [PadlockTypeController::class, 'create'])
    ->name('padlockType.create')
    ->middleware('auth');

Route::post('padlock-type', [PadlockTypeController::class, 'store'])
->name('padlockType.store')
->middleware('auth');

Route::get('padlock-type/{padlockType}/edit', [PadlockTypeController::class, 'edit'])
->name('padlockType.edit')
->middleware('auth');

Route::put('padlock-type/{padlockType}', [PadlockTypeController::class, 'update'])
    ->name('padlockType.update')
    ->middleware('auth');

Route::delete('padlock-type/{padlockType}', [PadlockTypeController::class, 'destroy'])
    ->name('padlockType.destroy')
    ->middleware('auth');

Route::put('padlock-type/{padlockType}/restore', [PadlockTypeController::class, 'restore'])
    ->name('padlockType.restore')
    ->middleware('auth');

Route::get('padlock', [PadlockController::class, 'index'])
    ->name('padlock.index')
    ->middleware('auth');

Route::get('padlock/create', [PadlockController::class, 'create'])
    ->name('padlock.create')
    ->middleware('auth');

Route::post('padlock', [PadlockController::class, 'store'])
->name('padlock.store')
->middleware('auth');

Route::get('padlock/{padlock}/edit', [PadlockController::class, 'edit'])
->name('padlock.edit')
->middleware('auth');

Route::put('padlock/{padlock}', [PadlockController::class, 'update'])
    ->name('padlock.update')
    ->middleware('auth');

Route::delete('padlock/{padlock}', [PadlockController::class, 'destroy'])
    ->name('padlock.destroy')
    ->middleware('auth');

Route::put('padlock/{padlock}/restore', [PadlockController::class, 'restore'])
    ->name('padlock.restore')
    ->middleware('auth');

Route::get('/home', function () {
    return view('home');
});
