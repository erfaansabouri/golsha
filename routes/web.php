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

	// Settings
	Route::prefix('settings')->group(function () {
		Route::get('/', [ \App\Http\Controllers\Admin\SettingController::class , 'index'])->name('admin.settings.index');
		Route::get('/edit/{id}', [ \App\Http\Controllers\Admin\SettingController::class , 'edit'])->name('admin.settings.edit');
	});

});

Route::prefix('user')->group(function () {
	Route::prefix('auth')->group(function () {
		Route::get('login', [ \App\Http\Controllers\Front\AuthController::class , 'loginForm'])->name('user.auth.login.form');
		Route::get('logout', [ \App\Http\Controllers\Front\AuthController::class , 'logout'])->name('user.auth.logout');
		Route::post('sendOTP', [ \App\Http\Controllers\Front\AuthController::class , 'sendOTP'])->name('user.auth.sendOTP');
		Route::get('OTPForm/{id}', [ \App\Http\Controllers\Front\AuthController::class , 'OTPForm'])->name('user.auth.OTPForm');
		Route::post('validateOTPAndLogin', [ \App\Http\Controllers\Front\AuthController::class , 'validateOTPAndLogin'])->name('user.auth.validateOTPAndLogin');
	});

    Route::prefix('profile')->middleware(['auth'])->group(function () {
        Route::get('/details', [ \App\Http\Controllers\Front\ProfileController::class , 'details'])->name('user.profile.details');
        Route::put('/update-details', [ \App\Http\Controllers\Front\ProfileController::class , 'updateDetails'])->name('user.profile.updateDetails');
        Route::get('/destroy-address/{id}', [ \App\Http\Controllers\Front\ProfileController::class , 'destroyAddress'])->name('user.profile.destroyAddress');
        Route::post('/store-address', [ \App\Http\Controllers\Front\ProfileController::class , 'storeAddress'])->name('user.profile.storeAddress');
        Route::put('/update-address/{id}', [ \App\Http\Controllers\Front\ProfileController::class , 'updateAddress'])->name('user.profile.updateAddress');

        Route::get('/orders', [ \App\Http\Controllers\Front\ProfileController::class , 'orders'])->name('user.profile.orders');
        Route::get('/order-details/{id}', [ \App\Http\Controllers\Front\ProfileController::class , 'orderDetails'])->name('user.profile.order-details');

        Route::get('/saved-products', [ \App\Http\Controllers\Front\ProfileController::class , 'savedProducts'])->name('user.profile.saved-products');
        Route::get('/destroy-saved-product/{id}', [ \App\Http\Controllers\Front\ProfileController::class , 'destroySavedProduct'])->name('user.profile.destroy-saved-product');

        Route::get('/comments', [ \App\Http\Controllers\Front\ProfileController::class , 'comments'])->name('user.profile.comments');
    });
});

Route::middleware([])->group(function () {
	Route::prefix('/')->group(function () {
		Route::get('/', [ \App\Http\Controllers\Front\HomeController::class , 'index'])->name('home');
	});

    Route::prefix('/products')->group(function () {
        Route::get('/', [ \App\Http\Controllers\Front\ProductController::class , 'index'])->name('products.index');
        Route::get('/{id}', [ \App\Http\Controllers\Front\ProductController::class , 'show'])->name('products.show');
        Route::post('store-comment/{id}', [ \App\Http\Controllers\Front\ProductController::class , 'storeComment'])->name('products.store-comment');
        Route::get('save/{id}', [ \App\Http\Controllers\Front\ProductController::class , 'save'])->name('products.save');
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

	Route::prefix('blog')->group(function () {
		Route::get('/', [ \App\Http\Controllers\Blog\BlogController::class , 'index'])->name('blog.index');
		Route::get('/{id}', [ \App\Http\Controllers\Blog\BlogController::class , 'show'])->name('blog.show');
	});

});
