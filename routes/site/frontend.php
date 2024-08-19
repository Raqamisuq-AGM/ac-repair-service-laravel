<?php

use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Route;


// Frontend Routes
Route::get('/', [FrontendController::class, 'index'])->name('home');
// Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/faq', [FrontendController::class, 'faq'])->name('faq');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::post('/contact', [FrontendController::class, 'contactSubmit'])->name('contact.submit');
Route::get('/services', [FrontendController::class, 'allService'])->name('service');
Route::get('/service/{slug}', [FrontendController::class, 'serviceDetails'])->name('service.details');
Route::get('/teams', [FrontendController::class, 'allTeam'])->name('team');
Route::get('/team/{slug}', [FrontendController::class, 'teamDetails'])->name('team.details');
Route::get('/blogs/all', [FrontendController::class, 'allBlog'])->name('blog');
Route::get('/blog/{slug}', [FrontendController::class, 'blogDetails'])->name('blog.details');
