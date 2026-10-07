<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class WebController extends Controller
{
    public function index(){
        $category=DB::table('categories')->get();
        return view('web.index',compact('category'));
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

