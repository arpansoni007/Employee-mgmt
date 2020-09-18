<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\EmployeeDetailsModel;

class AdminController extends Controller
{
    public $user;
    public $employee;


    public function __construct(User $user, EmployeeDetailsModel $employee)
    {
        $this->user = $user;
        $this->employee = $employee;
    }

    /* ----------------------------- Block Employees  ---------------------------- */

    public function block($type = null, $id = null)
    {
     
        $user_query = $this->user;
        $employee_query = $this->employee;
        
        if (\Request::ajax()) {

            switch ($type) {
                case 'employee':
                    $res = $employee_query->where('emp_id',$id)->get()->toArray();
                    if($res != [])
                    {
                        $res = @$res[0]['status']  ==  0 ?  $employee_query->where('emp_id',$id)->update(['status' => 1]) : $employee_query->where('emp_id',$id)->update(['status' => 0]);
                    }
                    break;
                case 'user':
                    $res = $user_query->where('id',$id)->get()->toArray();
                    if($res != [])
                    {
                        $res = @$res[0]['status']  ==  0 ?  $user_query->where('id',$id)->update(['status' => 1]) : $user_query->where('id',$id)->update(['status' => 0]);
                    }
                    break;
            }
            return response()->json(['data' => $res]);
        }
        return back();
    }
}
