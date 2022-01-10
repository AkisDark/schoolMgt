<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\Classes\ClassController;
use App\Http\Controllers\School\SchoolController;
use App\Http\Controllers\Parents\ParentController;
use App\Http\Controllers\Absences\AbsenceController;
use App\Http\Controllers\Students\StudentController;
use App\Http\Controllers\Teachers\TeacherController;
use App\Http\Controllers\Materials\MaterialController;
use App\Http\Controllers\Specialties\SpecialtieController;


Route::get('/login', [UserController::class, 'index']);

Route::group(['prefix' => 'dashboard'], function(){

    Route::group(['prefix' => 'school'], function(){
    
        Route::get('/', [SchoolController::class, 'index']);
        Route::get('/dairas/{id}', [SchoolController::class, 'dairas']);
        Route::post('/update', [SchoolController::class, 'update'])->name('school.update');
    });


    Route::group(['prefix' => 'specialties'], function(){
    
        Route::get('/', [SpecialtieController::class, 'index']);
        Route::get('/create', [SpecialtieController::class, 'create']);
        Route::post('/store', [SpecialtieController::class, 'store'])->name('specialties.add');
        Route::post('/update', [SpecialtieController::class, 'update'])->name('specializations.update');
        Route::post('/delete', [SpecialtieController::class, 'destroy'])->name('specializations.delete');
   
    });


    Route::group(['prefix' => 'materials'], function(){
    
        Route::get('/', [MaterialController::class, 'index']);
        Route::get('/create', [MaterialController::class, 'create']);
        Route::post('/store', [MaterialController::class, 'store'])->name('materials.add');
        Route::post('/update', [MaterialController::class, 'update'])->name('materials.update');
        Route::post('/delete', [MaterialController::class, 'destroy'])->name('materials.delete');
    });

    Route::group(['prefix' => 'students'], function(){
    
        Route::get('/', [StudentController::class, 'index']);
        Route::get('/create', [StudentController::class, 'create']);
        Route::post('/store', [StudentController::class, 'store'])->name('students.add');
        Route::post('/update', [StudentController::class, 'update'])->name('students.update');
        Route::post('/delete', [StudentController::class, 'destroy'])->name('students.delete');
        
    });

    Route::group(['prefix' => 'teachers'], function(){
    
        Route::get('/', [TeacherController::class, 'index']);
        Route::get('/create', [TeacherController::class, 'create']);
        Route::post('/store', [TeacherController::class, 'store'])->name('teachers.add');
        Route::post('/update', [TeacherController::class, 'update'])->name('teachers.update');
        Route::post('/delete', [TeacherController::class, 'destroy'])->name('teachers.delete');
    });

    Route::group(['prefix' => 'parents'], function(){
    
        Route::get('/', [ParentController::class, 'index']);
        Route::get('/create', [ParentController::class, 'create']);
        Route::post('/store', [ParentController::class, 'store'])->name('parents.add');
        Route::post('/update', [ParentController::class, 'update'])->name('parents.update');
        Route::post('/delete', [ParentController::class, 'destroy'])->name('parents.delete');
    });

    Route::group(['prefix' => 'absences'], function(){
    
        Route::get('/', [AbsenceController::class, 'index']);
        Route::get('/create', [AbsenceController::class, 'create']);
        Route::post('/store', [AbsenceController::class, 'store'])->name('absences.add');
        Route::post('/update', [AbsenceController::class, 'update'])->name('absences.update');
        Route::post('/delete', [AbsenceController::class, 'destroy'])->name('absences.delete');
    });

    Route::group(['prefix' => 'classes'], function(){
        Route::get('/', [ClassController::class, 'index']);
        Route::get('/create', [ClassController::class, 'create']);
        Route::post('/store', [ClassController::class, 'store'])->name('classes.add');
        Route::post('/update', [ClassController::class, 'update'])->name('classes.update');
        Route::post('/delete', [ClassController::class, 'destroy'])->name('classes.delete');
    });


    Route::group(['prefix' => 'users'], function(){
        Route::get('/', [UserController::class, 'members']);
        Route::get('/create', [UserController::class, 'create']);
        Route::post('/login', [UserController::class, 'login'])->name('users.login');
        Route::post('/store', [UserController::class, 'store'])->name('members.add');
        Route::get('/profile', [UserController::class, 'profile'])->name('users.profile');
        Route::post('/update', [UserController::class, 'update'])->name('users.update');
        Route::post('/members-update', [UserController::class, 'updateDataMembers'])->name('members.update');
        Route::post('/delete', [UserController::class, 'destroy'])->name('members.delete');
        Route::get('/logout', [UserController::class, 'logout']);
    });

});
