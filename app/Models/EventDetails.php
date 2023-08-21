<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventDetails extends Model
{
    use HasFactory;
    protected $table='event_details';
    
    public function location_details(){
        return $this->belongsTo(LocationDetails::class,'location_id');
    }
}
