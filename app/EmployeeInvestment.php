<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeInvestment extends Model
{
        protected $fillable = [
        'employee_id',
        'amount',
        'tax_rebate',
        'income_year'    
    ];
}
