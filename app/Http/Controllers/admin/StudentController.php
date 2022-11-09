<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$pass=DB::table('students')->orderBy('roll','ASC')->get();
        $pass=DB::table('students')
            ->leftJoin('classes','students.class_id','classes.id')
            ->select('students.*','classes.class_name')
            ->get();
        return view('admin.students.index',compact('pass'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $cls=DB::table('classes')->get();
        return view('admin.students.create',compact('cls'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'class_id'=>'required',
            'name'=>'required',
            'roll'=>'required',
            'phone'=>'required',
            'email'=>'required',
        ]);

        $data=array(
            'class_id'=>$request->class_id,
            'name'=>$request->name,
            'roll'=>$request->roll,
            'phone'=>$request->phone,
            'email'=>$request->email,
        );

        DB::table('students')->insert($data);
        return redirect()->back()->with('success','Successfully Inserted!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pass=DB::table('students')->where('id',$id)->first();
        return view('admin.students.view',compact('pass'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $cls=DB::table('classes')->get();
        $std=DB::table('students')->where('id',$id)->first();
        return view('admin.students.edit',compact('cls','std'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'class_id'=>'required',
            'name'=>'required',
            'roll'=>'required',
            'phone'=>'required',
            'email'=>'required',
        ]);

        $data=array(
            'class_id'=>$request->class_id,
            'name'=>$request->name,
            'roll'=>$request->roll,
            'phone'=>$request->phone,
            'email'=>$request->email,
        );

        DB::table('students')->where('id',$id)->update($data);
        return redirect()->back()->with('success','Successfully Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('students')->where('id',$id)->delete();
        return redirect()->back()->with('delete','Successfully Deleted!');
    }
}
