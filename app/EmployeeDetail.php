<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeDetail extends Model {

    public function department() {
        return $this->hasOne('App\Department', 'id', 'department_id');
    }

}
