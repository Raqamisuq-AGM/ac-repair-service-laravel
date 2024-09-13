<?php

use App\Livewire\Components\Blog\BlogDetail;
use App\Livewire\Components\Service\ServiceDetail;
use App\Livewire\Components\Team\TeamDetail;
use App\Livewire\Pages\Other\AboutPage;
use App\Livewire\Pages\Other\ContactPage;
use App\Livewire\Pages\Other\FaqPage;
use App\Livewire\Pages\Blog\BlogPage;
use App\Livewire\Pages\Home\HomePage;
use App\Livewire\Pages\Service\ServiceDetailsPage;
use App\Livewire\Pages\Service\ServicePage;
use App\Livewire\Pages\Service\SubServiceDetailPage;
use App\Livewire\Pages\Team\TeamPage;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class)->name('index');
Route::get('/services', ServicePage::class)->name('service');
Route::get('/service/{slug}', ServiceDetailsPage::class)->name('service.details');
Route::get('/sub-service/{slug}/{subServiceSlug}', SubServiceDetailPage::class)->name('service.sub.service.details');
Route::get('/about', AboutPage::class)->name('about');
Route::get('/contact', ContactPage::class)->name('contact');
// Route::get('/team', TeamPage::class)->name('team');
// Route::get('/team/{slug}', TeamDetail::class)->name('team.details');
// Route::get('/faq', FaqPage::class)->name('faq');
// Route::get('/blog', BlogPage::class)->name('blog');
// Route::get('/blog/{slug}', BlogDetail::class)->name('blog.details');
