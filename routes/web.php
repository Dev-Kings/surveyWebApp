<?php

use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\LandController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PropertyController;
use App\Models\Land;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/properties-on-sale', [PropertyController::class, 'index'])->name('properties');
Route::get('/contact-page', [PageController::class, 'contact'])->name('contact-page');

Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('admin')->group(function (){
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::resource('/roles', RoleController::class);
    Route::post('/roles/{role}/permissions', [RoleController::class, 'givePermission'])->name('roles.permissions');
    Route::delete('/roles/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])->name('roles.permissions.revoke');
    Route::resource('/permissions', PermissionController::class);
    Route::post('/permissions/{permission}/roles', [PermissionController::class, 'assignRole'])->name('permissions.roles');
    Route::delete('/permissions/{permission}/roles/{role}', [PermissionController::class, 'removeRole'])->name('permissions.roles.remove');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::post('/users/{user}/roles', [UserController::class, 'assignRole'])->name('users.roles');
    Route::delete('/users/{user}/roles/{role}', [UserController::class, 'removeRole'])->name('users.roles.remove');
    Route::post('/users/{user}/permissions', [UserController::class, 'givePermission'])->name('users.permissions');
    Route::delete('/users/{user}/permissions/{permission}', [UserController::class, 'revokePermission'])->name('users.permissions.revoke');
    Route::get('/lands', [LandController::class, 'index'])->name('lands.index');
    Route::get('/lands/create', [LandController::class, 'create'])->name('lands.create');
    Route::post('/lands/store', [LandController::class, 'store'])->name('lands.store');
    Route::get('/lands/{land}/edit', [LandController::class, 'edit'])->name('lands.edit');
    Route::post('/lands/{land}/update', [LandController::class, 'update'])->name('lands.update');
    Route::delete('/lands/{land}', [LandController::class, 'destroy'])->name('lands.destroy');
});

require __DIR__.'/auth.php';
