<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/****Controller** */
use App\Http\Controllers\VisitorManagement\VisitorController;
use App\Http\Controllers\AdminSetting\UserController;
use App\Http\Controllers\AdminSetting\RoleController;
use App\Http\Controllers\AdminSetting\LogController;

use App\Http\Controllers\CommonFields\DepartmentController;
use App\Http\Controllers\CommonFields\BuildingController;
use App\Http\Controllers\CommonFields\FloorController;
use App\Http\Controllers\CommonFields\LocationTypeController;
use App\Http\Controllers\CommonFields\LocationController;
use App\Http\Controllers\CommonFields\DepreciationController;
use App\Http\Controllers\CommonFields\CondemnationController;





Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::post('/admin/users/{id}/toggle-status', [UserController::class, 'toggleStatus'])
    ->name('admin.users.toggleStatus');



/** User****/

Route::middleware(['auth'])->prefix('admin-settings')->name('admin.')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/logs', [LogController::class, 'index'])->name('logs.index');
});


/**Role****/
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('roles', [RoleController::class, 'store'])->name('roles.store');
    Route::get('roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::put('roles/{role}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('roles/{role}', [RoleController::class, 'destroy'])->name('roles.delete');
});



/**Common Fields***/
Route::prefix('common-fields')->name('common.')->group(function () {
    Route::resource('departments', DepartmentController::class)->except(['create', 'edit']);
    Route::resource('buildings', BuildingController::class)->except(['create', 'edit']);
    // ✅ Toggle Status Route
    Route::post('buildings/{id}/toggle-status', [BuildingController::class, 'toggleStatus'])
        ->name('buildings.toggleStatus');


    Route::resource('floors', FloorController::class)->except(['create', 'edit']);
    Route::post('floors/{id}/toggle-status', [FloorController::class, 'toggleStatus'])
        ->name('floors.toggleStatus');
    Route::resource('location-types', LocationTypeController::class)->except(['create', 'edit']);
    Route::resource('locations', LocationController::class)->except(['create', 'edit']);
    Route::resource('depreciations', DepreciationController::class)->except(['create', 'edit']);
    Route::resource('condemnations', CondemnationController::class)->except(['create', 'edit']);
});

/** Visitor management **/

Route::middleware(['auth'])
    ->prefix('visitor-management')
    ->name('visitor.')
    ->group(function () {

        // ✅ Visitors Listing Page
        Route::get('/visitors', [VisitorController::class, 'index'])->name('index');

        // ✅ Invite Visitor Form Page
        Route::get('/visitors/form', [VisitorController::class, 'create'])->name('form');

        // ✅ Invite and Re-invite Actions
        Route::post('/visitors/invite', [VisitorController::class, 'invite'])->name('invite');
        Route::post('/visitors/{id}/reinvite', [VisitorController::class, 'reinvite'])->name('reinvite');

        // ✅ Search (for smart autofill)
        Route::post('/visitors/search', [VisitorController::class, 'search'])->name('search');

        // ✅ Edit/Update/Delete (Admin use)
        Route::get('/visitors/{id}/edit', [VisitorController::class, 'edit'])->name('edit');
        Route::put('/visitors/{id}', [VisitorController::class, 'update'])->name('update');
        Route::delete('/visitors/{id}', [VisitorController::class, 'destroy'])->name('destroy');

        // ✅ Check-in / Check-out
        Route::post('/visitors/{id}/check-in', [VisitorController::class, 'checkIn'])->name('checkin');
        Route::post('/visitors/{id}/check-out', [VisitorController::class, 'checkOut'])->name('checkout');
    });





Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
