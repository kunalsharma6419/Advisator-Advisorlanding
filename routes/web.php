<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdvisorNominationController;
use App\Http\Controllers\UserRegistrationController;
use App\Http\Controllers\AdvisorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\NominationsController;
use App\Http\Controllers\Admin\AdvisorsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\ImportController;
use App\Http\Controllers\Advisor\ProfileController;
use App\Http\Controllers\Advisor\DashboardController;
use App\Http\Controllers\CallLogController;
use App\Http\Controllers\CallController;
use App\Http\Controllers\SendNotificationController;
use App\Http\Controllers\CallReviewController;
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
Route::get('/landing', [HomeController::class, 'landing'])->name('landing');
Route::get('/consult-advisor', [HomeController::class, 'consultadvisor'])->name('consult-advisor');
Route::get('/advisors/{advisor_id}', [HomeController::class, 'advisorDetail'])->name('advisors.detail');
Route::get('/about-us', [HomeController::class, 'aboutus'])->name('about-us');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/contact-us', [HomeController::class, 'contactus'])->name('contact-us');
Route::post('/send-contact', [HomeController::class, 'contactstore'])->name('send.contact');
Route::get('/terms-of-service', [HomeController::class, 'terms'])->name('terms-of-service');
Route::get('/privacy-policy', [HomeController::class, 'privacy'])->name('privacy-policy');
Route::get('/onboarding-policy', [HomeController::class, 'onboardpolicy'])->name('onboarding-policy');
Route::get('/shipping-and-delivery-policy', [HomeController::class, 'shippingdeliverypolicy'])->name('shipping-delivery-policy');
Route::get('/cancellation-and-refund-policy', [HomeController::class, 'cancellationrefundpolicy'])->name('cancellation-refund-policy');
Route::get('/get-sub-functions', [HomeController::class, 'getSubFunctions'])->name('getSubFunctions');
Route::get('/advisor-suggestions', [HomeController::class, 'advisorSuggestions'])->name('advisor.suggestions');
Route::get('/filter-suggestions', [HomeController::class, 'getCategorySuggestions']);
Route::get('/categories/{categoryName}', [HomeController::class, 'showCategoryDetail'])->name('category.detail');
Route::get('/industries/{industryName}', [HomeController::class, 'showIndustryDetail'])->name('industry.detail');
Route::get('/locations/{locationName}', [HomeController::class, 'showGeographyDetail'])->name('location.detail');

//Register
Route::get('register', [AuthController::class, 'loadRegister'])->name('register');
Route::post('register', [AuthController::class, 'studentRegister']);
Route::get('verification/{id}', [AuthController::class, 'verification']);
Route::post('verify-otp', [AuthController::class, 'verifiedOtp'])->name('verifiedOtp');
Route::get('resend-otp', [AuthController::class, 'resendOtp'])->name('resendOtp');
Route::get('/dashboard',[AuthController::class,'loadDashboard'])->name('dashboard');

//User Registrations
Route::get('/user-registrations/create/{userId}', [UserRegistrationController::class, 'create'])->name('user-registrations.create');
Route::post('/user-registrations', [UserRegistrationController::class, 'store'])->name('user-registrations.store');

