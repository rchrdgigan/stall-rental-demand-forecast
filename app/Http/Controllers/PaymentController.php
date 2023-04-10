<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payment = Payment::get();
        return view('payment', compact('payment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create-payment');
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
            'tenant_id' => 'required',
            'amount' => 'required',
        ]);
        Payment::create([
            'tenant_id' => $request->tenant_id,
            'amount' => $request->amount,
        ]);
        return redirect()->route('payment.index')->with("success","Payment Successfully Added!");
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit_pay = Payment::findOrFail($id);
        return view('edit-payment', compact('edit_pay'));
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
            'tenant_id' => 'nullable',
            'amount' => 'required',
        ]);

        $payment = Payment::findOrFail($id);
        if(isset($request->tenant_id)){
            $payment->tenant_id = $request->tenant_id;
        }
        $payment->amount = $request->amount;
        $payment->update();

        return redirect()->route('payment.index')->with("success","Successfully Updated!");
    }

}
