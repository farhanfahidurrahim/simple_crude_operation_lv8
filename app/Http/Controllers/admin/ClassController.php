<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cls= DB::table('classes')->get();
        return view("admin.class.all_class",['pass'=>$cls]);
    }

    public function store(Request $request)
    {   
        $request->validate([
            'class_name'=>'required|unique:classes'
        ]);

        $data=array(
            'class_name'=>$request->class_name,
        );

        DB::table('classes')->insert($data);
        return redirect()->back()->with('success','Successfully Inserted!');
    }

    public function delete($id)
    {
        DB::table('classes')->where('id',$id)->delete();
        return redirect()->back()->with('delete','Successfully Deleted!');
    }

    public function edit($id)
    {
        $data=DB::table('classes')->where('id',$id)->first();
        return view('admin.class.edit',['pass'=>$data]);
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'class_name'=>'required',
        ]);

        $data=array(
            'class_name'=>$request->class_name,
        );

        DB::table('classes')->where('id',$id)->update($data);
        return redirect()->back()->with('success','Successfully Update');
    }





















}
