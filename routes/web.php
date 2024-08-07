<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdvisorNominationController;
use App\Http\Controllers\AdvisorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\NominationsController;
use App\Http\Controllers\Admin\AdvisorsController;
use App\Http\Controllers\Admin\ImportController;
use App\Http\Controllers\Advisor\ProfileController;
use App\Http\Controllers\Advisor\DashboardController;

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
        Route::get('contact-queries', [AdminController::class, 'contactqueries'])->name('advisatoradmin.contactqueries');
        Route::get('import-form', [ImportController::class, 'importform'])->name('advisatoradmin.importform');
        Route::post('import-data', [ImportController::class, 'importData'])->name('advisatoradmin.importdata');

        //Nominations Menu
        Route::get('/nominations', [NominationsController::class, 'index'])->name('advisatoradmin.nominations.list');
        Route::get('nominations/{id}', [NominationsController::class, 'show'])->name('advisatoradmin.nominations.show');
        Route::get('nominations/{id}/evaluate', [NominationsController::class, 'showEvaluationForm'])->name('advisatoradmin.nominations.evaluate');
        Route::post('nominations/{id}/evaluate/submit', [NominationsController::class, 'evaluateNomination'])->name('advisatoradmin.nominations.evaluate.submit');

        //Advisor Accounts Menu
        Route::get('/advisoraccounts', [AdvisorsController::class, 'index'])->name('advisatoradmin.advisoraccounts.list');
        Route::get('advisoraccounts/{id}', [AdvisorsController::class, 'show'])->name('advisatoradmin.advisoraccounts.show');
        Route::get('advisoraccounts/{id}/edit', [AdvisorsController::class, 'edit'])->name('advisatoradmin.advisoraccounts.edit');
        Route::put('/advisoraccounts/{id}/update', [AdvisorsController::class, 'update'])->name('advisatoradmin.advisoraccounts.update');
        Route::get('advisoraccounts/{id}/availability', [AdvisorsController::class, 'getAvailability'])->name('advisatoradmin.advisoraccounts.availability');
        Route::post('advisoraccounts/{id}/availability/update', [AdvisorsController::class, 'updateAvailability'])->name('advisatoradmin.advisoraccounts.updateAvailability');
        Route::post('/advisoraccounts/{id}/update-prices', [AdvisorsController::class, 'updatePrices'])->name('advisatoradmin.advisoraccounts.updatePrices');
        Route::post('/advisoraccounts/{id}/updateVideos', [AdvisorsController::class, 'updateVideos'])->name('advisatoradmin.advisoraccounts.updateVideos');
        Route::post('/advisoraccounts/{id}/bank-details', [AdvisorsController::class, 'bankstore'])->name('advisatoradmin.advisoraccounts.bankDetails.store');
    });

    //User Dashboard
    Route::prefix('user')->group(function () {
        Route::get('dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
        Route::get('my-profile', [UserController::class, 'myprofile'])->name('user.myprofile');
        Route::get('my-wallet', [UserController::class, 'mywallet'])->name('user.mywallet');
        Route::get('my-bookings', [UserController::class, 'mybookings'])->name('user.mybookings');
        Route::get('transaction-history', [UserController::class, 'transactionhistory'])->name('user.transactionhistory');
    });

    //Advisor Dashboard
    Route::prefix('advisor')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('advisor.dashboard');
        //profile
        Route::get('myprofileinfo', [ProfileController::class, 'myprofile'])->name('advisor.myprofile');
        Route::put('profile', [ProfileController::class, 'profileupdate'])->name('advisor.myprofile.update');
        Route::get('advisorinfo/availability', [ProfileController::class, 'getAvailability'])
            ->name('advisor.availability');
        Route::post('updateVideos', [ProfileController::class, 'updateVideos'])->name('advisor.updateVideos');
        Route::post('advisorinfo/availability/update', [ProfileController::class, 'updateAvailability'])->name('advisor.updateAvailability');
        Route::post('/advisor/update-prices', [ProfileController::class, 'updatePrices'])->name('advisor.updatePrices');
        Route::post('/advisor/bank-details', [ProfileController::class, 'bankstore'])->name('advisor.bankDetails.store');
        Route::post('/tickets/store', [ProfileController::class, 'ticketstore'])->name('advisor.tickets.store');
        Route::get('reviews-summary', [DashboardController::class, 'reviewssummary'])->name('advisor.reviewssummary');
        Route::get('my-bookings', [DashboardController::class, 'mybookings'])->name('advisor.mybookings');
        Route::get('my-earnings', [DashboardController::class, 'myearnings'])->name('advisor.myearnings');
    });

});
