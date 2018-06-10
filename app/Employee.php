<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable {

    use Notifiable;

    public $remember_token = false;
    protected $guard = 'employees';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
//    protected $fillable = [
//        'user_id',
//        'email',
//        'employee_id',
//        'password',
//        'company_code',
//        'mobile_no',
//        'status'
//    ];

    public function salaries() {
        $employee_id = $this->employee_id;
        $salaries = Salary::where('employee_id', $employee_id)->get();
        return $salaries;
    }

    public function details() {
        $employee_id = $this->employee_id;
        $employee_details = EmployeeDetail::where('employee_id', $employee_id)->first();
        return $employee_details;
    }

    public function departmentName($department_id) {
        $department = Department::findOrFail($department_id);
        return $department->name;
    }

}
