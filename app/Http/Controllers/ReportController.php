<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('report');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function daily()
    {
        if(request('month_of')){
            $searchString = request('month_of');

            $tenants = Tenant::whereHas('payment', function ($query) use ($searchString){
                $query->where('created_at', 'like', '%'.$searchString.'%');
            })
            ->with(['payment' => function($query) use ($searchString){
                $query->where('created_at', 'like', '%'.$searchString.'%');
            }])->latest('id')->get();
        }else{
            $tenants = Tenant::get();
        }
        return view('daily-report',compact('tenants'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function balance()
    {
        $tenants = Tenant::get();
        return view('balance-report',compact('tenants'));
    }

    public function dailyPrint()
    {
        if(request('month_of')){
            $searchString = request('month_of');

            $tenants = Tenant::whereHas('payment', function ($query) use ($searchString){
                $query->where('created_at', 'like', '%'.$searchString.'%');
            })
            ->with(['payment' => function($query) use ($searchString){
                $query->where('created_at', 'like', '%'.$searchString.'%');
            }])->latest('id')->get();
        }else{
            $tenants = Tenant::get();
        }
        return view('print-daily-report',compact('tenants'));
    }

    public function balancePrint()
    {
        $tenants = Tenant::get();
        return view('print-balance-report',compact('tenants'));
    }
   
}
