<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CategoryController;
use App\Http\Livewire\Categories;
use App\Http\Livewire\Projects;
use App\Https\Livewire\Users\Show;

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

Route::domain('invest.'. config('app.domain'))->group(function () {
	Route::get('/', [PageController::class, 'landing'])->name('landing');
	// Normal Users Routes
	Route::middleware(['auth:sanctum', 'verified'])->group(function () {
		Route::get('dashboard', [PageController::class, 'dashboard'])->name('dashboard');
		Route::get('project/{slug}', [ProjectController::class, 'show'])->name('project.show');
		Route::get('invest/project/{slug}', [ProjectController::class, 'invest'])->name('project.invest');
		Route::get('category/{slug}', [CategoryController::class, 'list'])->name('category.list');
		Route::view('{slug}/investments', 'users.investments.index')->name('user.investments');
	});

	//Admin routes
	Route::middleware(['auth:sanctum', 'verified', 'isAdmin'])->group(function () {
		Route::view('users', 'admin.users.index')->name('users');
		Route::view('projects', 'admin.projects.index')->name('projects');
		Route::view('categories', 'admin.category.index')->name('categories');
		Route::view('investments', 'admin.investments.index')->name('investments');
	});
});