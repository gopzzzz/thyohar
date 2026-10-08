<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendors;
use App\Mail\VendorVerificationMail;
use Illuminate\Support\Facades\Mail;
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
    public function partnerwithus(Request $request){
                   $request->validate([
                    'name'  => 'required|string|max:100',
                    'phone' => 'required|string|max:20',
                    'email' => 'nullable|email|max:150',
                    // 'category' => 'required|string|max:150',
                    'message' => 'nullable|string|max:1000',
                    ]);

               Vendors::create([
               'vendor_name'  => $request->name,
               'phone_number' => $request->phone,
               'mail_id'      => $request->email,
               // 'category' => $request->category,
               'bio'          => $request->message,
               ]);

    if ($vendor->mail_id) {
    Mail::to($vendor->mail_id)
        ->send(new VendorVerificationMail($vendor));
}

        return response()->json([
        'success' => true,
        'message' => 'Vendor enquiry submitted successfully!'
    ]);
    

    }
}

