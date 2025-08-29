<?php

use App\Models\Membership;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\PaymentHistoryController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    $news = \App\Models\News::latest()->take(3)->get();
    $members = Membership::where('featured_on_homepage', true)->where('status', 'approved')->latest()->take(3)->get();

    return view('welcome', compact('news', 'members'));
})->name('home');



// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    // Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');

    Route::get('/register', function () {
        return redirect()->route('membership.create');
    })->name('register');
    // Route::post('/register', [AuthController::class, 'register']);
});

Route::get('/test', function () {
    // dd("elllo");
    abort(500);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/payment-history', [PaymentHistoryController::class, 'index'])->name('payment.history');
    Route::get('/payment-history/{id}', [PaymentHistoryController::class, 'show'])->name('payment.history.show');
    Route::get('/payment-history/download/{type}', [PaymentHistoryController::class, 'download'])->name('payment.history.download');



    // Pending Payment Routes...
    Route::get('/pending-payments', [PaymentController::class, 'pending'])->name('pending-payments');
    Route::post('/payments/{payment}/process', [PaymentController::class, 'process'])->name('payments.process');

    // Event Routes....
    Route::get('/events', [EventController::class, 'index'])->name('events.index');
    Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');
    Route::post('/events/{event}/register', [EventController::class, 'register'])->name('events.register');


    // Profile Routes....
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.avatar');




    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
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
