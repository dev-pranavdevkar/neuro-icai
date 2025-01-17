<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\LoginController;
use  App\Http\Controllers\frontend\SignupController;
use App\Http\Controllers\frontend\ForgetPasswordController;
use App\Http\Controllers\V1\Website\WebAuthController;
use App\Http\Controllers\frontend\AboutController;
use App\Http\Controllers\frontend\MembersController;
use App\Http\Controllers\frontend\StudentsController;
use App\Http\Controllers\frontend\EventsController;
use App\Http\Controllers\frontend\VacanciesController;
use App\Http\Controllers\frontend\DownloadsController;
use App\Http\Controllers\frontend\ProfileController;
use App\Http\Controllers\frontend\RazorpayPaymentController;
use App\Http\Controllers\V1\Website\WebMetaDataController;

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

// Pages

// Route::get('/', function () {
//     $webAuthController = new WebAuthController();
//     $eventDetails = $webAuthController->getAllEventDetails(request());
//     return app()->call([HomeController::class, 'index'], compact('eventDetails'));
// });
Route::get('/', [HomeController::class, 'index']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::post('/ContactUs', [WebMetaDataController::class, 'ContactUs'])->name('ContactUs');


Route::get('/help', [HomeController::class, 'help']);
Route::get('/tenders', [HomeController::class, 'tenders']);
Route::get('/usefulLinks', [HomeController::class, 'usefulLinks']);
Route::get('/atSalesCounter', [HomeController::class, 'atSalesCounter']);
Route::get('/termsOfUse', [HomeController::class, 'termsOfUse']);
Route::get('/privacyPolicy', [HomeController::class, 'privacyPolicy']);
Route::get('/termsAndConditions', [HomeController::class, 'termsAndConditions']);

// About Us Dropdown Pages
Route::get('/about/aboutPuneBranch', [AboutController::class, 'aboutPuneBranch']);
Route::get('/about/annualReports', [AboutController::class, 'annualReports']);
Route::get('/about/chairmanCommunique', [AboutController::class, 'chairmanCommunique']);
Route::get('/about/managingCommittee', [AboutController::class, 'managingCommittee']);
Route::get('/about/pastChairmen', [AboutController::class, 'pastChairmen']);
Route::get('/about/studyCirclesPune', [AboutController::class, 'studyCirclesPune']);
Route::get('/about/subCommittees', [AboutController::class, 'subCommittees']);
Route::get('/about/successStories', [AboutController::class, 'successStories']);
Route::get('/about/torchBearer', [AboutController::class, 'torchBearer']);
Route::get('/about/updates', [AboutController::class, 'updates']);
Route::get('/about/updates/updatesDetails', [AboutController::class, 'updatesDetails']);


// Members Dropdown Pages
Route::get('/members/exposureDrafts', [MembersController::class, 'exposureDrafts']);
Route::get('/members/managingCommitteeMinutes', [MembersController::class, 'managingCommitteeMinutes']);
Route::get('/members/puneMembersNewsletter', [MembersController::class, 'puneMembersNewsletter']);
Route::get('/members/updatesForMembers', [MembersController::class, 'updatesForMembers']);
Route::get('/members/updatesForMembers/updatesDetails', [MembersController::class, 'updatesForMembers']);
Route::get('/members/subscribeForSMSAlerts', [MembersController::class, 'subscribeForSMSAlerts']);
Route::get('/members/membersFAQ', [MembersController::class, 'membersFAQ']);
Route::get('/members/CPEStudyCircles', [MembersController::class, 'CPEStudyCircles']);
Route::get('/members/membersNoticeboard', [MembersController::class, 'membersNoticeboard']);
Route::get('/members/association/associations', [MembersController::class, 'associations']);
Route::get('/members/association/associationDetails/{id}', [MembersController::class, 'associationDetails']);
Route::get('/members/association/addAssociations', [MembersController::class, 'addAssociations']);
Route::get('/members/association/redeemOfferTicket/{id}', [MembersController::class, 'redeemOfferTicket'])->name('redeemOfferTicket');



// Students Dropdown Pages
Route::get('/students/aboutPuneWICASA', [StudentsController::class, 'aboutPuneWICASA']);
Route::get('/students/coachingClasses', [StudentsController::class, 'coachingClasses']);
Route::get('/students/puneWICASANewsletter', [StudentsController::class, 'puneWICASANewsletter']);
Route::get('/students/studentsNoticeboard', [StudentsController::class, 'studentsNoticeboard']);
Route::get('/students/subscribeForSMSAlerts', [StudentsController::class, 'subscribeForSMSAlerts']);
Route::get('/students/WICASAManagingCommittee', [StudentsController::class, 'WICASAManagingCommittee']);
Route::get('/students/ICITSS', [StudentsController::class, 'ICITSS']);
Route::get('/students/AICITSS', [StudentsController::class, 'AICITSS']);
Route::get('/students/ICITSSOrientationCourse', [StudentsController::class, 'ICITSSOrientationCourse']);
Route::get('/students/advancedICITSSMCSCourse', [StudentsController::class, 'advancedICITSSMCSCourse']);
Route::get('/students/libraryReadingRooms', [StudentsController::class, 'libraryReadingRooms']);

Route::get('/students/studentFAQs', [StudentsController::class, 'studentFAQs']);
Route::get('/students/batch', [StudentsController::class, 'batch']);
Route::get('/batch-details/{id}', [StudentsController::class, 'batchDetails'])->name('batchDetails');


// Events Dropdown Pages
Route::get('/events/pastEvents{filter?}', [EventsController::class, 'pastEvents']);
Route::get('/events/upcommingEvents{filter?}', [EventsController::class, 'upcommingEvents']);
Route::get('/eventsDetails/{id}', [EventsController::class, 'eventDetails']);

// Vacancies Dropdown Pages
Route::get('/vacancies/submitVacancies', [VacanciesController::class, 'submitVacancies']);
Route::post('/vacancies/submitVacancies', [VacanciesController::class, 'submitVacancies'])->name('submitVacancies');
Route::get('/vacancies/viewVacancies', [VacanciesController::class, 'viewVacancies']);

Route::get('/vacancy-details/{id}', [VacanciesController::class, 'vacancyDetails'])->name('vacancyDetails');
Route::get('/applyJob/{id}', [VacanciesController::class, 'applyJob'])->name('applyJob');
// Corrected route definition
Route::match(['get', 'post'], '/apply-job/{id}', [WebMetaDataController::class, 'addApplyJob'])->name('addApplyJob');

// Downloads Dropdown Pages
Route::get('/downloads/presentations', [DownloadsController::class, 'presentations']);


Route::get('/login', [LoginController::class, 'index']);
Route::get('/test', [MembersController::class, 'test']);
Route::get('/signup', [SignupController::class, 'index']);
Route::get('/forgetPassword', [ForgetPasswordController::class, 'index']);
Route::post('/forgetPassword', [WebAuthController::class, 'forgetPassword'])->name('forgetPassword');
Route::post('/signup', [WebAuthController::class, 'registerUser'])->name('registerUser');
Route::post('/addVacancyDetails', [WebMetaDataController::class, 'addVacancyDetails'])->name('addVacancyDetails');
Route::post('/login', [WebAuthController::class, 'userLogin'])->name('userLogin');
Route::post('/forgetPassword', [WebAuthController::class, 'forgetPassword'])->name('forgetPassword');
Route::post('/verifyOtp', [WebAuthController::class, 'verifyOtp'])->name('verifyOtp');
Route::post('/changeForgetPassword', [WebAuthController::class, 'changeForgetPassword'])->name('changeForgetPassword');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/dashboard', [ProfileController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::post('/dashboard', [WebAuthController::class, 'editProfile']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/event-details/{id}', [HomeController::class, 'eventDetails'])->name('eventDetails');
Route::get('/ticket/{id}', [HomeController::class, 'tickets'])->name('tickets');
Route::get('/batchAddmissionReceipt/{id}', [HomeController::class, 'batchAddmissionReceipt'])->name('batchAddmissionReceipt');
Route::post('/eventRegister', [HomeController::class, 'eventRegister'])->name('eventRegister')->middleware(['auth']);
Route::post('/checkOrderRazorpayPaymentStatus', [HomeController::class, 'checkOrderRazorpayPaymentStatus'])->name('checkOrderRazorpayPaymentStatus');
Route::post('/batchRegister', [StudentsController::class, 'batchRegister'])
    ->name('batchRegister')
    ->middleware(['auth', 'web']);

