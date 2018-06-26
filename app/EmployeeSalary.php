<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeSalary extends Model
{
    public function salary() {
        return $this->hasOne('App\Salary', 'id', 'salary_id');
    }
}
