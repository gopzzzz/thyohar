<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index(){
        return view('web.index');
    }
    public function planners(){
        return view('web.planners');
    }
    public function plannerdetails(){
         return view('web.plannerdetails');
    }
    public function bookpackage(){
         return view('web.bookpackage');
    }
    public function booknow(){
         return view('web.bookingsucess');
    }
    public function userlogin(){
         return view('web.userlogin');
    }
     public function userregistration(){
         return view('web.register');
    }
    public function forgetpassword(){
         return view('web.forget');
    }
}
