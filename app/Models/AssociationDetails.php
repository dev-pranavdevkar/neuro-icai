<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssociationDetails extends Model
{
    use HasFactory;
    protected $table='association_details';

    public function location_details(){
        return $this->belongsTo(LocationDetails::class,'location_id');
    }

    public function offers_of_association(){
        return $this->hasMany(OffersAssociation::class,'association_id');
    }
}
