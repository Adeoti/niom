<?php

use App\Models\Event;
use App\Models\Membership;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\PaymentHistoryController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;

Route::get('/', function () {
    $news = \App\Models\News::latest()->take(3)->get();
    $members = Membership::where('featured_on_homepage', true)->where('status', 'approved')->latest()->take(3)->get();


    $latestEvent = Event::where('is_active', true)->latest()->first();

    return view('welcome', compact('news', 'members', 'latestEvent'));
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

Route::post('/paystack/webhook', [PaymentController::class, 'handleWebhook'])
    ->name('payment.webhook')
    ->withoutMiddleware([VerifyCsrfToken::class]);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    // Route::get('/payment-history', [PaymentHistoryController::class, 'index'])->name('payment.history');
    // Route::get('/payment-history/{id}', [PaymentHistoryController::class, 'show'])->name('payment.history.show');
    // Route::get('/payment-history/download/{type}', [PaymentHistoryController::class, 'download'])->name('payment.history.download');


    // Payment History Routes
    Route::prefix('payment-history')->name('payment.history.')->group(function () {
        Route::get('/', [PaymentHistoryController::class, 'index'])->name('index');
        Route::get('/{id}', [PaymentHistoryController::class, 'show'])->name('show');
        Route::get('/download/{type}', [PaymentHistoryController::class, 'download'])->name('download');
    });

    // Profile Routes
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'show'])->name('show');
        Route::get('/edit', [ProfileController::class, 'edit'])->name('edit');
        Route::put('/update', [ProfileController::class, 'update'])->name('update');
        Route::post('/update/avatar', [ProfileController::class, 'updateAvatar'])->name('update.avatar');
        Route::post('/update/password', [ProfileController::class, 'updatePassword'])->name('update.password');
    });

    // Events Routes
    Route::prefix('events')->name('events.')->group(function () {
        Route::get('/', [EventController::class, 'index'])->name('index');
        Route::get('/{event}', [EventController::class, 'show'])->name('show');
        Route::post('/register/{event}', [EventController::class, 'register'])->name('register');
    });

    // Pending Payments Routes
    Route::prefix('pending-payments')->name('pending.payments.')->group(function () {
        Route::get('/', [PaymentController::class, 'pending'])->name('index');
        Route::post('/process/{payment}', [PaymentController::class, 'process'])->name('process');
    });

    Route::post('/payment/initialize/{payment}', [PaymentController::class, 'initializePayment'])->name('payment.initialize');
    Route::get('/payment/callback', [PaymentController::class, 'handlePaymentCallback'])->name('payment.callback');



    // Event Routes....
    Route::get('/events', [EventController::class, 'index'])->name('events.index');
    Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');
    Route::post('/events/{event}/register', [EventController::class, 'register'])->name('events.register');





    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/news', [\App\Http\Controllers\NewsController::class, 'index'])->name('news.index');

// Single news

Route::get('/news/{id}', [\App\Http\Controllers\NewsController::class, 'show'])->name('news.show');

Route::post('/membership/apply', [\App\Http\Controllers\MembershipController::class, 'apply'])->name('membership.apply');
// /checkout?application_id
Route::get('/checkout', [\App\Http\Controllers\MembershipController::class, 'checkout'])->name('membership.checkout');
Route::get('/members', [MembershipController::class, 'index'])->name('membership.index');
Route::get('/excos', [MembershipController::class, 'excos'])->name('membership.excos');
Route::get('/councils', [MembershipController::class, 'councils'])->name('membership.councils');
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');
Route::get('application/form', [MembershipController::class, 'create'])->name('membership.create');
