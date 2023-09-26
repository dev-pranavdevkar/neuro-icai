<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V1\Admin\AuthController;
use App\Http\Controllers\V1\Admin\MetaDataController;

use App\Http\Controllers\V1\App\AppAuthController;
use App\Http\Controllers\V1\App\AppMetaDataController;
use App\Http\Controllers\V1\Admin\DashboardController;
use App\Http\Controllers\V1\Website\WebAuthController;
use App\Http\Controllers\V1\Website\WebMetaDataController;
use App\Http\Controllers\Auth;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'v1/admin', 'as' => 'v1/admin'], function () {
    Route::post('userLogin', [AuthController::class, 'userLogin']);
    Route::post('registerUser', [AuthController::class, 'registerUser']);


    Route::post('forgetPassword', [AuthController::class, 'forgetPassword']);
    Route::post('changeForgetPassword', [AuthController::class, 'changeForgetPassword']);

    Route::get('open', 'MetaDataController@open');

    Route::group(
        ['middleware' => ['jwt.verify']],
        function () {
            Route::post('user', [AuthController::class, 'getAuthenticatedUser']);
            Route::post('closed', [MetaDataController::class, 'closed']);


            //DashboardCount
            Route::get('getDashboardCount', [DashboardController::class, 'getDashboardCount']);

            //BannerDetails
            Route::post('addBanner', [MetaDataController::class, 'addBanner']);
            Route::get('getAllBanner', [MetaDataController::class, 'getAllBanner']);
            Route::delete('deleteBannerDetailsbyId', [MetaDataController::class, 'deleteBannerDetailsbyId']);
            Route::post('editBanner', [MetaDataController::class, 'editBanner']);
            Route::get('getBannerById', [MetaDataController::class, 'getBannerById']);

            //LocationDetails
            Route::post('addLocationDetails', [MetaDataController::class, 'addLocationDetails']);
            Route::get('getAllLocationDetails', [MetaDataController::class, 'getAllLocationDetails']);
            Route::delete('deleteLocationDetailsById', [MetaDataController::class, 'deleteLocationDetailsById']);
            Route::post('editLocationDetailsById', [MetaDataController::class, 'editLocationDetailsById']);
            Route::get('getLocationById', [MetaDataController::class, 'getLocationById']);

            //EventDetails
            Route::post('addEventDetails', [MetaDataController::class, 'addEventDetails']);
            Route::post('editEventDetailById', [MetaDataController::class, 'editEventDetailById']);
            Route::get('getEventDetailsById', [MetaDataController::class, 'getEventDetailsById']);
            Route::get('getAllEventDetails', [MetaDataController::class, 'getAllEventDetails']);
            Route::delete('deleteEventDetailsById', [MetaDataController::class, 'deleteEventDetailsById']);

            //AssociationDetails
            Route::post('addAssociationDetails', [MetaDataController::class, 'addAssociationDetails']);
            Route::post('editAssociationDetails', [MetaDataController::class, 'editAssociationDetails']);
            Route::get('getAssociationDetailsById', [MetaDataController::class, 'getAssociationDetailsById']);
            Route::get('getAllAssociationDetails', [MetaDataController::class, 'getAllAssociationDetails']);
            Route::delete('deleteAssociationDetails', [MetaDataController::class, 'deleteAssociationDetails']);

            //OffersToAssociation

            Route::post('addOffersToAssociation', [MetaDataController::class, 'addOffersToAssociation']);
            Route::post('editOffersAssociation', [MetaDataController::class, 'editOffersAssociation']);
            Route::get('getOffersToAssociationById', [MetaDataController::class, 'getOffersToAssociationById']);
            Route::get('getOffersToAssociation', [MetaDataController::class, 'getOffersToAssociation']);
            Route::delete('deleteOffersToAssociation', [MetaDataController::class, 'deleteOffersToAssociation']);

            //NewsLetterDetails
            Route::post('addNewsLetterForStudent', [MetaDataController::class, 'addNewsLetterForStudent']);
            Route::post('addNewsLetterForMembers', [MetaDataController::class, 'addNewsLetterForMembers']);
            Route::post('editNewsLetterForStudent', [MetaDataController::class, 'editNewsLetterForStudent']);
            Route::post('editNewsLetterForMembers', [MetaDataController::class, 'editNewsLetterForMembers']);
            Route::get('getNewsLetterDetailsById', [MetaDataController::class, 'getNewsLetterDetailsById']);
            Route::get('getAllNewLetterDetailsForStudent', [MetaDataController::class, 'getAllNewLetterDetailsForStudent']);
            Route::get('getAllNewLetterDetailsForMembers', [MetaDataController::class, 'getAllNewLetterDetailsForMembers']);
            Route::get('getAllNewsLetters', [MetaDataController::class, 'getAllNewsLetters']);

            Route::delete('deleteNewsLetterDetails', [MetaDataController::class, 'deleteNewsLetterDetails']);

            //VoluntaryContributionTable
            Route::post('addVoluntaryContribution', [MetaDataController::class, 'addVoluntaryContribution']);
            Route::post('editVoluntaryContribution', [MetaDataController::class, 'editVoluntaryContribution']);
            Route::get('getVoluntaryContributionById', [MetaDataController::class, 'getVoluntaryContributionById']);
            Route::get('getVoluntaryContribution', [MetaDataController::class, 'getVoluntaryContribution']);
            Route::delete('deleteVoluntaryContribution', [MetaDataController::class, 'deleteVoluntaryContribution']);

            //Payment Mode Details
            Route::post('addPaymentMode', [MetaDataController::class, 'addPaymentMode']);
            Route::post('editPaymentMode', [MetaDataController::class, 'editPaymentMode']);
            Route::get('getPaymentModeById', [MetaDataController::class, 'getPaymentModeById']);
            Route::get('getAllPaymentMode', [MetaDataController::class, 'getAllPaymentMode']);
            Route::delete('deletePaymentMode', [MetaDataController::class, 'deletePaymentMode']);

            //Vacancy Details
            Route::post('addVacancyDetails', [MetaDataController::class, 'addVacancyDetails']);
            Route::post('editVacancyDetails', [MetaDataController::class, 'editVacancyDetails']);
            Route::get('getVacancyDetailsById', [MetaDataController::class, 'getVacancyDetailsById']);
            Route::get('getAllVacancyDetails', [MetaDataController::class, 'getAllVacancyDetails']);
            Route::delete('deleteVacancyDetails', [MetaDataController::class, 'deleteVacancyDetails']);

            //Event Registration
            Route::post('addEventRegistration', [MetaDataController::class, 'addEventRegistration']);
            Route::post('editEventRegistration', [MetaDataController::class, 'editEventRegistration']);
            Route::get('getEventRegistrationById', [MetaDataController::class, 'getEventRegistrationById']);
            Route::get('getAllEventRegistration', [MetaDataController::class, 'getAllEventRegistration']);
            Route::delete('deleteEventRegistration', [MetaDataController::class, 'deleteEventRegistration']);

            //RegisterToAssociation
            Route::post('addRegisterToAssociation', [MetaDataController::class, 'addRegisterToAssociation']);
            Route::post('editRegisterToAssociation', [MetaDataController::class, 'editRegisterToAssociation']);
            Route::get('getRegisterToAssociationById', [MetaDataController::class, 'getRegisterToAssociationById']);
            Route::get('getRegisterToAssociationDetails', [MetaDataController::class, 'getRegisterToAssociationDetails']);
            Route::delete('deleteRegisterToAssociation', [MetaDataController::class, 'deleteRegisterToAssociation']);
            Route::get('getRegisterToAssociation', [MetaDataController::class, 'getRegisterToAssociation']);

            //ApplyForJob
            Route::post('addApplyJob', [MetaDataController::class, 'addApplyJob']);
            Route::post('editApplyJob', [MetaDataController::class, 'editApplyJob']);
            Route::get('getApplyJOb', [MetaDataController::class, 'getApplyJOb']);
            Route::get('getApplyJobById', [MetaDataController::class, 'getApplyJobById']);
            Route::delete('deleteApplyJob', [MetaDataController::class, 'deleteApplyJob']);
            Route::get('getRegisterUserToVacancy', [MetaDataController::class, 'getRegisterUserToVacancy']);

            //Student Notice Board
            Route::post('addStudentNoticeBoard', [MetaDataController::class, 'addStudentNoticeBoard']);
            Route::post('editStudentNoticeBoard', [MetaDataController::class, 'editStudentNoticeBoard']);
            Route::get('getStudentNoticeBoard', [MetaDataController::class, 'getStudentNoticeBoard']);
            Route::get('getStudentNoticeBoardById', [MetaDataController::class, 'getStudentNoticeBoardById']);
            Route::delete('deleteStudentNoticeBoard', [MetaDataController::class, 'deleteStudentNoticeBoard']);
        }

    );
});
Route::group(['prefix' => 'v1/app', 'as' => 'v1/app'], function () {
    Route::post('userLogin', [AppAuthController::class, 'userLogin']);
    Route::post('registerUser', [AppAuthController::class, 'registerUser']);
    Route::post('verifyOtp', [AppAuthController::class, 'verifyOtp']);

    Route::post('forgetPassword', [AppAuthController::class, 'forgetPassword']);
    Route::post('changeForgetPassword', [AppAuthController::class, 'changeForgetPassword']);

    Route::get('open', 'AppMetaDataController@open');

    Route::group(
        ['middleware' => ['jwt.verify']],
        function () {
            Route::post('user', [AppAuthController::class, 'getAuthenticatedUser']);
            Route::post('closed', [AppMetaDataController::class, 'closed']);





            //OffersToAssociation
            Route::get('getOffersToAssociationById', [AppMetaDataController::class, 'getOffersToAssociationById']);
            Route::get('getOffersToAssociation', [AppMetaDataController::class, 'getOffersToAssociation']);
            //RegisterToAssociation
            Route::post('addRegisterToAssociation', [AppMetaDataController::class, 'addRegisterToAssociation']);

            // EventDetails
            Route::get('getUpcomingEvent', [AppMetaDataController::class, 'getUpcomingEvent']);


            Route::get('getEventCount', [AppMetaDataController::class, 'getEventCount']);
            Route::get('getEventAndAssociation', [AppMetaDataController::class, 'getEventAndAssociation']);
            Route::get('getPastEvents', [AppMetaDataController::class, 'getPastEvents']);
            Route::get('getEventDetailsById', [AppMetaDataController::class, 'getEventDetailsById']);

            //EventRegistration
            Route::post('addEventRegistration', [AppMetaDataController::class, 'addEventRegistration']);


            //AssociationDetails
            Route::get('getAllAssociationDetails', [AppMetaDataController::class, 'getAllAssociationDetails']);
            Route::get('getAssociationDetailsById', [AppMetaDataController::class, 'getAssociationDetailsById']);
            Route::post('addAssociationDetails', [AppMetaDataController::class, 'addAssociationDetails']);


            //NewsLetters
            Route::get('getAllNewsLetters', [AppMetaDataController::class, 'getAllNewsLetters']);
            Route::get('getNewsLetterDetailsById', [AppMetaDataController::class, 'getNewsLetterDetailsById']);
            Route::get('getAllNewLetterDetailsForStudent', [AppMetaDataController::class, 'getAllNewLetterDetailsForStudent']);
            Route::get('getAllNewLetterDetailsForMembers', [AppMetaDataController::class, 'getAllNewLetterDetailsForMembers']);


            //VacancyDetails
            Route::get('getAllVacancyDetails', [AppMetaDataController::class, 'getAllVacancyDetails']);
            Route::get('getVacancyDetailsById', [AppMetaDataController::class, 'getVacancyDetailsById']);
            //ApplyForJob
            Route::post('addApplyJob', [AppMetaDataController::class, 'addApplyJob']);
            //Student Notice Board
            Route::get('getStudentNoticeBoard', [AppMetaDataController::class, 'getStudentNoticeBoard']);
            Route::get('getStudentNoticeBoardById', [AppMetaDataController::class, 'getStudentNoticeBoardById']);
        }

    );
});

