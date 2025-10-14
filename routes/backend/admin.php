<?php

use App\Http\Controllers\Backend\ClassroomController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\StudentController;
use App\Http\Controllers\Backend\TeacherController;
use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('admin.dashboard'));
    });

    Route::group([
        'prefix' => 'student',
        'as' => 'student.',
    ], function () {
        Route::get('/', [StudentController::class, 'index'])->name('index');
        Route::get('/create', [StudentController::class, 'create'])->name('create');
        Route::post('/store', [StudentController::class, 'store'])->name('store');
        Route::get('/show/{id}', [StudentController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [StudentController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [StudentController::class, 'destroy'])->name('destroy');
    });

    Route::group([
        'prefix' => 'teacher',
        'as' => 'teacher.',
    ], function () {
        Route::get('/', [TeacherController::class, 'index'])->name('index');
        Route::get('/create', [TeacherController::class, 'create'])->name('create');
        Route::post('/store', [TeacherController::class, 'store'])->name('store');
        Route::get('/show/{id}', [TeacherController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [TeacherController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [TeacherController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [TeacherController::class, 'destroy'])->name('destroy');
    });

    Route::group([
        'prefix' => 'classroom',
        'as' => 'classroom.',
    ], function () {
        Route::get('/', [ClassroomController::class, 'index'])->name('index');
        Route::get('/create', [ClassroomController::class, 'create'])->name('create');
        Route::post('/store', [ClassroomController::class, 'store'])->name('store');
        Route::get('/show/{id}', [ClassroomController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [ClassroomController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [ClassroomController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [ClassroomController::class, 'destroy'])->name('destroy');
    });