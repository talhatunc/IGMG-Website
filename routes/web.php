<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $sliders = \App\Models\Slider::where('is_active', true)->orderBy('order')->get();
    $home_news = \App\Models\News::where('is_published', true)->latest('published_at')->take(5)->get();
    return view('home', compact('sliders', 'home_news'));
})->name('home');

Route::get('/hakkimizda', function () {
    return view('about');
})->name('about');

Route::get('/haberler', [App\Http\Controllers\NewsController::class, 'index'])->name('news');
Route::get('/haberler/{news}', [App\Http\Controllers\NewsController::class, 'show'])->name('news.show');

Route::post('/members', [App\Http\Controllers\MemberController::class, 'store'])->name('members.store');

Route::get('/iletisim', function () {
    return view('contact');
})->name('contact');

Route::get('/egitim', function () {
    return view('education');
})->name('education');

Route::get('/hasene', function () {
    return view('hasene');
})->name('hasene');

Route::get('/hac', function () {
    return view('hac');
})->name('hac');

Route::get('/kurumsal', function () {
    return view('kib');
})->name('kib');

Route::get('/genclik', function () {
    return view('youth');
})->name('youth');

Route::get('/kadinlar', function () {
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

        // Slider Management
        Route::resource('sliders', App\Http\Controllers\Admin\SliderController::class);
    });
});
