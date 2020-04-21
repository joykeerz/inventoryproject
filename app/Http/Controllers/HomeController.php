<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\products;
use App\spareparts;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $TotalProducts = DB::table('products')->get()->count();
        $TotalSpareparts = DB::table('spareparts')->get()->count();
        return view('admin.index',['TotalProducts'=>$TotalProducts, 'TotalSpareparts'=>$TotalSpareparts]);
    }
}
