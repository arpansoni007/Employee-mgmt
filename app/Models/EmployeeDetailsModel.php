<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeDetailsModel extends Model
{

    /* ---------------------------------- Table --------------------------------- */

    protected $table = 'employee_details';

    /* --------------------------- ID as primary Key --------------------------- */

    protected $primaryKey = 'emp_id';
    
    /* -------------------------------- Fillable -------------------------------- */

    protected $fillable = [
        'emp_id','emp_name','emp_age','emp_mobile','emp_email_id','created_at','updated_at'
    ];

    /* ------------------------------ Relationship ------------------------------ */

    public function employeeOfficialDetails()
    {
        return $this->hasOne('App\Models\EmployeeOfficialDetailsModel','emp_id');
    }

}
