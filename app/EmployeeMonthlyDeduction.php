<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeMonthlyDeduction extends Model {

    public function deductionInfo() {
        return $this->hasOne('App\Deduction', 'id', 'deduction_id');
    }

}
