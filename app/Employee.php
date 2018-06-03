<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable {

    use Notifiable;
    
    public $remember_token=false;
    protected $guard = 'employees';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'email',
        'employee_id',
        'password',
        'company_code',
        'mobile_no',
        'status'
    ];

}
