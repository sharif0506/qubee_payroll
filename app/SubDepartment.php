<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubDepartment extends Model {

    public function getDepartmentName() {
        $department = Department::findOrFail($this->department_id);
        return $department->name;
    }

}
