<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingMastersController extends Controller
{
    public function index()
    {
        $bookingmasters = DB::table('bookingmasters')
            ->orderBy('id', 'asc')
            ->get();

        return view('bookingmasters', compact('bookingmasters'));
    }
}