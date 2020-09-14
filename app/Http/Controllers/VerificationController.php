<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function search(Request $request)
    {
        return view('verification');
    }

    public function save(Request $request)
    {
    }
}
