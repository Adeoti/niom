<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //

    public function index()
    {
        $membership = Auth::user()->membership;
        return view('back.dashboard', compact('membership'));
    }
}
