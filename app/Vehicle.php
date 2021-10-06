<?php

namespace App;


use DB;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $guarded = [];


    //Vehicle One to one relationship with VehicleExpense
    public function vehicleexpense()
    {
    	return $this->hasMany(Vehicleexpense::class);
    }
    public function make()
    {
        return $this->belongsTo(VehicleMake::class,'makeid','id');
    }
    public function name()
    {
        return $this->belongsTo(VehicleName::class,'nameid','id');
    }
    public function model()
    {
        return $this->belongsTo(VehicleModel::class,'modelid','id');
    }
    public function engine()
    {
        return $this->belongsTo(VehicleEngine::class,'engineid','id');
    }

    public function type()
    {
        return $this->belongsTo(VehicleType::class,'typeid','id');
    }

    public function color()
    {
        return $this->belongsTo(VehicleColor::class,'colorid','id');
    }

    public function transmission()
    {
        return $this->belongsTo(VehicleTransmission::class,'transmissionid','id');
    }

    public function fuletype()
    {
        return $this->belongsTo(VehicleFuletype::class,'fuletypeid','id');
    }
    public function registerfor()
    {
        return $this->belongsTo(VehicleRegisterfor::class,'registerforid','id');
    }
    public function franchise()
    {
        return $this->belongsTo(Franchise::class,'franchiseid','id');
    }

    public function vowner()
    {
        return $this->hasOne(VOwner::class);
    }


}
