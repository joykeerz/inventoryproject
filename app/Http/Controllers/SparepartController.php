<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SparepartController extends Controller
{
    //
    public function index()
    {
        return view('Spareparts.main');
    }
}
