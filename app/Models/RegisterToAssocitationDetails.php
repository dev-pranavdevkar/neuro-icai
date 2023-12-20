<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterToAssocitationDetails extends Model
{
    use HasFactory;
    protected $table='register_to_association';
    public function user_details(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function association_details(){
        return $this->belongsTo(AssociationDetails::class,'association_id');
    }
    public function created_by_user_details(){
        return $this->belongsTo(User::class,'created_by_user_id');
    }
    public function offers_association_details(){
        return $this->belongsTo(OffersAssociation::class,'offers_association_id');
    }
}
