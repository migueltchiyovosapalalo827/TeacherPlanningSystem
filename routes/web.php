<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\UserPermissionController;
use App\Http\Controllers\UserRoleController;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'permission:view admin dashboard'])->name('dashboard');

Route::middleware('auth', 'permission:view admin dashboard')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/user/{user}/roles', UserRoleController::class)->name('users.roles.assign');
    Route::post('/users/{user}/permissions',UserPermissionController::class)->name('users.permissions.assign');
    Route::resource('user', App\Http\Controllers\UserController::class);
    Route::resource('lesson-plan', App\Http\Controllers\LessonPlanController::class);
    Route::resource('resource', App\Http\Controllers\ResourceController::class);
    Route::get('lesson-plan-item/add-resource/{id}', [App\Http\Controllers\LessonPlanItemController::class, 'addResource']);
    Route::resource('lesson-plan-item', App\Http\Controllers\LessonPlanItemController::class);
    Route::resource('student', App\Http\Controllers\StudentController::class);
    Route::resource('grade', App\Http\Controllers\GradeController::class);
    Route::post('/roles/{role}/permissions',RolePermissionController::class)->name('roles.permissions.assign');
    Route::resource('roles', RoleController::class);
});

require __DIR__ . '/auth.php';
