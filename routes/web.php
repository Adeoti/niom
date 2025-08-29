<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\PaymentHistoryController;
use App\Http\Controllers\PaymentController;
use App\Models\Membership;

Route::get('/', function () {
    $news = \App\Models\News::latest()->take(3)->get();
    $members = Membership::where('featured_on_homepage', true)->where('status', 'approved')->latest()->take(3)->get();

    return view('welcome', compact('news', 'members'));
})->name('home');


Route::middleware(['auth'])->group(function () {
    Route::get('/payment-history', [PaymentHistoryController::class, 'index'])->name('payment.history');
    Route::get('/payment-history/{id}', [PaymentHistoryController::class, 'show'])->name('payment.history.show');
    Route::get('/payment-history/download/{type}', [PaymentHistoryController::class, 'download'])->name('payment.history.download');


    Route::middleware(['auth'])->group(function () {
        // Other routes...
        Route::get('/pending-payments', [PaymentController::class, 'pending'])->name('pending-payments');
        Route::post('/payments/{payment}/process', [PaymentController::class, 'process'])->name('payments.process');
    });
});

Route::get('/news', [\App\Http\Controllers\NewsController::class, 'index'])->name('news.index');

// Single news

Route::get('/news/{id}', [\App\Http\Controllers\NewsController::class, 'show'])->name('news.show');

Route::post('/membership/apply', [\App\Http\Controllers\MembershipController::class, 'apply'])->name('membership.apply');
// /checkout?application_id
Route::get('/checkout', [\App\Http\Controllers\MembershipController::class, 'checkout'])->name('membership.checkout');
Route::get('/members', [MembershipController::class, 'index'])->name('membership.index');
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');
Route::get('application/form', [MembershipController::class, 'create'])->name('membership.create');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');
});


Route::get('/register', [\App\Http\Controllers\AuthController::class, 'showRegistrationForm'])->name('register');
