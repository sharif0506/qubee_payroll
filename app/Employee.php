<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model {

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
        'status'
    ];

}
