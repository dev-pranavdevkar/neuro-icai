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
    public function parent_event()
{
    return $this->belongsTo(EventDetails::class, 'parent_event_id');
}

public function child_events()
{
    return $this->hasMany(EventDetails::class, 'parent_event_id');
}
}
