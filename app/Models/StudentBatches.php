<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentBatches extends Model
{
    use HasFactory;
    protected $table='student_batches';

    public function location_details(){
        return $this->belongsTo(LocationDetails::class,'location_id');
    }
}