<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeYearlyTax extends Model {

    public function salary() {
        return $this->hasOne('App\Salary', 'id', 'salary_id');
    }

}
