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
        return redirect('types')->with('success','Successfully added');
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
        return redirect('types')->with('success','Successfully added');
    }

    public function delete($id)
    {
        $type = categories::find($id);
        $type->delete();
        redirect('types')->with('success','Successfully Deleted');
    }

    public function indexCategories()
    {
        $categories = DB::table('categories')
        ->join('types','categories.types_id','=','types.id')
        ->select('categories.*','types.typename')
        ->get();
        return view('categories.main', ['categories' => $categories]);
    }

    public function createCategories()
    {
        $types = DB::table('types')->get();
        return view('categories.create',['types'=> $types]);
    }

    public function storeCategories(Request $request)
    {
        $categories = new categories;
        $categories->types_id = $request->type_id;
        $categories->categoryname = $request->name;
        $categories->save();
        return redirect('categories')->with('success','Successfully added');
    }

    public function editCategories($id)
    {
        $categories = categories::find($id);
        $typeFind = types::find($categories->types_id);
        $types = DB::table('types')->get();
        if (!$types) {
            dd('notfound');
        }
        return view('categories.edit',['categories'=>$categories, 'types'=>$types, 'typeFind'=>$typeFind ]);
    }

    public function updateCategories(Request $request, $id)
    {
        $categories = categories::find($id);
        $categories->types_id = $request->type_id;
        $categories->categoryname = $request->name;
        $categories->save();
        return redirect('categories')->with('success','Successfully added');
    }

    public function deleteCategories($id)
    {
        $categories = categories::find($id);
        $categories->delete();
        return redirect('categories')->with('success','Successfully Deleted');
    }
}