Route::post('/checkOrderRazorpayPaymentStatusforBatch', [StudentsController::class, 'checkOrderRazorpayPaymentStatusforBatch'])->name('checkOrderRazorpayPaymentStatusforBatch');
// ===========Profile Routes ====================
Route::get('/profile/dashboard', [ProfileController::class, 'dashboard']);
Route::get('/profile/digitalIdCard', [ProfileController::class, 'digitalIdCard']);
Route::get('/profile/editProfile', [ProfileController::class, 'editProfile']);
Route::post('/profile/editProfile', [WebAuthController::class, 'editProfile'])->name('editProfile');
// Define the GET route for the view
Route::get('/profile/changePassword', [ProfileController::class, 'changePassword'])->name('changePassword');

// Define the POST route for form submission
Route::post('/profile/changePassword', [WebAuthController::class, 'changePassword'])->name('changePassword');




// =============Rozerpay ==============
Route::get('/razorpay-payment', [RazorpayPaymentController::class, 'index']);
Route::post('/razorpay-payment', [RazorpayPaymentController::class, 'store'])->name('razorpay.payment.store');
Route::get('/razorpay-payment', [RazorpayPaymentController::class, 'batchindex']);
Route::post('/razorpay-payment', [RazorpayPaymentController::class, 'batchstore'])->name('razorpay.payment.store');
Route::get('qrcode/{eventName}', function ($eventName) {
    return QrCode::size(150)->generate($eventName);
});
Route::get('offerQrcode/{offers}', function ($offers) {
    return QrCode::size(150)->generate($offers);
});
