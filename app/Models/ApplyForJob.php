<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplyForJob extends Model
{
    use HasFactory;
    protected $table='apply_for_job';
    public function user_details(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function vacancy_details(){
        return $this->belongsTo(VacancyDetails::class,'vacancy_id');
    }
}
