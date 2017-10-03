<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\model\membersmodel;

class HomeController extends Controller
{
	//For Retrieve data
    public function index()
    {
    	$member = membersmodel::all();
    	return view('home.index')->with('member',$member); 
    }

    //For Insert Data
    public function insertdata(Request $request)
    {
    	$member = new membersmodel();
    	$member->name = $request->name;
    	$member->age = $request->age;
    	$member->email = $request->email;
    	$member->address = $request->address;
    	$member->save();
    	return response()->json($member);
    }

    //For Update Data
    public function updatedata(Request $request)
    {
    	$member = membersmodel::find($request->id);
    	$member->name = $request->name;
    	$member->age = $request->age;
    	$member->email = $request->email;
    	$member->address = $request->address;
    	$member->save();
    	return response()->json($member);
    }

    //For Delete Data
    public function deletedata(Request $request)
    {
    	membersmodel::where('id',$request->id)->delete();
    	return response()->json();
    }
}
