<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Phase;

class PhaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phase = Phase::with('section')->latest()->get();
        return view('phase', compact('phase'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $section = Section::get();
        return view('create-phase', compact('section'));
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
            'stall_no' => 'required',
            'cat_id' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        Phase::create([
            'stall_no' => $request->stall_no,
            'section_id' => $request->cat_id,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return redirect()->route('phase.index')->with("success","Successfully Added!");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit_phase = Phase::findOrFail($id);
        $section = Section::get();
        return view('edit-phase', compact('edit_phase','section'));
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
            'stall_no' => 'required',
            'cat_id' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        $phase = Phase::findOrFail($id);
        $phase->stall_no = $request->stall_no;
        $phase->section_id = $request->cat_id;
        $phase->description = $request->description;
        $phase->price = $request->price;
        $phase->update();

        return redirect()->route('phase.index')->with("success","Successfully Updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $phase = Phase::findOrFail($request->id);
        $phase->delete();
        return redirect()->route('phase.index')->with("success","Data Succesfully Removed!");
    }
}
