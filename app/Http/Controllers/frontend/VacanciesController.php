<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Http\Controllers\Controller;
use App\Models\VacancyDetails;
use App\Models\Company;
use App\Models\LocationDetails;
use Illuminate\Http\Request;
use Auth;

class VacanciesController extends Controller
{
    public function submitVacancies(Request $request)
    {
        $successMessage = $request->session()->get('success_message');
        return view('frontend.vacancies.submitVacancies', ['successMessage' => $successMessage]);
    }


    public function viewVacancies()
    {
        $vacancyDetails = VacancyDetails::orderBy('created_at', 'desc')->paginate(5);
        return view('frontend.vacancies.viewVacancies', compact('vacancyDetails'));
    }


    public function vacancyDetails($id)
    {
        try {
            $locationDetails = LocationDetails::paginate(1);
            $companyDetails = Company::paginate(1);

            // Use findOrFail for cleaner exception handling
            $vacancyDetails = VacancyDetails::with(['location_details', 'companyDetails'])->findOrFail($id);

            return view('frontend.vacancies.vacancyDetails', compact('id', 'locationDetails', 'companyDetails', 'vacancyDetails'));
        } catch (ModelNotFoundException $e) {
            // Log the exception
            Log::error($e);

            // Return a response with an error code and message
            return view('frontend.vacancies.vacancyDetails', ['error' => 'Vacancy not found.']);
        } catch (\Exception $e) {
            // Log the exception
            Log::error($e);

            // Return a response with an error code and message
            return view('frontend.vacancies.vacancyDetails', ['error' => 'An unexpected error occurred: ' . $e->getMessage()]);
        }
    }






    public function applyJob($id)
    {
        try {
            $locationDetails = LocationDetails::paginate(1);
            $companyDetails = Company::paginate(1);

            $vacancyDetails = VacancyDetails::with(['location_details', 'companyDetails'])->findOrFail($id);

            return view('frontend.vacancies.applyJob', [
                'id' => $id,
                'locationDetails' => $locationDetails,
                'companyDetails' => $companyDetails,
                'vacancyDetails' => $vacancyDetails,
            ]);
        } catch (ModelNotFoundException $e) {
            Log::error($e);
            return view('frontend.vacancies.applyJob', ['error' => 'Vacancy not found.']);
        } catch (\Exception $e) {
            Log::error($e);
            return view('errors.default', ['error' => 'An unexpected error occurred.']);
        }
    }
}
