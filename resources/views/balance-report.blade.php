@extends('layouts.app')

@section('title')
Payment Report
@endsection

@push('links')
<link href="{{asset('vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
@endpush
@section('content')
<div class="content-body">
    <div class="container-fluid">
        
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('report.index')}}">Report</a></li>
                <li class="breadcrumb-item active"><a href="{{route('report.balance')}}">Rental Balances Report</a></li>
            </ol>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Rental Balances Report <span><a href="{{route('report.balance.print')}}?month_of={{(isset($_GET['month_of']))? $_GET['month_of']:''}}" class="btn btn-sm btn-primary">Print <i class="fa fa-print" aria-hidden="true"></i></a></span></h4>
                    </div>
                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table_id" class="display" style="min-width: 400px">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Tenants</th>
                                        <th>Stalls #</th>
                                        <th>Excess Rate</th>
                                        <th>Amount Paid</th>
                                    </tr>
                                </thead>
                                <input type="hidden" value="{{$i=1;}}">
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
@endsection

@push('script')
<script src="{{asset('vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script>
    $(function () {
        var table = $('#table_id').DataTable({
            order:[[0,'desc']],
            lengthMenu:[[5,10,25,50,-1],[5,10,25,50,"All"]],
            language: {
                paginate: {
                next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
                previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>' 
                }
            }
        });
    });
</script>
@endpush