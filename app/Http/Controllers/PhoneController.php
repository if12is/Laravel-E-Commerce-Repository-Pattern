<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhoneController extends Controller
{
    public function val(Request $request)
    {
         dd($request->all()) ;
    }
}
