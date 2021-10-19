<?php

namespace App;

use App\Courierweight;
use App\VehicleRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Franchise extends Model
{
    /*
    |--------------------------------------------------------------------------
    | Constant Properties
    |--------------------------------------------------------------------------
    | Entiry static constant properties.
    */

    /*
    |--------------------------------------------------------------------------
    | Override Properties
    |--------------------------------------------------------------------------
    | Component proerties like fillable, casts.
    */
    protected $fillable = ['name','cnic','phone','address','city','paid_amount','paid_by','subscription_days','transaction_id','transaction_slip'];
    protected $casts = ['created_at' => 'datetime', 'updated_at' => 'datetime'];

    /*
    |--------------------------------------------------------------------------
    | Get Attributes
    |--------------------------------------------------------------------------
    | User defined get property attributes.
    */


    /*
    |--------------------------------------------------------------------------
    | Business Logic
    |--------------------------------------------------------------------------
    | User defined entity methods.
    */


    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    | User defined entity relations.
    */
    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function drivers()
    {
        return $this->hasMany(Driver::class);
    }

    public function vrequests()
    {
        return $this->hasMany(VehicleRequest::class);
    }

}
