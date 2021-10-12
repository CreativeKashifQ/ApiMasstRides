<?php

namespace App;

use App\Role;
use App\Customer;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    use Notifiable;
    use HasApiTokens;

    /*
    |--------------------------------------------------------------------------
    | Override Properties
    |--------------------------------------------------------------------------
    | Component proerties like fillable, casts.
    */

    protected $casts = ['created_at' => 'datetime', 'updated_at' => 'datetime','email_verified_at' => 'datetime'];
    protected $hidden = ['password', 'remember_token'];
    protected $fillable = ['name', 'email', 'password'];

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

    public function getroleTextAttribute()
    {

        switch ($this->role) {
            case 'MASST!@#$%RIDES':
                return 'Franchiser';
                break;
            case 'MASST@098RIDES':
                return 'Admin';
                break;
            case 'MASST@CUSTOMER':
                return 'Customer';
                break;
            case 'MASST@DRIVER':
                return 'Driver';
                break;
            default:
                return 'NA';
                break;
        }
    }

    public function setFranchiserRole()
    {
        $this->role = 'MASST!@#$%RIDES';
    }

    public function isFranchisee()
    {
        return $this->role == 'MASST!@#$%RIDES';
    }

    public function setCustomerRole()
    {
        $this->role = 'MASST@CUSTOMER';
    }

    public function isCustomer()
    {
        return $this->role = 'MASST@CUSTOMER';
    }

    public function setDriverRole()
    {
        $this->role = 'MASST@DRIVER';
    }

    public function isDriver()
    {
        return $this->role = 'MASST@DRIVER';
    }

    public function isAdmin()
    {
        return $this->role == 'MASST@098RIDES';
    }




    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    | User defined entity relations.
    */
    public function franchise()
    {
        return $this->belongsTo(Franchise::class);
    }

    public function customer()
    {
        return $this->hasOne(Customer::class);
    }






}
