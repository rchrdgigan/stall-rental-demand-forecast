<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Tenant,Payment,Phase,Section};
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
        $status = true;
        $occupied_jan = Tenant::where('date_until', 'like', '%'.$current_yr_jan.'%')->orWhere('date_reg', 'like', '%'.$current_yr_jan.'%')->whereHas('phase', function ($query) use ($status){
            $query->where('status', true);
        })->with(['phase' => function($query) use ($status){
            $query->where('status', true);
        }])->latest('id')->count();

        $occupied_feb = Tenant::where('date_until', 'like', '%'.$current_yr_feb.'%')->orWhere('date_reg', 'like', '%'.$current_yr_feb.'%')->whereHas('phase', function ($query) use ($status){
            $query->where('status', true);
        })->with(['phase' => function($query) use ($status){
            $query->where('status', true);
        }])->latest('id')->count();

        $occupied_mar = Tenant::where('date_until', 'like', '%'.$current_yr_mar.'%')->orWhere('date_reg', 'like', '%'.$current_yr_mar.'%')->whereHas('phase', function ($query) use ($status){
            $query->where('status', true);
        })->with(['phase' => function($query) use ($status){
            $query->where('status', true);
        }])->latest('id')->count();

        $occupied_apr = Tenant::where('date_until', 'like', '%'.$current_yr_apr.'%')->orWhere('date_reg', 'like', '%'.$current_yr_apr.'%')->whereHas('phase', function ($query) use ($status){
            $query->where('status', true);
        })->with(['phase' => function($query) use ($status){
            $query->where('status', true);
        }])->latest('id')->count();

        $occupied_may = Tenant::where('date_until', 'like', '%'.$current_yr_may.'%')->orWhere('date_reg', 'like', '%'.$current_yr_may.'%')->whereHas('phase', function ($query) use ($status){
            $query->where('status', true);
        })->with(['phase' => function($query) use ($status){
            $query->where('status', true);
        }])->latest('id')->count();

        $occupied_jun = Tenant::where('date_until', 'like', '%'.$current_yr_jun.'%')->orWhere('date_reg', 'like', '%'.$current_yr_jun.'%')->whereHas('phase', function ($query) use ($status){
            $query->where('status', true);
        })->with(['phase' => function($query) use ($status){
            $query->where('status', true);
        }])->latest('id')->count();

        $occupied_jul = Tenant::where('date_until', 'like', '%'.$current_yr_jul.'%')->orWhere('date_reg', 'like', '%'.$current_yr_jul.'%')->whereHas('phase', function ($query) use ($status){
            $query->where('status', true);
        })->with(['phase' => function($query) use ($status){
            $query->where('status', true);
        }])->latest('id')->count();

        $occupied_aug = Tenant::where('date_until', 'like', '%'.$current_yr_aug.'%')->orWhere('date_reg', 'like', '%'.$current_yr_aug.'%')->whereHas('phase', function ($query) use ($status){
            $query->where('status', true);
        })->with(['phase' => function($query) use ($status){
            $query->where('status', true);
        }])->latest('id')->count();

        $occupied_sept = Tenant::where('date_until', 'like', '%'.$current_yr_sept.'%')->orWhere('date_reg', 'like', '%'.$current_yr_sept.'%')->whereHas('phase', function ($query) use ($status){
            $query->where('status', true);
        })->with(['phase' => function($query) use ($status){
            $query->where('status', true);
        }])->latest('id')->count();

        $occupied_oct = Tenant::where('date_until', 'like', '%'.$current_yr_oct.'%')->orWhere('date_reg', 'like', '%'.$current_yr_oct.'%')->whereHas('phase', function ($query) use ($status){
            $query->where('status', true);
        })->with(['phase' => function($query) use ($status){
            $query->where('status', true);
        }])->latest('id')->count();
        
        $occupied_nov = Tenant::where('date_until', 'like', '%'.$current_yr_nov.'%')->orWhere('date_reg', 'like', '%'.$current_yr_nov.'%')->whereHas('phase', function ($query) use ($status){
            $query->where('status', true);
        })->with(['phase' => function($query) use ($status){
            $query->where('status', true);
        }])->latest('id')->count();

        $occupied_dev = Tenant::where('date_until', 'like', '%'.$current_yr_dev.'%')->orWhere('date_reg', 'like', '%'.$current_yr_dev.'%')->whereHas('phase', function ($query) use ($status){
            $query->where('status', true);
        })->with(['phase' => function($query) use ($status){
            $query->where('status', true);
        }])->latest('id')->count();
       
        $unoccupied_jan = Phase::where('status',false)->where('date_year','like', '%'.$current_yr_jan.'%')->count();
        $unoccupied_feb = Phase::where('status',false)->where('date_year','like', '%'.$current_yr_feb.'%')->count();
        $unoccupied_mar = Phase::where('status',false)->where('date_year','like', '%'.$current_yr_mar.'%')->count();
        $unoccupied_apr = Phase::where('status',false)->where('date_year','like', '%'.$current_yr_apr.'%')->count();
        $unoccupied_may = Phase::where('status',false)->where('date_year','like', '%'.$current_yr_may.'%')->count();
        $unoccupied_jun = Phase::where('status',false)->where('date_year','like', '%'.$current_yr_jun.'%')->count();
        $unoccupied_jul = Phase::where('status',false)->where('date_year','like', '%'.$current_yr_jul.'%')->count();
        $unoccupied_aug = Phase::where('status',false)->where('date_year','like', '%'.$current_yr_aug.'%')->count();
        $unoccupied_sept = Phase::where('status',false)->where('date_year','like', '%'.$current_yr_sept.'%')->count();
        $unoccupied_oct = Phase::where('status',false)->where('date_year','like', '%'.$current_yr_oct.'%')->count();
        $unoccupied_nov = Phase::where('status',false)->where('date_year','like', '%'.$current_yr_nov.'%')->count();
        $unoccupied_dev = Phase::where('status',false)->where('date_year','like', '%'.$current_yr_dev.'%')->count();

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

    public function demandForecast(){
        for($i = 1; $i <= 5; $i++){
            $current_yr = Carbon::parse(Now())->format('Y');
            $current_yr_jan = Carbon::parse($current_yr - $i.'-01')->format('Y-m');
            $current_yr_feb = Carbon::parse($current_yr - $i.'-02')->format('Y-m');
            $current_yr_mar = Carbon::parse($current_yr - $i.'-03')->format('Y-m');
            $current_yr_apr = Carbon::parse($current_yr - $i.'-04')->format('Y-m');
            $current_yr_may = Carbon::parse($current_yr - $i.'-05')->format('Y-m');
            $current_yr_jun = Carbon::parse($current_yr - $i.'-06')->format('Y-m');
            $current_yr_jul = Carbon::parse($current_yr - $i.'-07')->format('Y-m');
            $current_yr_aug = Carbon::parse($current_yr - $i.'-08')->format('Y-m');
            $current_yr_sept = Carbon::parse($current_yr - $i.'-09')->format('Y-m');
            $current_yr_oct = Carbon::parse($current_yr - $i.'-10')->format('Y-m');
            $current_yr_nov = Carbon::parse($current_yr - $i.'-11')->format('Y-m');
            $current_yr_dev = Carbon::parse($current_yr - $i.'-12')->format('Y-m');
            $status = true;
            $occupied_jan[$i] = Tenant::where('date_until', 'like', '%'.$current_yr_jan.'%')->orWhere('date_reg', 'like', '%'.$current_yr_jan.'%')->whereHas('phase', function ($query) use ($status){
                $query->where('status', true);
            })->with(['phase' => function($query) use ($status){
                $query->where('status', true);
            }])->latest('id')->count();
            $occupied_feb[$i] = Tenant::where('date_until', 'like', '%'.$current_yr_feb.'%')->orWhere('date_reg', 'like', '%'.$current_yr_feb.'%')->whereHas('phase', function ($query) use ($status){
                $query->where('status', true);
            })->with(['phase' => function($query) use ($status){
                $query->where('status', true);
            }])->latest('id')->count();
            $occupied_mar[$i] = Tenant::where('date_until', 'like', '%'.$current_yr_mar.'%')->orWhere('date_reg', 'like', '%'.$current_yr_mar.'%')->whereHas('phase', function ($query) use ($status){
                $query->where('status', true);
            })->with(['phase' => function($query) use ($status){
                $query->where('status', true);
            }])->latest('id')->count();
            $occupied_apr[$i] = Tenant::where('date_until', 'like', '%'.$current_yr_apr.'%')->orWhere('date_reg', 'like', '%'.$current_yr_apr.'%')->whereHas('phase', function ($query) use ($status){
                $query->where('status', true);
            })->with(['phase' => function($query) use ($status){
                $query->where('status', true);
            }])->latest('id')->count();
            $occupied_may[$i] = Tenant::where('date_until', 'like', '%'.$current_yr_may.'%')->orWhere('date_reg', 'like', '%'.$current_yr_may.'%')->whereHas('phase', function ($query) use ($status){
                $query->where('status', true);
            })->with(['phase' => function($query) use ($status){
                $query->where('status', true);
            }])->latest('id')->count();
            $occupied_jun[$i] = Tenant::where('date_until', 'like', '%'.$current_yr_jun.'%')->orWhere('date_reg', 'like', '%'.$current_yr_jun.'%')->whereHas('phase', function ($query) use ($status){
                $query->where('status', true);
            })->with(['phase' => function($query) use ($status){
                $query->where('status', true);
            }])->latest('id')->count();
            $occupied_jul[$i] = Tenant::where('date_until', 'like', '%'.$current_yr_jul.'%')->orWhere('date_reg', 'like', '%'.$current_yr_jul.'%')->whereHas('phase', function ($query) use ($status){
                $query->where('status', true);
            })->with(['phase' => function($query) use ($status){
                $query->where('status', true);
            }])->latest('id')->count();
            $occupied_aug[$i] = Tenant::where('date_until', 'like', '%'.$current_yr_aug.'%')->orWhere('date_reg', 'like', '%'.$current_yr_aug.'%')->whereHas('phase', function ($query) use ($status){
                $query->where('status', true);
            })->with(['phase' => function($query) use ($status){
                $query->where('status', true);
            }])->latest('id')->count();
            $occupied_sept[$i] = Tenant::where('date_until', 'like', '%'.$current_yr_sept.'%')->orWhere('date_reg', 'like', '%'.$current_yr_sept.'%')->whereHas('phase', function ($query) use ($status){
                $query->where('status', true);
            })->with(['phase' => function($query) use ($status){
                $query->where('status', true);
            }])->latest('id')->count();
            $occupied_oct[$i] = Tenant::where('date_until', 'like', '%'.$current_yr_oct.'%')->orWhere('date_reg', 'like', '%'.$current_yr_oct.'%')->whereHas('phase', function ($query) use ($status){
                $query->where('status', true);
            })->with(['phase' => function($query) use ($status){
                $query->where('status', true);
            }])->latest('id')->count();
            $occupied_nov[$i] = Tenant::where('date_until', 'like', '%'.$current_yr_nov.'%')->orWhere('date_reg', 'like', '%'.$current_yr_nov.'%')->whereHas('phase', function ($query) use ($status){
                $query->where('status', true);
            })->with(['phase' => function($query) use ($status){
                $query->where('status', true);
            }])->latest('id')->count();
            $occupied_dev[$i] = Tenant::where('date_until', 'like', '%'.$current_yr_dev.'%')->orWhere('date_reg', 'like', '%'.$current_yr_dev.'%')->whereHas('phase', function ($query) use ($status){
                $query->where('status', true);
            })->with(['phase' => function($query) use ($status){
                $query->where('status', true);
            }])->latest('id')->count();
            $arry = [$occupied_jan, $occupied_feb, $occupied_mar, $occupied_apr, $occupied_may, $occupied_jun, $occupied_jul, $occupied_aug, $occupied_sept, $occupied_oct, $occupied_nov, $occupied_dev];
        }
        $forecast_jan = array_sum($occupied_jan) / 5; 
        $forecast_feb = array_sum($occupied_feb) / 5;
        $forecast_mar = array_sum($occupied_mar) / 5; 
        $forecast_apr = array_sum($occupied_apr) / 5; 
        $forecast_may = array_sum($occupied_may) / 5; 
        $forecast_jun = array_sum($occupied_jun) / 5; 
        $forecast_jul = array_sum($occupied_jul) / 5; 
        $forecast_aug = array_sum($occupied_aug) / 5; 
        $forecast_sept = array_sum($occupied_sept) / 5; 
        $forecast_oct = array_sum($occupied_oct) / 5; 
        $forecast_nov = array_sum($occupied_nov) / 5; 
        $forecast_dev = array_sum($occupied_dev) / 5; 
        $chart = new RentalChart;
        $chart->dataset('Predict stalls occupy this year '. $current_yr, 'line', [$forecast_jan, $forecast_feb, $forecast_mar, $forecast_apr, $forecast_may, $forecast_jun, $forecast_jul, $forecast_aug, $forecast_sept, $forecast_oct, $forecast_nov, $forecast_dev]);
        
        $yr_now = Carbon::parse(Now())->format('Y');
        $x = 1;
        $yr_now_jan = Carbon::parse($yr_now - $x.'-01')->format('Y-m');
        $yr_now_feb = Carbon::parse($yr_now - $x.'-02')->format('Y-m');
        $yr_now_mar = Carbon::parse($yr_now - $x.'-03')->format('Y-m');
        $yr_now_apr = Carbon::parse($yr_now - $x.'-04')->format('Y-m');
        $yr_now_may = Carbon::parse($yr_now - $x.'-05')->format('Y-m');
        $yr_now_jun = Carbon::parse($yr_now - $x.'-06')->format('Y-m');
        $yr_now_jul = Carbon::parse($yr_now - $x.'-07')->format('Y-m');
        $yr_now_aug = Carbon::parse($yr_now - $x.'-08')->format('Y-m');
        $yr_now_sept = Carbon::parse($yr_now - $x.'-09')->format('Y-m');
        $yr_now_oct = Carbon::parse($yr_now - $x.'-10')->format('Y-m');
        $yr_now_nov = Carbon::parse($yr_now - $x.'-11')->format('Y-m');
        $yr_now_dev = Carbon::parse($yr_now - $x.'-12')->format('Y-m');
        $occupied_janx = Tenant::where('date_until', 'like', '%'.$yr_now_jan.'%')->orWhere('date_reg', 'like', '%'.$yr_now_jan.'%')->whereHas('phase', function ($query) use ($status){
            $query->where('status', true);
        })->with(['phase' => function($query) use ($status){
            $query->where('status', true);
        }])->latest('id')->count();
        $occupied_febx = Tenant::where('date_until', 'like', '%'.$yr_now_feb.'%')->orWhere('date_reg', 'like', '%'.$yr_now_feb.'%')->whereHas('phase', function ($query) use ($status){
            $query->where('status', true);
        })->with(['phase' => function($query) use ($status){
            $query->where('status', true);
        }])->latest('id')->count();
        $occupied_marx = Tenant::where('date_until', 'like', '%'.$yr_now_mar.'%')->orWhere('date_reg', 'like', '%'.$yr_now_mar.'%')->whereHas('phase', function ($query) use ($status){
            $query->where('status', true);
        })->with(['phase' => function($query) use ($status){
            $query->where('status', true);
        }])->latest('id')->count();
        $occupied_aprx = Tenant::where('date_until', 'like', '%'.$yr_now_apr.'%')->orWhere('date_reg', 'like', '%'.$yr_now_apr.'%')->whereHas('phase', function ($query) use ($status){
            $query->where('status', true);
        })->with(['phase' => function($query) use ($status){
            $query->where('status', true);
        }])->latest('id')->count();
        $occupied_mayx = Tenant::where('date_until', 'like', '%'.$yr_now_may.'%')->orWhere('date_reg', 'like', '%'.$yr_now_may.'%')->whereHas('phase', function ($query) use ($status){
            $query->where('status', true);
        })->with(['phase' => function($query) use ($status){
            $query->where('status', true);
        }])->latest('id')->count();
        $occupied_junx = Tenant::where('date_until', 'like', '%'.$yr_now_jun.'%')->orWhere('date_reg', 'like', '%'.$yr_now_jun.'%')->whereHas('phase', function ($query) use ($status){
            $query->where('status', true);
        })->with(['phase' => function($query) use ($status){
            $query->where('status', true);
        }])->latest('id')->count();
        $occupied_julx = Tenant::where('date_until', 'like', '%'.$yr_now_jul.'%')->orWhere('date_reg', 'like', '%'.$yr_now_jul.'%')->whereHas('phase', function ($query) use ($status){
            $query->where('status', true);
        })->with(['phase' => function($query) use ($status){
            $query->where('status', true);
        }])->latest('id')->count();
        $occupied_augx = Tenant::where('date_until', 'like', '%'.$yr_now_aug.'%')->orWhere('date_reg', 'like', '%'.$yr_now_aug.'%')->whereHas('phase', function ($query) use ($status){
            $query->where('status', true);
        })->with(['phase' => function($query) use ($status){
            $query->where('status', true);
        }])->latest('id')->count();
        $occupied_septx = Tenant::where('date_until', 'like', '%'.$yr_now_sept.'%')->orWhere('date_reg', 'like', '%'.$yr_now_sept.'%')->whereHas('phase', function ($query) use ($status){
            $query->where('status', true);
        })->with(['phase' => function($query) use ($status){
            $query->where('status', true);
        }])->latest('id')->count();
        $occupied_octx = Tenant::where('date_until', 'like', '%'.$yr_now_oct.'%')->orWhere('date_reg', 'like', '%'.$yr_now_oct.'%')->whereHas('phase', function ($query) use ($status){
            $query->where('status', true);
        })->with(['phase' => function($query) use ($status){
            $query->where('status', true);
        }])->latest('id')->count();
        $occupied_novx = Tenant::where('date_until', 'like', '%'.$yr_now_nov.'%')->orWhere('date_reg', 'like', '%'.$yr_now_nov.'%')->whereHas('phase', function ($query) use ($status){
            $query->where('status', true);
        })->with(['phase' => function($query) use ($status){
            $query->where('status', true);
        }])->latest('id')->count();
        $occupied_devx = Tenant::where('date_until', 'like', '%'.$yr_now_dev.'%')->orWhere('date_reg', 'like', '%'.$yr_now_dev.'%')->whereHas('phase', function ($query) use ($status){
            $query->where('status', true);
        })->with(['phase' => function($query) use ($status){
            $query->where('status', true);
        }])->latest('id')->count();
        $chart->dataset('Last year occupied stalls', 'line', [$occupied_janx, $occupied_febx, $occupied_marx, $occupied_aprx, $occupied_mayx, $occupied_junx, $occupied_julx, $occupied_augx, $occupied_septx, $occupied_octx, $occupied_novx, $occupied_devx]);
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

        return view('demand-forecast',[
            'chart' => $chart,
        ]);
    }

    public function search(){

        if(request('search')){
            $seaching = request('search');

            $payment = Payment::whereHas('tenant', function ($query) use ($seaching){
                $query->where('lname', 'like', '%'.$seaching.'%')
                ->orWhere('fname', 'like', '%'.$seaching.'%')
                ->orWhere('mname', 'like', '%'.$seaching.'%');
            })->with(['tenant' => function($query) use ($seaching){
                $query->where('lname', 'like', '%'.$seaching.'%')
                ->orWhere('fname', 'like', '%'.$seaching.'%')
                ->orWhere('mname', 'like', '%'.$seaching.'%');
            }])->latest('id')->get();
            
            $section = Section::where('section_name', 'like', '%'.$seaching.'%')->latest('id')->first();
            $phase = Phase::where('section_id',(isset($section))? $section->id : '')
                ->orWhere('stall_no', 'like', '%'.$seaching.'%')
                ->orWhere('description', 'like', '%'.$seaching.'%')
                ->whereHas('tenant', function ($query) use ($seaching){ 
                $query->where('lname', 'like', '%'.$seaching.'%')
                ->orWhere('fname', 'like', '%'.$seaching.'%')
                ->orWhere('mname', 'like', '%'.$seaching.'%');
            })->with(['tenant' => function($query) use ($seaching){
                $query->where('lname', 'like', '%'.$seaching.'%')
                ->orWhere('fname', 'like', '%'.$seaching.'%')
                ->orWhere('mname', 'like', '%'.$seaching.'%');
            }])->latest('id')->with('section')->get();


            $tenants = Tenant::where('lname', 'like', '%'.$seaching.'%')
            ->orWhere('fname', 'like', '%'.$seaching.'%')
            ->orWhere('mname', 'like', '%'.$seaching.'%')
            ->whereHas('phase', function ($query) use ($seaching){
                $query->where('stall_no', 'like', '%'.$seaching.'%')
                ->orWhere('description', 'like', '%'.$seaching.'%');
            })->with(['phase' => function($query) use ($seaching){
                $query->where('stall_no', 'like', '%'.$seaching.'%')
                ->orWhere('description', 'like', '%'.$seaching.'%');
            }])->latest('id')->with('phase')->get();

            $result_count = $phase->count() + $tenants->count() + $payment->count();
            return view('search',['phase'=>$phase,'tenants'=>$tenants,'payment'=>$payment, 'result_count'=>$result_count]);
        }else{
            return view('search',['message'=>'No Result Found!','result_count'=>'0']);
        }
    }
}
