<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\categories;
use App\types;
class SubdataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $types = DB::table('types')->get();
        return view('types.main', ['types' => $types]);
    }

    public function create()
    {
        return view('types.create');
    }

    public function store(Request $request)
    {
        $type = new types;
        $type->typename = $request->name;
        $type->save();
        return redirect('Types')->with('success','Successfully added');
    }

    public function edit($id)
    {
        $type = types::find($id);
        if (!$type) {
            dd('notfound');
        }
        return view('types.edit',['type'=>$type]);
    }

    public function update(Request $request, $id)
    {
        $type = types::find($id);
        $type->typename = $request->name;
        $type->save();
        return redirect('Types')->with('success','Successfully added');
    }

    public function delete($id)
    {
        $type = types::find($id);
        $type->delete();
        redirect('Types')->with('success','Successfully Deleted');
    }
}
