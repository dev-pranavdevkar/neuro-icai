<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventRegistration extends Model
{
    use HasFactory;
    protected $table='event_registration';
    public function event_details(){
        return $this->belongsTo(EventDetails::class,'event_id');
    }
    public function user_details(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function paymentmode_details(){
        return $this->belongsTo(PaymentMode::class,'payment_mode_id');
    }
    public function voluntary_contribution_details(){
        return $this->belongsTo(VoluntaryContribution::class,'voluntary_contribution_id');
    }
    public function batches(){
        return $this->belongsTo(StudentBatches::class,'student_batche_id');
    }
}
