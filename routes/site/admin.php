<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactUsMailController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\FrontendSectionController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\TrafficController;
use App\Http\Controllers\Auth\AuthController;
use App\Models\Blog;
use App\Models\Service;
use App\Models\Team;
use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

// Admin Routes
Route::get('/admin', [AdminController::class, 'dashboard'])->name('dashboard');
Route::prefix('admin')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    // category Routes
    Route::prefix('category')->group(function () {
        Route::get('/all', [CategoryController::class, 'all'])->name('category.all');
        Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::post('/update', [CategoryController::class, 'update'])->name('category.update');
        Route::post('/delete', [CategoryController::class, 'delete'])->name('category.delete');
    });

    // category Routes
    Route::prefix('sub-category')->group(function () {
        Route::get('/all', [CategoryController::class, 'all'])->name('sub-category.all');
        Route::get('/create', [CategoryController::class, 'create'])->name('sub-category.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('sub-category.store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('sub-category.edit');
        Route::post('/update', [CategoryController::class, 'update'])->name('sub-category.update');
        Route::post('/delete', [CategoryController::class, 'delete'])->name('sub-category.delete');
    });

    // blog Routes
    Route::prefix('blog')->group(function () {
        Route::get('/all', [BlogController::class, 'all'])->name('blog.all');
        Route::get('/create', [BlogController::class, 'create'])->name('blog.create');
        Route::post('/store', [BlogController::class, 'store'])->name('blog.store');
        Route::get('/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
        Route::post('/update', [BlogController::class, 'update'])->name('blog.update');
        Route::post('/delete', [BlogController::class, 'delete'])->name('blog.delete');
    });

    // service Routes
    Route::prefix('service')->group(function () {
        Route::get('/all', [ServiceController::class, 'all'])->name('service.all');
        Route::get('/create', [ServiceController::class, 'create'])->name('service.create');
        Route::post('/store', [ServiceController::class, 'store'])->name('service.store');
        Route::get('/edit/{id}', [ServiceController::class, 'edit'])->name('service.edit');
        Route::post('/update', [ServiceController::class, 'update'])->name('service.update');
        Route::post('/delete', [ServiceController::class, 'delete'])->name('service.delete');
    });

    // team Routes
    Route::prefix('team')->group(function () {
        Route::get('/all', [TeamController::class, 'all'])->name('team.all');
        Route::get('/create', [TeamController::class, 'create'])->name('team.create');
        Route::post('/store', [TeamController::class, 'store'])->name('team.store');
        Route::get('/edit/{id}', [TeamController::class, 'edit'])->name('team.edit');
        Route::post('/update', [TeamController::class, 'update'])->name('team.update');
        Route::post('/delete', [TeamController::class, 'delete'])->name('team.delete');
    });

    // faq Routes
    Route::prefix('faq')->group(function () {
        Route::get('/all', [FaqController::class, 'all'])->name('faq.all');
        Route::get('/create', [FaqController::class, 'create'])->name('faq.create');
        Route::post('/store', [FaqController::class, 'store'])->name('faq.store');
        Route::get('/edit/{id}', [FaqController::class, 'edit'])->name('faq.edit');
        Route::post('/update', [FaqController::class, 'update'])->name('faq.update');
        Route::post('/delete', [FaqController::class, 'delete'])->name('faq.delete');
    });

    // contact_mail Routes
    Route::prefix('contact_mail')->group(function () {
        Route::get('/all', [ContactUsMailController::class, 'all'])->name('contact_mail.all');
    });

    // frontend section Routes
    Route::prefix('frontend')->group(function () {
        Route::get('/all', [FrontendSectionController::class, 'all'])->name('frontend.all');
    });

    // settings Routes
    Route::prefix('settings')->group(function () {
        Route::get('/change-email', [SettingController::class, 'changeEmail'])->name('settings.changeEmail');
        Route::post('/change-email', [SettingController::class, 'changeEmailUpdate'])->name('settings.changeEmailUpdate');
        Route::get('/change-password', [SettingController::class, 'changePassword'])->name('settings.changePassword');
        Route::post('/change-password', [SettingController::class, 'changePasswordUpdate'])->name('settings.changePasswordUpdate');
        Route::get('/company', [SettingController::class, 'company'])->name('settings.company');
        Route::post('/company', [SettingController::class, 'companyUpdate'])->name('settings.company');
        Route::get('/clear-cache', [SettingController::class, 'clearCache'])->name('settings.clearCache');
        Route::get('/custom-code', [SettingController::class, 'customCode'])->name('settings.custom.code');
        Route::post('/custom-code', [SettingController::class, 'customCodeUpdate'])->name('settings.custom.code.update');

        Route::get('/generate-sitemap', function () {
            $sitemap = Sitemap::create()
                ->add(Url::create('/'))
                ->add(Url::create('/about'))
                ->add(Url::create('/contact'))
                ->add(Url::create('/products'))
                ->add(Url::create('/saas-product'))
                ->add(Url::create('/services'))
                ->add(Url::create('/projects'))
                ->add(Url::create('/blogs'))
                ->add(Url::create('/course'));

            Team::all()->each(function (Team $project) use ($sitemap) {
                $sitemap->add(Url::create("/project/{$project->slug}"));
            });

            Service::all()->each(function (Service $service) use ($sitemap) {
                $sitemap->add(Url::create("/service/{$service->slug}"));
            });

            Blog::all()->each(function (Blog $blog) use ($sitemap) {
                $sitemap->add(Url::create("/blog/{$blog->slug}"));
            });

            $sitemap->writeTofile(public_path('sitemap.xml'));

            //return success message with tostr
            // toastr()->success('sitemap generated successfully!', 'success', ['timeOut' => 5000, 'closeButton' => true]);

            flash()->success('sitemap generated successfully.');

            return back();
        })->name('settings.generateSitemap');
    });

    // traffics Routes
    Route::get('/traffics', [TrafficController::class, 'all'])->name('traffics.all');
});
