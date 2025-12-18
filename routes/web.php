<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/news', [App\Http\Controllers\NewsController::class, 'index'])->name('news');
Route::get('/news/{news}', [App\Http\Controllers\NewsController::class, 'show'])->name('news.show');

Route::post('/members', [App\Http\Controllers\MemberController::class, 'store'])->name('members.store');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/education', function () {
    return view('education');
})->name('education');

Route::get('/hasene', function () {
    return view('hasene');
})->name('hasene');

Route::get('/hac', function () {
    return view('hac');
})->name('hac');

Route::get('/kib', function () {
    return view('kib');
})->name('kib');

Route::get('/youth', function () {
    return view('youth');
})->name('youth');

Route::get('/women', function () {
    return view('women');
})->name('women');

Route::get('/test', function () {
    return 'OK';
});

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Guest Admin Routes
    Route::middleware('guest')->group(function () {
        Route::get('/login', [App\Http\Controllers\Admin\AuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [App\Http\Controllers\Admin\AuthController::class, 'login']);
    });

    // Authenticated Admin Routes
    Route::middleware('auth')->group(function () {
        Route::post('/logout', [App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
        
        // Member Management
        Route::get('/members', [App\Http\Controllers\Admin\MemberController::class, 'index'])->name('members.index');
        Route::put('/members/{member}', [App\Http\Controllers\Admin\MemberController::class, 'update'])->name('members.update');
        Route::delete('/members/{member}', [App\Http\Controllers\Admin\MemberController::class, 'destroy'])->name('members.destroy');
    
    // News Management
        Route::resource('news', App\Http\Controllers\Admin\NewsController::class);
    });
});
