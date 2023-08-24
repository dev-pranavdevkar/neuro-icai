<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VacanciesController extends Controller
{
    public function submitVacancies()
    {
        return view('frontend.vacancies.submitVacancies');
    }
    
    public function viewVacancies()
    {
        return view('frontend.vacancies.viewVacancies');
    }
}
