<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\aboutController;
use App\Http\Controllers\serviceController;
use App\Http\Controllers\workController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\skillController;
use App\Http\Controllers\experienceController;
use App\Http\Controllers\educationController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\AuthController;



// home
Route::get('/', [homeController::class, 'index'])->name('home.index');
Route::get('/home/skill', [homeController::class, 'skill'])->name('home.skill');
Route::get('/home/experience', [homeController::class, 'experience'])->name('home.experience');
Route::get('/home/work', [homeController::class, 'work'])->name('home.work');


//admin
Route::get('/admin', [adminController::class, 'index'])->name('admin.index');
Route::get('/admin/homeupdate', [adminController::class, 'home'])->name('admin.home');
Route::post('/admin/homeupdate/{id}/save', [adminController::class, 'update'])->name('admin.save');

// login
Route::get('/login', [loginController::class, 'index'])->name('login.index');
Route::post('/forgot', [AuthController::class, 'verify'])->name('login.forgot');
Route::get('/newpass', [AuthController::class, 'newpass'])->name('login.newpass');
Route::post('/savepass', [AuthController::class, 'savepass'])->name('login.savepass');
Route::post('/reg', [AuthController::class, 'reg'])->name('login.reg');
Route::post('/log', [AuthController::class, 'login'])->name('login.auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('login.out');

// about admin
Route::get('/about', [aboutController::class, 'index'])->name('about.index');
Route::post('/about/{id}/update', [aboutController::class, 'update'])->name('about.update');
Route::post('/about/{id}/bio', [aboutController::class, 'bio'])->name('about.bio');

// skill
Route::get('/skill', [skillController::class, 'index'])->name('skill.index');
Route::post('/skill/add', [skillController::class, 'add'])->name('skill.add');
Route::put('/skill/{id}/add', [skillController::class, 'update'])->name('skill.update');
Route::delete('/skill/{id}/delete', [skillController::class, 'destroy'])->name('skill.delete');

// education
Route::get('/education', [educationController::class, 'index'])->name('education.index');
Route::post('/education/add', [educationController::class, 'add'])->name('education.add');
Route::put('/education/{id}/add', [educationController::class, 'update'])->name('education.update');
Route::delete('/education/{id}/delete', [educationController::class, 'destroy'])->name('education.delete');


// experience
Route::get('/experience', [experienceController::class, 'index'])->name('experience.index');
Route::post('/experience/add', [experienceController::class, 'add'])->name('experience.add');
Route::put('/experience/{id}/add', [experienceController::class, 'update'])->name('experience.update');
Route::delete('/experience/{id}/delete', [experienceController::class, 'destroy'])->name('experience.delete');

// service admin
Route::get('/service', [serviceController::class, 'index'])->name('service.index');
Route::post('/service/add', [serviceController::class, 'add'])->name('service.add');
Route::put('/service/{id}/add', [serviceController::class, 'update'])->name('service.update');
Route::delete('/service/{id}/delete', [serviceController::class, 'destroy'])->name('service.delete');

// work admin
Route::get('/work', [workController::class, 'index'])->name('work.index');
Route::post('/work/add', [workController::class, 'create'])->name('work.create');
Route::put('/work/update/{id}', [workController::class, 'update'])->name('work.update');
Route::delete('/work/delete/{id}', [workController::class, 'destroy'])->name('work.delete');
// contact admin
Route::get('/contact', [contactController::class, 'index'])->name('contact.index');