//Advisor Nomination
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
    Route::post('/book-appointment', [HomeController::class, 'bookAppointment']);

    //discovery call --------------->
    Route::get('/discovery-call', [HomeController::class, 'discoverycall'])->name('discovery.call');
    Route::post('/api/save-advisor-id', [CallReviewController::class, 'saveAdvisorIdForReview'])->name('api.saveAdvisorId');
    Route::get('/call-review', [CallReviewController::class, 'index'])->name('call.review.index');  
    Route::post('/call-review/store', [CallReviewController::class, 'store'])->name('call.review.store');
    
    //consultation-call ------>
    Route::get('/consultation-call', [HomeController::class, 'consultationcall'])->name('consultation.call');


    Route::post('/discovery-call/initiate', [HomeController::class, 'initiateCall'])->name('discovery.call.initiate');
    Route::post('/set-advisor-session', [CallReviewController::class, 'storeAdvisorSession'])->name('set-advisor-session');
    Route::post('/set-receiver-id', [HomeController::class, 'setReceiverId']);
    Route::get('/accept-discovery-call/{userId}', [HomeController::class, 'acceptdiscoverycall'])->name('accept.discovery.call');
    
    Route::post('/save-call-log', [CallLogController::class, 'saveCallLog']);
    Route::post('/save-call-data', [CallController::class, 'saveCallData']);
    // Define the route for getting subscription ID by UID
    Route::get('/get-subscription-id', [HomeController::class, 'getSubscriptionId']);
    Route::post('/save-token', [HomeController::class, 'saveToken'])->name('save-token');
    Route::post('/toggle-usertype', [AuthController::class, 'toggleUsertype'])->name('toggle.usertype');

    //Admin Dashboard
    Route::prefix('advisatoradmin')->group(function () {
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('advisatoradmin.dashboard');
        Route::get('contact-queries', [AdminController::class, 'contactqueries'])->name('advisatoradmin.contactqueries');
        Route::delete('advisoraccounts/{user_id}/delete', [AdvisorsController::class, 'userDestroy'])->name('advisorNominations.userdestroy');
        Route::patch('advisoraccounts/{user_id}/restore', [AdvisorsController::class, 'userRestore'])->name('advisorNominations.userrestore');
        Route::delete('contact-queries/{id}', [AdminController::class, 'destroy'])->name('advisatoradmin.contactqueries.destroy');
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

        //User Accounts Menu
        Route::get('/useraccounts', [UsersController::class, 'index'])->name('advisatoradmin.useraccounts.list');
        
        Route::delete('useraccounts/{user_id}/delete', [UsersController::class, 'userDestroy'])->name('useraccounts.userdestroy');
        Route::patch('useraccounts/{user_id}/restore', [UsersController::class, 'userRestore'])->name('useraccounts.userrestore');
    });

    //User Dashboard
    Route::prefix('user')->group(function () {
        Route::get('dashboard', [App\Http\Controllers\User\DashboardController::class, 'dashboard'])->name('user.dashboard');
        Route::get('my-profile', [App\Http\Controllers\User\ProfileController::class, 'myprofile'])->name('user.myprofile');
        Route::put('profile', [App\Http\Controllers\User\ProfileController::class, 'profileupdate'])->name('user.myprofile.update');
        Route::post('/tickets/store', [App\Http\Controllers\User\ProfileController::class, 'ticketstore'])->name('user.tickets.store');
        Route::get('my-wallet', [UserController::class, 'mywallet'])->name('user.mywallet');
        Route::get('my-wallet/recharge', [App\Http\Controllers\User\WalletController::class, 'mywalletrechargeindex'])->name('user.mywallet.recharge');
        Route::post('my-wallet/recharge/store', [App\Http\Controllers\User\WalletController::class, 'store'])->name('user.mywallet.recharge.store');
        Route::get('my-wallet/recharge/success', [App\Http\Controllers\User\WalletController::class, 'success'])->name('user.mywallet.recharge.success');
        Route::post('my-wallet/recharge/payment/callback', [App\Http\Controllers\User\WalletController::class, 'paymentCallback'])->name('user.mywallet.recharge.payment.callback');
        Route::get('my-wallet/recharge/failure', [App\Http\Controllers\User\WalletController::class, 'failure'])->name('user.mywallet.recharge.failure');
        Route::get('my-bookings', [App\Http\Controllers\User\MyBookingController::class, 'mybookings'])->name('user.mybookings');
        Route::get('my-bookings/cancel-appointment/{id}', [App\Http\Controllers\User\MyBookingController::class, 'cancelAppointment'])->name('user.mybookings.appointment.cancel');
        Route::get('transaction-history', [App\Http\Controllers\User\TransactionController::class, 'transactionhistory'])->name('user.transactionhistory');
        Route::post('/send-delete-account-otp', [App\Http\Controllers\User\DashboardController::class, 'sendDeleteAccountOtp'])->name('user.sendDeleteAccountOtp');
        Route::post('/verify-delete-account-otp', [App\Http\Controllers\User\DashboardController::class, 'verifyDeleteAccountOtp'])->name('user.verifyDeleteAccountOtp');
        Route::post('/resend-delete-account-otp',  [App\Http\Controllers\User\DashboardController::class, 'resendDeleteAccountOtp'])->name('user.resendDeleteAccountOtp');

    });

    //Advisor Dashboard
    Route::prefix('advisor')->group(function () {
        Route::get('dashboard', [App\Http\Controllers\Advisor\DashboardController::class, 'dashboard'])->name('advisor.dashboard');
        //profile
        Route::get('my-profile-info', [ProfileController::class, 'myprofile'])->name('advisor.myprofile');
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
        Route::patch('advisor/bookings/{booking}/updateStatus', [DashboardController::class, 'updateBookingStatus'])->name('advisor.booking.updateStatus');
        Route::get('my-earnings', [DashboardController::class, 'myearnings'])->name('advisor.myearnings');
        Route::post('my-earnings/withdraw', [DashboardController::class, 'requestWithdrawal'])->name('advisor.myearnings.withdraw');
        Route::post('/send-delete-account-otp', [DashboardController::class, 'sendDeleteAccountOtp'])->name('advisor.sendDeleteAccountOtp');
        Route::post('/verify-delete-account-otp', [DashboardController::class, 'verifyDeleteAccountOtp'])->name('advisor.verifyDeleteAccountOtp');
        Route::post('/resend-delete-account-otp',  [DashboardController::class, 'resendDeleteAccountOtp'])->name('advisor.resendDeleteAccountOtp');
    });

});



//Blogs

Route::prefix('blog')->group(function () {
   
    Route::get('/5-phases-that-drive-continuous-innovation-in-a-product', function () {
        return view('web.pages.blogs.innovation-product-blog'); // blade file path without ".blade.php"
    });

    Route::get('/successful-adoption-of-ai', function () {
        return view('web.pages.blogs.Adoption-ai-blog'); // blade file path without ".blade.php"
    });

    Route::get('/ai-analytics-assessment', function () {
        return view('web.pages.blogs.ai-analytics-blog'); // blade file path without ".blade.php"
    });

    Route::get('/ai-analytics-roadmap-and-strategy', function () {
        return view('web.pages.blogs.ai-roadmap-blog'); // blade file path without ".blade.php"
    });

    
    Route::get('/role-of-digital-marketing', function () {
        return view('web.pages.blogs.digital-marketing-blog'); // blade file path without ".blade.php"
    });
    Route::get('/key-challenges-in-building-and-deploying-ml-models', function () {
        return view('web.pages.blogs.ml-models-blog'); // blade file path without ".blade.php"
    });
    Route::get('/maha-shivratri-and-international-womens-day-on-the-same-day', function () {
        return view('web.pages.blogs.maha-shivratri-blog'); // blade file path without ".blade.php"
    });

});
