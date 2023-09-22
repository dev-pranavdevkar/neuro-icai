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

// About Us Dropdown Pages
Route::get('/aboutPuneBranch',[AboutController::class, 'aboutPuneBranch']);
Route::get('/annualReports',[AboutController::class, 'annualReports']);
Route::get('/chairmanCommunique',[AboutController::class, 'chairmanCommunique']);
Route::get('/managingCommittee',[AboutController::class, 'managingCommittee']);
Route::get('/pastChairmen',[AboutController::class, 'pastChairmen']);
Route::get('/studyCirclesPune',[AboutController::class, 'studyCirclesPune']);
Route::get('/subCommittees',[AboutController::class, 'subCommittees']);
Route::get('/successStories',[AboutController::class, 'successStories']);
Route::get('/torchBearer',[AboutController::class, 'torchBearer']);
Route::get('/updates',[AboutController::class, 'updates']);
Route::get('/updates/updatesDetails',[AboutController::class, 'updatesDetails']);


// Members Dropdown Pages
Route::get('/exposureDrafts',[MembersController::class, 'exposureDrafts']);
Route::get('/managingCommitteeMinutes',[MembersController::class, 'managingCommitteeMinutes']);
Route::get('/puneMembersNewsletter',[MembersController::class, 'puneMembersNewsletter']);
Route::get('/updatesForMembers',[MembersController::class, 'updatesForMembers']);


// Students Dropdown Pages
Route::get('/aboutPuneWICASA',[StudentsController::class, 'aboutPuneWICASA']);
Route::get('/coachingClasses',[StudentsController::class, 'coachingClasses']);
Route::get('/puneWICASANewsletter',[StudentsController::class, 'puneWICASANewsletter']);
Route::get('/studentsNoticeboard',[StudentsController::class, 'studentsNoticeboard']);
Route::get('/subscribeForSMSAlerts',[StudentsController::class, 'subscribeForSMSAlerts']);
Route::get('/WICASAManagingCommittee',[StudentsController::class, 'WICASAManagingCommittee']);


// Events Dropdown Pages
Route::get('/pastEvents',[EventsController::class, 'pastEvents']);
Route::get('/upcommingEvents',[EventsController::class, 'upcommingEvents']);

// Vacancies Dropdown Pages
Route::get('/submitVacancies',[VacanciesController::class, 'submitVacancies']);
Route::get('/viewVacancies',[VacanciesController::class, 'viewVacancies']);

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




