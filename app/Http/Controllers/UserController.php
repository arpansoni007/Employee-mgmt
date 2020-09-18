<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

     public $user;

     public function __construct(User $user)
     {
          $this->user = $user;
     }

     /* ----------------------------- List Users  ---------------------------- */

     public function index()
     {    
          $user_data = $this->user->where('id','!=',\Auth::user()->id)->paginate(5);
          return view('user.list-page',compact('user_data'));
     }


       /* ----------------------------- List Users  ---------------------------- */

     public function getDetails($id)
     {
          $user_data = $this->user->where('id',$id)->get();
          return view('user.details-page',compact('user_data'));
     }
     
}
