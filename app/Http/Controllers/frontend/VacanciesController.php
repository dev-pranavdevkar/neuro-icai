<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\VacancyDetails;
use Illuminate\Http\Request;

class VacanciesController extends Controller
{
    public function submitVacancies()
    {
        return view('frontend.vacancies.submitVacancies');
    }

    public function viewVacancies()
    {
        $vacancyDetails = VacancyDetails::with([])->paginate(5);
        return view('frontend.vacancies.viewVacancies', compact('vacancyDetails'));
    }

    // public function vacancyDetails(Request $request, $id)
    // {
    //     $vacancyDetails = VacancyDetails::with([''])->find($id);
    //     return view('frontend.vacancies.applyJob', compact('vacancyDetails'));
    // }
}
