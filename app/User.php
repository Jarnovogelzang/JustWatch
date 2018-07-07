<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'stringName', 
        'stringEmail', 
        'stringPassword',
        'stringCountry',
        'stringZipCode',
        'intHouseNumber',
        'dateBirthDate',
        'stringTelephoneNumber',
        'dateDeletedAt',
        'dateCreatedAt',
        'dateUpdatedAt'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'stringPassword', 
        'stringRememberToken',
    ];

    protected $dates = [
        'dateDeletedAt',
        'dateCreatedAt',
        'dateUpdatedAt'
    ];
}
