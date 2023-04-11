<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Print/Save Documents</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="{{asset('vendor/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('vendor/nouislider/nouislider.min.css')}}">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
</head>

<body class="vh-100">
        <div class="content">
            <div class="container-fluid">
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Payment Report</h4>
                            </div>
                            
                            <div class="card-body">
                                <table class="table table-responsive-md">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Tenants</th>
                                            <th>Stalls #</th>
                                            <th>Excess Rate</th>
                                            <th>Amount Paid</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($tenants as $data)
                                            @foreach($data->payment->take(1) as $pay_data)
                                            <tr>
                                                <td>{{Carbon\Carbon::parse($pay_data->created_at)->format('M d, Y')}}</td>
                                                <td>{{$data->fullname}}</td>
                                                <td>{{$data->phase->stall_no ?? 'N/A'}}</td>
                                                <td>{{$data->phase->priceformat ?? 'N/A'}}</td>
                                                <td>₱ {{number_format($pay_data->where('tenant_id', $data->id)->sum('amount')) ?? 'N/A'}}</td>
                                            </tr>
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Date</th>
                                            <th>Tenants</th>
                                            <th>Stalls #</th>
                                            <th>Excess Rate</th>
                                            <th>Amount Paid</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>

        
        <script src="{{asset('vendor/global/global.min.js')}}"></script>
        <script src="{{asset('vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
        <script>
        window.addEventListener("load", window.print());
        window.onafterprint = function(){
            window.location.href = '{{ url()->previous() }}';
        }
        </script>
        <script src="{{asset('vendor/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>
        
        <script src="{{asset('vendor/apexchart/apexchart.js')}}"></script>
        <script src="{{asset('vendor/nouislider/nouislider.min.js')}}"></script>
        <script src="{{asset('vendor/wnumb/wNumb.js')}}"></script>
        
        <script src="{{asset('js/dashboard/dashboard-1.js')}}"></script>
        <script src="{{asset('js/custom.min.js')}}"></script>
        <script src="{{asset('js/dlabnav-init.js')}}"></script>
        
</body>
</html>