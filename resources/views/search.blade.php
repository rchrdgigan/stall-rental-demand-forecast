@extends('layouts.app')

@section('title')
Search
@endsection

@push('links')
<link href="{{asset('vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
@endpush

@section('content')
<div class="content-body">
    <div class="container-fluid">
        
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="{{route('search')}}">Searched Result({{$result_count}})</a></li>
            </ol>
        </div>
        @if(isset($phase) || isset($tenants) || isset($payment))
            @if(isset($phase))
                @if(!$phase->isEmpty())
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Phases List</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="table_1" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>Date Created</th>
                                                <th>Phase</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($phase as $data)
                                            <tr>
                                                <td>{{Carbon\Carbon::parse($data->updated_at)->format('M d, Y')}}</td>
                                                <td>
                                                    <small>Stall # : <b>{{$data->stall_no}}</b></small><br>
                                                    <small>Section : <b>{{$data->section->section_name}}</b></small><br>
                                                    <small>Description : <b>{{$data->description}}</b></small><br>
                                                    <small>Price : <b>{{$data->priceformat}}</b></small><br>

                                                </td>
                                                <td>
                                                    <span class="{{($data->status == 1) ? 'bg-success':'bg-danger'}} text-white rounded p-1">{{($data->status == 1) ? 'Occupied':'Unoccupied'}}</span>
                                                    @if($data->status == 1)
                                                    <a  data-bs-toggle="modal" id="{{$data->id}}" data-bs-target="#updateModal" class="btn btn-secondary shadow btn-xs sharp me-1"><i class="fa fa-retweet"></i></a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Date Created</th>
                                                <th>Phase</th>
                                                <th>Status</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            @endif

            @if(isset($tenants))
                @if(!$tenants->isEmpty())
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tenants List</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="table_2" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>Date Created</th>
                                                <th>Tenants Name</th>
                                                <th>Stall Rented</th>
                                                <th>Excess Rate</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($tenants as $data)
                                            <tr>
                                                <td>{{Carbon\Carbon::parse($data->created_at)->format('M d, Y')}}</td>
                                                <td>{{$data->fullname}}</td>
                                                <td>{{$data->phase->stall_no ?? 'N/A'}}</td>
                                                <td>{{$data->phase->priceformat ?? 'N/A'}}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="{{route('tenant.show', $data->id)}}" class="btn btn-success shadow btn-xs sharp me-1"><i class="fas fa-eye"></i></a>
                                                    </div>												
                                                </td>	
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Date Created</th>
                                                <th>Tenants Name</th>
                                                <th>Stall Rented</th>
                                                <th>Excess Rate</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            @endif

            @if(isset($payment))
                @if(!$payment->isEmpty())
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Payments List</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="table_3" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Tenants Name</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($payment as $data)
                                            <tr>
                                                <td>{{Carbon\Carbon::parse($data->created_at)->format('M d, Y')}}</td>
                                                <td>{{$data->tenant->fullname}}</td>
                                                <td>₱ {{number_format($data->amount)}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Date</th>
                                                <th>Tenants Name</th>
                                                <th>Amount</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            @endif
        @else
            <div class="row text-center">
                <h1>{{$message}}</h1>
            </div>
        @endif

    </div>
</div>
@endsection

@push('script')
<script src="{{asset('vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script>
    $(function () {
        var table = $('#table_1').DataTable({
            order:[[0,'desc']],
            lengthMenu:[[5,10,25,50,-1],[5,10,25,50,"All"]],
            bLengthChange: false,
            searching: false,
            language: {
                paginate: {
                next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
                previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>' 
                }
            }
        });
    });
</script>
<script>
    $(function () {
        var table = $('#table_2').DataTable({
            order:[[0,'desc']],
            lengthMenu:[[5,10,25,50,-1],[5,10,25,50,"All"]],
            bLengthChange: false,
            searching: false,
            language: {
                paginate: {
                next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
                previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>' 
                }
            }
        });
    });
</script>
<script>
    $(function () {
        var table = $('#table_3').DataTable({
            order:[[0,'desc']],
            lengthMenu:[[5,10,25,50,-1],[5,10,25,50,"All"]],
            bLengthChange: false,
            searching: false,
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