<?php

use App\Http\Controllers\RoleAssignController;
use App\Http\Controllers\PermissionAssignController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermissionController;

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

Route::middleware(['auth:sanctum', 'verified'])->prefix('admin')->group(function () {
    Route::get('dashboard', DashboardController::class)->name('dashboard');
    Route::resource('role', RoleController::class);
    Route::resource('permission', PermissionController::class);
    Route::get('permission-assign', [PermissionAssignController::class, 'index'])->name('permission-assign');
    Route::post('permission-assign', [PermissionAssignController::class, 'permissionAssign']);

    Route::get('role-assign', [RoleAssignController::class, 'index'])->name('role-assign');
    Route::post('role-assign', [RoleAssignController::class, 'roleAssign']);
});