//website

Route::group(['prefix' => 'v1/website', 'as' => 'v1/website'], function () {
    Route::post('registerUser', [WebAuthController::class, 'registerUser']);
    Route::post('userLogin', [WebAuthController::class, 'userLogin']);



    Route::post('forgetPassword', [WebAuthController::class, 'forgetPassword']);
    Route::post('changeForgetPassword', [WebAuthController::class, 'changeForgetPassword']);


    /*=======================Home Page get All API======================================================= */
    Route::get('getAllEventDetails', [WebAuthController::class, 'getAllEventDetails']);
    Route::get('getAllNewLetterDetailsForStudent', [WebAuthController::class, 'getAllNewLetterDetailsForStudent']);
    Route::get('getAllNewLetterDetailsForMembers', [WebAuthController::class, 'getAllNewLetterDetailsForMembers']);
    Route::get('getAllAssociationDetails', [WebAuthController::class, 'getAllAssociationDetails']);
    Route::get('getStudentNoticeBoard', [WebAuthController::class, 'getStudentNoticeBoard']);
    Route::get('getAllVacancyDetails', [WebAuthController::class, 'getAllVacancyDetails']);
    Route::get('getLatestUpdate', [WebMetaDataController::class, 'getLatestUpdate']);

    /*=================================================================================================== */

    Route::get('open', 'WebAuthController@open');

    Route::group(
        ['middleware' => ['jwt.verify']],
        function () {
            Route::post('user', [WebAuthController::class, 'getAuthenticatedUser']);
            Route::post('closed', [WebAuthController::class, 'closed']);
        }
    );
});
