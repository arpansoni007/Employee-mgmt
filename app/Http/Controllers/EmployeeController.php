<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\EmployeeDetailsModel;
use App\Models\EmployeeOfficialDetailsModel;

class EmployeeController extends Controller
{


    public $user;
    public $employee;


    public function __construct(User $user, EmployeeDetailsModel $employee)
    {
        $this->user = $user;
        $this->employee = $employee;
    }

    /* ----------------------------- List Employees  ---------------------------- */

    public function index()
    {
        $employee_data = $this->employee->with(['employeeOfficialDetails'])->paginate(5);
        return view('employee.list-page',compact('employee_data'));
    }

    /* ----------------------------- Search View  ---------------------------- */

    public function search()
    {
        return view('employee.search-page');
    }



    /* ----------------------------- Search Filter  ---------------------------- */

    public function searchFilter($query_param = null , $type = null)
    {   
        $role = \Auth::user()->role_id == 1 ? 'admin' : 'user';
       
        $res = [];
        $user_query = $this->user->where('id','!=',\Auth::user()->id);
       
        $employee_query = $role == 'admin' ? $this->employee : $this->employee->where('status','!=',0);
        if (\Request::ajax()) {

            switch ($role) {
                case 'user':
                    $res['employee'] = $employee_query->where(function ($query) use ($query_param) {
                        $query->where('emp_name', 'LIKE', '%' . $query_param . '%')
                            ->orWhere('emp_email_id', 'LIKE', '%' . $query_param . '%')
                            ->orWhere('emp_mobile', 'LIKE', '%' . $query_param . '%');
                    })->with(['employeeOfficialDetails'])->get()->toArray();
                    break;
                case 'admin':
                    if($type == 0)
                    {  
                        $res['user'] = $user_query->where(function ($query) use ($query_param) {
                            $query->where('name', 'LIKE', '%' . $query_param . '%')
                                ->orWhere('mobile', 'LIKE', '%' . $query_param . '%')
                                ->orWhere('email', 'LIKE', '%' . $query_param . '%');
                        })->get()->toArray();
                        
                        break;
                    }else
                    {
                        $res['employee'] = $employee_query->where(function ($query) use ($query_param) {
                            $query->where('emp_name', 'LIKE', '%' . $query_param . '%')
                                ->orWhere('emp_email_id', 'LIKE', '%' . $query_param . '%')
                                ->orWhere('emp_mobile', 'LIKE', '%' . $query_param . '%');
                        })->with(['employeeOfficialDetails'])->get()->toArray();
                        break;
                    }
                   
            }
           
            return $res;
        }
    }

    /* ----------------------------- List Employees  ---------------------------- */

    public function getDetails($id = null)
    {   
        $employee_data = $this->employee->where('emp_id',$id)->with(['employeeOfficialDetails'])->get()->toArray();
        
        return view('employee.details-page',compact('employee_data'));
    }
}
