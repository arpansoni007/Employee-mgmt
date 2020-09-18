<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeOfficialDetailsModel extends Model
{
   
    /* ---------------------------------- Table --------------------------------- */

    protected $table = 'emp_official_details';

    /* --------------------------- ID as primary Key --------------------------- */

    protected $primaryKey = 'emp_id';
    
    /* -------------------------------- Fillable -------------------------------- */

    protected $fillable = [
        'emp_id','emp_salary','emp_department','emp_designation','created_at','updated_at'
    ];
  
    /* ------------------------------ Relationship ------------------------------ */

    public function employeeDetails()
    {
        return $this->belongsTo('App\Models\EmployeeDetailsModel','emp_id');
    }

    

}
