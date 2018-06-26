<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeMonthlyIncome extends Model
{
    public function salary() {
        return $this->hasOne('App\Salary', 'id', 'salary_id');
    }
}
