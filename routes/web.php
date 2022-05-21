<?php

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


Route::post('/upload-image', [\App\Http\Controllers\Admin\UploadController::class, 'upload']);
Route::prefix('admin')->group(function () {
	// Auth
	Route::prefix('auth')->group(function () {
		Route::get('login', [ \App\Http\Controllers\Admin\AuthController::class , 'loginForm'])->name('admin.auth.login.form');
		Route::post('login', [ \App\Http\Controllers\Admin\AuthController::class , 'login'])->name('admin.auth.login');
		Route::any('logout', [ \App\Http\Controllers\Admin\AuthController::class , 'logout'])->name('admin.auth.logout');
	});

	// Dashboard
	Route::prefix('dashboard')->group(function () {
		Route::get('/', [ \App\Http\Controllers\Admin\DashboardController::class , 'index'])->name('admin.dashboard.index');
	});

    // Products
    Route::prefix('products')->group(function () {
        Route::get('/', [ \App\Http\Controllers\Admin\ProductController::class , 'index'])->name('admin.products.index');
        Route::get('/create', [ \App\Http\Controllers\Admin\ProductController::class , 'create'])->name('admin.products.create');
        Route::get('/edit/{id}', [ \App\Http\Controllers\Admin\ProductController::class , 'edit'])->name('admin.products.edit');
    });

    // Product categories
    Route::prefix('categories')->group(function () {
        Route::get('/', [ \App\Http\Controllers\Admin\CategoryController::class , 'index'])->name('admin.categories.index');
        Route::get('/create', [ \App\Http\Controllers\Admin\CategoryController::class , 'create'])->name('admin.categories.create');
        Route::get('/edit/{id}', [ \App\Http\Controllers\Admin\CategoryController::class , 'edit'])->name('admin.categories.edit');
    });

    // Product groups
    Route::prefix('groups')->group(function () {
        Route::get('/', [ \App\Http\Controllers\Admin\GroupController::class , 'index'])->name('admin.groups.index');
        Route::get('/create', [ \App\Http\Controllers\Admin\GroupController::class , 'create'])->name('admin.groups.create');
        Route::get('/edit/{id}', [ \App\Http\Controllers\Admin\GroupController::class , 'edit'])->name('admin.groups.edit');
    });

    // Users
    Route::prefix('users')->group(function () {
        Route::get('/', [ \App\Http\Controllers\Admin\UserController::class , 'index'])->name('admin.users.index');
        Route::get('/create', [ \App\Http\Controllers\Admin\UserController::class , 'create'])->name('admin.users.create');
        Route::get('/edit/{id}', [ \App\Http\Controllers\Admin\UserController::class , 'edit'])->name('admin.users.edit');
    });

    // Coupons
    Route::prefix('coupons')->group(function () {
        Route::get('/', [ \App\Http\Controllers\Admin\CouponController::class , 'index'])->name('admin.coupons.index');
        Route::get('/create', [ \App\Http\Controllers\Admin\CouponController::class , 'create'])->name('admin.coupons.create');
        Route::get('/edit/{id}', [ \App\Http\Controllers\Admin\CouponController::class , 'edit'])->name('admin.coupons.edit');
    });

    // Banners
    Route::prefix('banners')->group(function () {
        Route::get('/', [ \App\Http\Controllers\Admin\BannerController::class , 'index'])->name('admin.banners.index');
        Route::get('/create', [ \App\Http\Controllers\Admin\BannerController::class , 'create'])->name('admin.banners.create');
        Route::get('/edit/{id}', [ \App\Http\Controllers\Admin\BannerController::class , 'edit'])->name('admin.banners.edit');
    });

    // Comments
    Route::prefix('comments')->group(function () {
        Route::get('/', [ \App\Http\Controllers\Admin\CommentController::class , 'index'])->name('admin.comments.index');
    });

    // Blog Posts
    Route::prefix('blog-posts')->group(function () {
        Route::get('/', [ \App\Http\Controllers\Admin\BlogPostController::class , 'index'])->name('admin.blog-posts.index');
        Route::get('/create', [ \App\Http\Controllers\Admin\BlogPostController::class , 'create'])->name('admin.blog-posts.create');
        Route::get('/edit/{id}', [ \App\Http\Controllers\Admin\BlogPostController::class , 'edit'])->name('admin.blog-posts.edit');
    });

    // Tickets
    Route::prefix('tickets')->group(function () {
        Route::get('/', [ \App\Http\Controllers\Admin\TicketController::class , 'index'])->name('admin.tickets.index');
    });
});

Route::middleware([])->group(function () {
	Route::prefix('/')->group(function () {
		Route::get('/', [ \App\Http\Controllers\Front\HomeController::class , 'index'])->name('home');
	});
	
	Route::prefix('contact-us')->group(function () {
		Route::get('/', [ \App\Http\Controllers\Front\ContactUsController::class , 'index'])->name('contact-us.index');
	});
	
	Route::prefix('support')->group(function () {
		Route::get('/', [ \App\Http\Controllers\Front\SupportController::class , 'index'])->name('support.index');
	});
	
	Route::prefix('dissatisfaction')->group(function () {
		Route::get('/', [ \App\Http\Controllers\Front\DissatisfactionController::class , 'index'])->name('dissatisfaction.index');
	});
	
	Route::prefix('work-with-us')->group(function () {
		Route::get('/', [ \App\Http\Controllers\Front\WorkWithUsController::class , 'index'])->name('work-with-us.index');
	});
	
	Route::prefix('about-us')->group(function () {
		Route::get('/', [ \App\Http\Controllers\Front\AboutUsController::class , 'index'])->name('about-us.index');
	});
	
	Route::prefix('faq')->group(function () {
		Route::get('/', [ \App\Http\Controllers\Front\FaqController::class , 'index'])->name('faq.index');
	});

});