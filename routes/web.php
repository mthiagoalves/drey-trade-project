<?php

use App\Http\Controllers\SubscriptionController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Homepage');
})->name('home');

Route::get('/blog', function () {
    return Inertia::render('Blog');
})->name('blog');

Route::get('/sobre-nos', function () {
    return Inertia::render('About');
})->name('about');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/subscribe', [SubscriptionController::class, 'store'])->name('subscribe');

Route::get('/subscriptions/export', [SubscriptionController::class, 'export'])->name('subscriptions.export');

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
