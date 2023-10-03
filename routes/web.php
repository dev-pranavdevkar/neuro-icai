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

Route::get('/', function () {
    $webAuthController = new WebAuthController();
    $eventDetails = $webAuthController->getAllEventDetails(request());
    return app()->call([HomeController::class, 'index'], compact('eventDetails'));
});
Route::get('/contact',[HomeController::class, 'contact']);
Route::get('/help',[HomeController::class, 'help']);
Route::get('/tenders',[HomeController::class, 'tenders']);
Route::get('/usefulLinks',[HomeController::class, 'usefulLinks']);
Route::get('/atSalesCounter',[HomeController::class, 'atSalesCounter']);
Route::get('/termsOfUse',[HomeController::class, 'termsOfUse']);
Route::get('/privacyPolicy',[HomeController::class, 'privacyPolicy']);
Route::get('/termsAndConditions',[HomeController::class, 'termsAndConditions']);

// About Us Dropdown Pages
Route::get('/about/aboutPuneBranch',[AboutController::class, 'aboutPuneBranch']);
Route::get('/about/annualReports',[AboutController::class, 'annualReports']);
Route::get('/about/chairmanCommunique',[AboutController::class, 'chairmanCommunique']);
Route::get('/about/managingCommittee',[AboutController::class, 'managingCommittee']);
Route::get('/about/pastChairmen',[AboutController::class, 'pastChairmen']);
Route::get('/about/studyCirclesPune',[AboutController::class, 'studyCirclesPune']);
Route::get('/about/subCommittees',[AboutController::class, 'subCommittees']);
Route::get('/about/successStories',[AboutController::class, 'successStories']);
Route::get('/about/torchBearer',[AboutController::class, 'torchBearer']);
Route::get('/about/updates',[AboutController::class, 'updates']);
Route::get('/about/updates/updatesDetails',[AboutController::class, 'updatesDetails']);


// Members Dropdown Pages
Route::get('/members/exposureDrafts',[MembersController::class, 'exposureDrafts']);
Route::get('/members/managingCommitteeMinutes',[MembersController::class, 'managingCommitteeMinutes']);
Route::get('/members/puneMembersNewsletter',[MembersController::class, 'puneMembersNewsletter']);
Route::get('/members/updatesForMembers',[MembersController::class, 'updatesForMembers']);
Route::get('/members/updatesForMembers/updatesDetails',[MembersController::class, 'updatesForMembers']);
Route::get('/members/subscribeForSMSAlerts',[MembersController::class, 'subscribeForSMSAlerts']);
Route::get('/members/membersFAQ',[MembersController::class, 'membersFAQ']);
Route::get('/members/CPEStudyCircles',[MembersController::class, 'CPEStudyCircles']);
Route::get('/members/MCMinutes',[MembersController::class, 'MCMinutes']);


// Students Dropdown Pages
Route::get('/students/aboutPuneWICASA',[StudentsController::class, 'aboutPuneWICASA']);
Route::get('/students/coachingClasses',[StudentsController::class, 'coachingClasses']);
Route::get('/students/puneWICASANewsletter',[StudentsController::class, 'puneWICASANewsletter']);
Route::get('/students/studentsNoticeboard',[StudentsController::class, 'studentsNoticeboard']);
Route::get('/students/subscribeForSMSAlerts',[StudentsController::class, 'subscribeForSMSAlerts']);
Route::get('/students/WICASAManagingCommittee',[StudentsController::class, 'WICASAManagingCommittee']);
Route::get('/students/ICITSS',[StudentsController::class, 'ICITSS']);
Route::get('/students/AICITSS',[StudentsController::class, 'AICITSS']);
Route::get('/students/ICITSSOrientationCourse',[StudentsController::class, 'ICITSSOrientationCourse']);
Route::get('/students/advancedICITSSMCSCourse',[StudentsController::class, 'advancedICITSSMCSCourse']);
Route::get('/students/libraryReadingRooms',[StudentsController::class, 'libraryReadingRooms']);
Route::get('/students/studentNoticeboard',[StudentsController::class, 'studentNoticeboard']);
Route::get('/students/studentFAQs',[StudentsController::class, 'studentFAQs']);


// Events Dropdown Pages
Route::get('/events/pastEvents',[EventsController::class, 'pastEvents']);
Route::get('/events/upcommingEvents',[EventsController::class, 'upcommingEvents']);

// Vacancies Dropdown Pages
Route::get('/vacancies/submitVacancies',[VacanciesController::class, 'submitVacancies']);
Route::get('/vacancies/viewVacancies',[VacanciesController::class, 'viewVacancies']);

// Downloads Dropdown Pages
Route::get('/downloadsdownloads',[DownloadsController::class, 'downloads']);























Route::get('/login',[LoginController::class, 'index']);
Route::get('/signup',[SignupController::class, 'index']);
Route::get('/forgetPassword',[ForgetPasswordController::class, 'index']);
Route::post('/signup', [WebAuthController::class, 'registerUser'])->name('registerUser');
Route::post('/login', [WebAuthController::class, 'userLogin'])->name('userLogin');
Route::post('/forgetPassword', [WebAuthController::class, 'forgetPassword'])->name('forgetPassword');
Route::post('/verifyOtp', [WebAuthController::class, 'verifyOtp'])->name('verifyOtp');
Route::post('/changeForgetPassword', [WebAuthController::class, 'changeForgetPassword'])->name('changeForgetPassword');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('dashboard',[WebAuthController::class,'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');





