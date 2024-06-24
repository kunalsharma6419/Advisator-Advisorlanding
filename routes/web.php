<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdvisorNominationController;
use App\Http\Controllers\AdvisorController;
use App\Http\Controllers\AdminController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

//Web Pages
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/consult-advisor', [HomeController::class, 'consultadvisor'])->name('consult-advisor');
Route::get('/about-us', [HomeController::class, 'aboutus'])->name('about-us');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/contact-us', [HomeController::class, 'contactus'])->name('contact-us');
Route::post('/send-contact', [HomeController::class, 'contactstore'])->name('send.contact');
Route::get('/terms-of-service', [HomeController::class, 'terms'])->name('terms-of-service');
Route::get('/privacy-policy', [HomeController::class, 'privacy'])->name('privacy-policy');
Route::get('/onboarding-policy', [HomeController::class, 'onboardpolicy'])->name('onboarding-policy');

//Register
Route::get('register', [AuthController::class, 'loadRegister'])->name('register');
Route::post('register', [AuthController::class, 'studentRegister']);
Route::get('verification/{id}', [AuthController::class, 'verification']);
Route::post('verify-otp', [AuthController::class, 'verifiedOtp'])->name('verifiedOtp');
Route::get('resend-otp', [AuthController::class, 'resendOtp'])->name('resendOtp');
Route::get('/dashboard',[AuthController::class,'loadDashboard'])->name('dashboard');

//Advisor Nomination
// Route::get('advisor/nomination', [AdvisorController::class, 'advisornomination'])->name('advisor.nomination');
// Route::post('advisor/submit-nomination', [AdvisorController::class, 'store'])->name('advisor.nomination.store');
Route::get('/advisor-nominations/create/{userId}', [AdvisorNominationController::class, 'create'])->name('advisor-nominations.create');
Route::post('/advisor-nominations', [AdvisorNominationController::class, 'store'])->name('advisor-nominations.store');

Route::get('/api/sub-function-categories/{id}', [AdvisorNominationController::class, 'getByBusinessFunctionCategory']);

//Login
Route::get('login', [AuthController::class, 'loadLogin'])->name('login');
Route::post('login', [AuthController::class, 'userLogin']);
Route::get('verification-login/{id}', [AuthController::class, 'verificationLogin']);
Route::post('verify-login-otp', [AuthController::class, 'verifiedLoginOtp'])->name('verifyloginotp');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/redirect', [HomeController::class, 'redirect'])->name('redirect');
    //Admin Dashboard
    Route::prefix('advisatoradmin')->group(function () {
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('advisatoradmin.dashboard');
    });

    //User Dashboard
    // Route::prefix('user')->group(function () {
    //     Route::get('dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    //     Route::get('my-profile', [UserController::class, 'myprofile'])->name('user.myprofile');
    //     Route::get('my-wallet', [UserController::class, 'mywallet'])->name('user.mywallet');
    //     Route::get('my-bookings', [UserController::class, 'mybookings'])->name('user.mybookings');
    //     Route::get('transaction-history', [UserController::class, 'transactionhistory'])->name('user.transactionhistory');
    // });

    //Advisor Dashboard
    Route::prefix('advisor')->group(function () {
        Route::get('dashboard', [AdvisorController::class, 'dashboard'])->name('advisor.dashboard');
        Route::get('my-profile', [AdvisorController::class, 'myprofile'])->name('advisor.myprofile');
        Route::get('reviews-summary', [AdvisorController::class, 'reviewssummary'])->name('advisor.reviewssummary');
        Route::get('my-bookings', [AdvisorController::class, 'mybookings'])->name('advisor.mybookings');
        Route::get('my-earnings', [AdvisorController::class, 'myearnings'])->name('advisor.myearnings');
    });
});
