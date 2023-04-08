<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Phase;
use App\Models\Tenant;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tenants = Tenant::with('phase')->get();
        return view('tenant', compact('tenants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $phase = Phase::get();
        return view('create-tenant', compact('phase'));
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
            'lname' => 'required',
            'fname' => 'required',
            'mname' => 'required',
            'email' => 'required',
            'contact' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11|max:11',
            'stall_no' => 'required',
            'date_reg' => 'required',
        ]);

        Tenant::create([
            'lname' => $request->lname,
            'fname' => $request->fname,
            'mname' => $request->mname,
            'email' => $request->email,
            'contact' => $request->contact,
            'phase_id' => $request->stall_no,
            'date_reg' => $request->date_reg,
        ]);

        return redirect()->route('tenant.index')->with("success","Successfully Added!");
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
        $edit_tenant= Tenant::findOrFail($id);
        $phase = Phase::get();
        return view('edit-tenant',compact('phase','edit_tenant'));
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
            'lname' => 'required',
            'fname' => 'required',
            'mname' => 'required',
            'email' => 'required',
            'contact' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11|max:11',
            'stall_no' => 'required',
            'date_reg' => 'required',
        ]);

        $tenant = Tenant::findOrFail($id);
        $tenant->lname = $request->lname;
        $tenant->fname = $request->fname;
        $tenant->mname = $request->mname;
        $tenant->email = $request->email;
        $tenant->contact = $request->contact;
        $tenant->phase_id = $request->stall_no;
        $tenant->date_reg = $request->date_reg;
        $tenant->update();

        return redirect()->route('tenant.index')->with("success","Successfully Updated!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $tenant = Tenant::findOrFail($request->id);
        $tenant->delete();
        return redirect()->route('tenant.index')->with("success","Data Succesfully Removed!");
    }
}
