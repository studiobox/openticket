<?php

use App\Http\Controllers\DeskAuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/login', [HomeController::class, 'home'])->name('login');
Route::get('/register', [HomeController::class, 'home'])->name('register');

/**
 * HelpDesk Staff/Member Portal Routes
 */
Route::prefix('desk')->name('desk.')->group(function() {
    // Authentication Routes
    Route::get('register', [DeskAuthController::class, 'register'])->name('register');
    Route::post('register', [DeskAuthController::class, 'store'])->name('register.store');
    Route::get('login', [DeskAuthController::class, 'login'])->name('login');
    Route::post('login', [DeskAuthController::class, 'authenticate'])->name('authenticate');
    Route::delete('logout', [DeskAuthController::class, 'logout'])->name('logout')->middleware('auth');

    // Route::get('dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

    // Route::resource('agent', AgentController::class)
    //     ->only(['index', 'create', 'store', 'edit', 'update', 'destroy'])
    //     ->middleware(['auth', 'verified']);

    // Route::resource('department', DepartmentController::class)
    //     ->only(['index', 'create', 'store', 'edit', 'update', 'destroy'])
    //     ->middleware(['auth', 'verified']);

    // Route::resource('user', CustomerController::class)
    //     ->only(['index', 'create', 'store', 'edit', 'update', 'destroy'])
    //     ->middleware(['auth', 'verified']);

    // Route::resource('ticket', TicketController::class)
    //     ->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'])
    //     ->middleware(['auth', 'verified']);

    // Route::resource('ticket-message', TicketMessagController::class)
    //     ->only(['store'])
    //     ->middleware(['auth', 'verified']);

    // Route::get('settings/general', [SettingsController::class, 'general'])->middleware(['auth', 'verified'])->name('settings.general');
    // Route::get('settings/api-configuration', [SettingsController::class, 'apiConfiguration'])->middleware(['auth', 'verified'])->name('settings.api');
    // Route::post('settings/api-configuration', [SettingsController::class, 'storeApi'])->middleware(['auth', 'verified'])->name('settings.api.store');
    // Route::get('settings/api-configuration/create', [SettingsController::class, 'createApi'])->middleware(['auth', 'verified'])->name('settings.api.create');
    // Route::delete('settings/api-configuration/{id}', [SettingsController::class, 'destroyApi'])->middleware(['auth', 'verified'])->name('settings.api.destroy');
});