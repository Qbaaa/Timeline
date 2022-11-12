<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProcessController;
use App\Http\Controllers\TypeController;
use App\Models\Event;
use App\Models\Process;
use App\Models\Type;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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
    $processes = Process::all();
    $types = Type::all();
    $typesEvents = $types->load(['events']);

    return view('main', compact('processes', 'typesEvents'));
});

Route::get('/print', function () {
    $processes = Process::all();
    $types = Type::all();
    $typesEvents = $types->load(['events']);

    return view('print', compact('processes', 'typesEvents'));
});


Route::get('register', [AuthController::class, 'getRegister'])->name('register');
Route::post('post-register', [AuthController::class, 'postRegister'])->name('register.post');

Route::get('login', [AuthController::class, 'getLogin'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');

Route::post('logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function() {

    Route::get('profile', [AuthController::class, 'getProfile'])->name('profile');
    Route::post('post-profile', [AuthController::class, 'postProfile'])->name('profile.post');

    Route::get('event', [EventController::class, 'getEvent'])->name('event');
    Route::post('post-event', [EventController::class, 'postEvent'])->name('event.post');
    Route::resource('events', EventController::class);
    Route::post('events/{event_id}', [EventController::class, 'update'])->name('event.update');
    Route::delete('events/remove/{event_id}', [EventController::class, 'remove'])->name('events.remove');

    Route::resource('types', TypeController::class);
    Route::get('type', [TypeController::class, 'getType'])->name('type');
    Route::post('post-type', [TypeController::class, 'createType'])->name('type.create');
    Route::post('types/{type_id}', [TypeController::class, 'update'])->name('type.update');
    Route::delete('types/remove/{type_id}', [TypeController::class, 'remove'])->name('type.remove');

    Route::resource('processes', ProcessController::class);
    Route::get('process', [ProcessController::class, 'getProcess'])->name('process');
    Route::post('post-process', [ProcessController::class, 'createProcess'])->name('process.create');
    Route::post('processes/{process_id}', [ProcessController::class, 'update'])->name('process.update');
    Route::delete('processes/remove/{process_id}', [ProcessController::class, 'remove'])->name('process.remove');
});


