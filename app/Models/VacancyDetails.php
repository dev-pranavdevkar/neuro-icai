<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VacancyDetails extends Model
{
    use HasFactory;
    protected $table='vacancy_details';

    public function location_details(){
        return $this->belongsTo(LocationDetails::class,'location_id');
    }
         public function companyDetails(){
        return $this->belongsTo(Company::class,'company_id');
    }

    public function user_details(){
        return $this->belongsTo(User::class,'created_by_vacancy_user_id');
    }


}