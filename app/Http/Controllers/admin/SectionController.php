<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pass=DB::table('sections')
            ->leftjoin('classes','sections.class_id_sec','classes.id')
            ->select('sections.*','classes.class_name')
            ->get();
        return view('admin.section.index_sec',compact('pass'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $pass=DB::table('classes')->get();
        return view('admin.section.create_sec',compact('pass'));
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
            'sec_name'=>'required',
        ]);

        $data=array(
            'class_id_sec'=>$request->class_id,
            'sec_name'=>$request->sec_name,
        );

        DB::table('sections')->insert($data);
        return redirect()->back()->with('success','Successfully Section Inserted');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dlt=DB::table('sections')->where('id',$id)->delete();
        return redirect()->back()->with('success','Successfully Section Deleted');
    }
}
