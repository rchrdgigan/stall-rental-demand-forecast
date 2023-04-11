<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Tenant,Payment,Phase};
use Carbon\Carbon;
use App\Charts\RentalChart;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $mon_now = Carbon::now()->format('Y-m');

        if(request('filter')){
            $current_yr = request('filter');
        }else{
            $current_yr = Carbon::parse(Now())->format('Y');
        }

        $current_yr_jan = Carbon::parse($current_yr.'-01')->format('Y-m');
        $current_yr_feb = Carbon::parse($current_yr.'-02')->format('Y-m');
        $current_yr_mar = Carbon::parse($current_yr.'-03')->format('Y-m');
        $current_yr_apr = Carbon::parse($current_yr.'-04')->format('Y-m');
        $current_yr_may = Carbon::parse($current_yr.'-05')->format('Y-m');
        $current_yr_jun = Carbon::parse($current_yr.'-06')->format('Y-m');
        $current_yr_jul = Carbon::parse($current_yr.'-07')->format('Y-m');
        $current_yr_aug = Carbon::parse($current_yr.'-08')->format('Y-m');
        $current_yr_sept = Carbon::parse($current_yr.'-09')->format('Y-m');
        $current_yr_oct = Carbon::parse($current_yr.'-10')->format('Y-m');
        $current_yr_nov = Carbon::parse($current_yr.'-11')->format('Y-m');
        $current_yr_dev = Carbon::parse($current_yr.'-12')->format('Y-m');

        $chart = new RentalChart;

        $occupied_jan = Tenant::whereHas('payment', function ($query) use ($current_yr_jan){
            $query->where('created_at', 'like', '%'.$current_yr_jan.'%');
        })->with(['payment' => function($query) use ($current_yr_jan){
            $query->where('created_at', 'like', '%'.$current_yr_jan.'%');
        }])->latest('id')->count();

        $occupied_feb = Tenant::whereHas('payment', function ($query) use ($current_yr_feb){
            $query->where('created_at', 'like', '%'.$current_yr_feb.'%');
        })->with(['payment' => function($query) use ($current_yr_feb){
            $query->where('created_at', 'like', '%'.$current_yr_feb.'%');
        }])->latest('id')->count();

        $occupied_mar = Tenant::whereHas('payment', function ($query) use ($current_yr_mar){
            $query->where('created_at', 'like', '%'.$current_yr_mar.'%');
        })->with(['payment' => function($query) use ($current_yr_mar){
            $query->where('created_at', 'like', '%'.$current_yr_mar.'%');
        }])->latest('id')->count();

        $occupied_apr = Tenant::whereHas('payment', function ($query) use ($current_yr_apr){
            $query->where('created_at', 'like', '%'.$current_yr_apr.'%');
        })->with(['payment' => function($query) use ($current_yr_apr){
            $query->where('created_at', 'like', '%'.$current_yr_apr.'%');
        }])->latest('id')->count();

        $occupied_may = Tenant::whereHas('payment', function ($query) use ($current_yr_may){
            $query->where('created_at', 'like', '%'.$current_yr_may.'%');
        })->with(['payment' => function($query) use ($current_yr_may){
            $query->where('created_at', 'like', '%'.$current_yr_may.'%');
        }])->latest('id')->count();

        $occupied_jun = Tenant::whereHas('payment', function ($query) use ($current_yr_jun){
            $query->where('created_at', 'like', '%'.$current_yr_jun.'%');
        })->with(['payment' => function($query) use ($current_yr_jun){
            $query->where('created_at', 'like', '%'.$current_yr_jun.'%');
        }])->latest('id')->count();

        $occupied_jul = Tenant::whereHas('payment', function ($query) use ($current_yr_jul){
            $query->where('created_at', 'like', '%'.$current_yr_jul.'%');
        })->with(['payment' => function($query) use ($current_yr_jul){
            $query->where('created_at', 'like', '%'.$current_yr_jul.'%');
        }])->latest('id')->count();

        $occupied_aug = Tenant::whereHas('payment', function ($query) use ($current_yr_aug){
            $query->where('created_at', 'like', '%'.$current_yr_aug.'%');
        })->with(['payment' => function($query) use ($current_yr_aug){
            $query->where('created_at', 'like', '%'.$current_yr_aug.'%');
        }])->latest('id')->count();

        $occupied_sept = Tenant::whereHas('payment', function ($query) use ($current_yr_sept){
            $query->where('created_at', 'like', '%'.$current_yr_sept.'%');
        })->with(['payment' => function($query) use ($current_yr_sept){
            $query->where('created_at', 'like', '%'.$current_yr_sept.'%');
        }])->latest('id')->count();

        $occupied_oct = Tenant::whereHas('payment', function ($query) use ($current_yr_oct){
            $query->where('created_at', 'like', '%'.$current_yr_oct.'%');
        })->with(['payment' => function($query) use ($current_yr_oct){
            $query->where('created_at', 'like', '%'.$current_yr_oct.'%');
        }])->latest('id')->count();
        
        $occupied_nov = Tenant::whereHas('payment', function ($query) use ($current_yr_nov){
            $query->where('created_at', 'like', '%'.$current_yr_nov.'%');
        })->with(['payment' => function($query) use ($current_yr_nov){
            $query->where('created_at', 'like', '%'.$current_yr_nov.'%');
        }])->latest('id')->count();

        $occupied_dev = Tenant::whereHas('payment', function ($query) use ($current_yr_dev){
            $query->where('created_at', 'like', '%'.$current_yr_dev.'%');
        })->with(['payment' => function($query) use ($current_yr_dev){
            $query->where('created_at', 'like', '%'.$current_yr_dev.'%');
        }])->latest('id')->count();

        
       
        $unoccupied_jan = Phase::where('status',false)->where('created_at','like', '%'.$current_yr_jan.'%')->count();
        $unoccupied_feb = Phase::where('status',false)->where('created_at','like', '%'.$current_yr_feb.'%')->count();
        $unoccupied_mar = Phase::where('status',false)->where('created_at','like', '%'.$current_yr_mar.'%')->count();
        $unoccupied_apr = Phase::where('status',false)->where('created_at','like', '%'.$current_yr_apr.'%')->count();
        $unoccupied_may = Phase::where('status',false)->where('created_at','like', '%'.$current_yr_may.'%')->count();
        $unoccupied_jun = Phase::where('status',false)->where('created_at','like', '%'.$current_yr_jun.'%')->count();
        $unoccupied_jul = Phase::where('status',false)->where('created_at','like', '%'.$current_yr_jul.'%')->count();
        $unoccupied_aug = Phase::where('status',false)->where('created_at','like', '%'.$current_yr_aug.'%')->count();
        $unoccupied_sept = Phase::where('status',false)->where('created_at','like', '%'.$current_yr_sept.'%')->count();
        $unoccupied_oct = Phase::where('status',false)->where('created_at','like', '%'.$current_yr_oct.'%')->count();
        $unoccupied_nov = Phase::where('status',false)->where('created_at','like', '%'.$current_yr_nov.'%')->count();
        $unoccupied_dev = Phase::where('status',false)->where('created_at','like', '%'.$current_yr_dev.'%')->count();


        $chart->dataset('Occupied', 'bar', [$occupied_jan, $occupied_feb, $occupied_mar, $occupied_apr, $occupied_may, $occupied_jun, $occupied_jul, $occupied_aug, $occupied_sept, $occupied_oct, $occupied_nov, $occupied_dev]);
        $chart->dataset('Unoccupied', 'line', [$unoccupied_jan, $unoccupied_feb, $unoccupied_mar, $unoccupied_apr, $unoccupied_may, $unoccupied_jun, $unoccupied_jul, $unoccupied_aug, $unoccupied_sept, $unoccupied_oct, $unoccupied_nov, $unoccupied_dev]);
        
        $chart->labels([
            "Jan",
            "Feb",
            "Mar",
            "Apr",
            "May",
            "Jun",
            "Jul",
            "Aug",
            "Sept",
            "Oct",
            "Nov",
            "Dec",
        ]);
        return view('home',[
            'chart' => $chart,
            'tenants' => Tenant::count(),

            'paid_this_mo' => Tenant::whereHas('payment', function ($query) use ($mon_now){
                $query->where('created_at', 'like', '%'.$mon_now.'%');
            })->with(['payment' => function($query) use ($mon_now){
                $query->where('created_at', 'like', '%'.$mon_now.'%');
            }])->latest('id')->count(),

            'stalls' => Phase::count(),
        ]);
    }
}
