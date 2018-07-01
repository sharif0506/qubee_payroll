<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeYearlyTotalTax extends Model {

    protected $fillable = [
        'employee_id',
        'income_tax_amount',
        'income_tax_rebate',
        'final_tax_amount',
        'income_year'
    ];

}
