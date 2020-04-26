<?php

namespace App\Http\Controllers;

use App\categories;
use Illuminate\Http\Request;
use App\products;
use App\types;
use DB;
class ProductController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('Products.main');
    }

    public function addBanking()
    {
        $type = types::firstWhere('typename','banking');
        $categories = DB::table('categories')->where('types_id','=',$type->id)->get();
        return view('Products.create',['value'=>$categories, 'type' => '3']);
    }

    public function addElectronic()
    {
        $type = types::firstWhere('typename','electronic');
        $categories = DB::table('categories')->where('types_id','=',$type->id)->get();
        return view('Products.create',['value'=>$categories, 'type' => '4']);
    }


    public function createBanking(Request $request)
    {
        $product = new products;
        $product->productNumber = $request->number;
        $product->serialNumber = $request->serial;
        $product->location = $request->location;
        $product->status = $request->status;
        $product->categories_id = $request->category;
        $product->save();
        return redirect()->route('BankingProducts')->with('success','Created Successfuly');
    }

    public function createElectronic(Request $request)
    {
        $product = new products;
        $product->productNumber = $request->number;
        $product->serialNumber = $request->serial;
        $product->location = $request->location;
        $product->status = $request->status;
        $product->categories_id = $request->category;
        $product->save();
        return redirect()->route('ElectronicProducts')->with('success','Created Successfuly');
    }

    public function dataBankingList(){
        $ProductsJoin = DB::table('products')
        ->join('categories','products.categories_id','=','categories.id')
        ->join('types','categories.types_id','=','types.id')
        ->select('products.*','types.typename','categories.Categoryname')
        ->where('types.typename','=','banking')
        ->get();

        $checkbox = DB::table('categories')
        ->join('types','categories.types_id','types.id')
        ->where('typename','banking')
        ->select('categories.*','types.typename')
        ->get();

        return view('Products.data',['products'=>$ProductsJoin, 'type' => '3', 'checkbox'=>$checkbox, 'isFiltered'=>false]);
    }

    public function dataElectronicList(){
        $ProductsJoin = DB::table('products')
        ->join('categories','products.categories_id','=','categories.id')
        ->join('types','categories.types_id','=','types.id')
        ->select('products.*','types.typename','categories.Categoryname')
        ->where('types.typename','=','electronic')
        ->get();

        $checkbox = DB::table('categories')
        ->join('types','categories.types_id','types.id')
        ->where('typename','electronic')
        ->select('categories.*','types.typename')
        ->get();

        return view('Products.data',['products'=>$ProductsJoin, 'type' => '4', 'checkbox'=>$checkbox, 'isFiltered'=>false]);
    }

    public function editBanking($id){
        $products = products::find($id);
        $categories = DB::table('categories')->where('types_id','=','3')->get();
        if (!$products) {
            dd('not found');
        }
        return view('Products.edit',['products'=>$products, 'value'=>$categories, 'type' => '3']);
    }

    public function updateBanking(Request $request, $id){
        $product = products::find($id);
        $product->productNumber = $request->number;
        $product->serialNumber = $request->serial;
        $product->location = $request->location;
        $product->status = $request->status;
        $product->categories_id = $request->category;
        $product->save();
        return redirect()->route('BankingProducts')->with('success','Updated Successfuly');
    }

    public function updateElectronic(Request $request, $id){
        $product = products::find($id);
        $product->productNumber = $request->number;
        $product->serialNumber = $request->serial;
        $product->location = $request->location;
        $product->status = $request->status;
        $product->categories_id = $request->category;
        $product->save();
        return redirect()->route('ElectronicProducts')->with('success','Updated Successfuly');
    }

    public function deleteBanking($id)
    {
        $product = products::find($id);
        $product->delete();
        return redirect()->route('BankingProducts')->with('success','Deleted Successfuly');
    }

    public function deleteElectronic($id)
    {
        $product = products::find($id);
        $product->delete();
        return redirect()->route('ElectronicProducts')->with('success','Deleted Successfuly');
    }

    public function filterDataBanking(Request $request)
    {
        $request->validate([
            'cat[]' => 'required',
        ]);

        $ProductsJoin = DB::table('products')
        ->join('categories','products.categories_id','=','categories.id')
        ->join('types','categories.types_id','=','types.id')
        ->select('products.*','types.typename','categories.Categoryname')
        ->whereIn('categories.id',$request->cat)
        ->get();

        $checkbox = DB::table('categories')
        ->join('types','categories.types_id','types.id')
        ->where('typename','banking')
        ->select('categories.*','types.typename')
        ->get();
        return view('Products.data',['products'=>$ProductsJoin, 'type' => '3', 'checkbox'=>$checkbox, 'isFiltered'=>$request->cat]);
        // $products = products::whereIn('categories_id',$request->cat)->get();
    }

    public function filterDataElectronic(Request $request)
    {
        $request->validate([
            'cat[]' => 'required',
        ]);

        $ProductsJoin = DB::table('products')
        ->join('categories','products.categories_id','=','categories.id')
        ->join('types','categories.types_id','=','types.id')
        ->select('products.*','types.typename','categories.Categoryname')
        ->whereIn('categories.id',$request->cat)
        ->get();

        $checkbox = DB::table('categories')
        ->join('types','categories.types_id','types.id')
        ->where('typename','electronic')
        ->select('categories.*','types.typename')
        ->get();
        return view('Products.data',['products'=>$ProductsJoin, 'type' => '4', 'checkbox'=>$checkbox, 'isFiltered'=>$request->cat]);
        // $products = products::whereIn('categories_id',$request->cat)->get();
    }

}
