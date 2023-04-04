<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::get();
        return view('section',compact('sections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'section_name'=>'required|unique:sections'
        ]);

        $section = Section::create(['section_name'=>$request->section_name]);
        if($section){
            return back()->with("success","Successfully Added!");
        }else{
            return back()->with("error","Opps Something Wrong!");
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit_section = Section::findOrFail($id);
        $sections = Section::get();
        return view('edit-section',compact('sections','edit_section'));
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
        $validated = $request->validate([
            'section_name'=>'required|unique:sections'
        ]);

        $section = Section::findOrFail($id);
        $section->section_name = $request->section_name;
        $section->update();

        return redirect()->route('section.index')->with("success","Successfully Updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $section = Section::findOrFail($request->id);
        $section->delete();
        return redirect()->route('section.index')->with("success","Data Succesfully Removed!");
    }
}
