<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OffersAssociation extends Model
{
    use HasFactory;
    protected $table='offers_association';
    public function association_details(){
        return $this->belongsTo(AssociationDetails::class,'association_id');
    }
}
