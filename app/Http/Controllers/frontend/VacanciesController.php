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
        $vacancyDetails = VacancyDetails::with([])->paginate(3);
        return view('frontend.vacancies.viewVacancies', compact('vacancyDetails'));
    }
  
}
