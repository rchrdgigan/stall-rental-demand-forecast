@extends('layouts.app')

@section('title')
Payments
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
                <li class="breadcrumb-item active"><a href="{{route('payment.index')}}">Payments</a></li>
            </ol>
        </div>

        <div class="row">
            
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">List of Payments</h4>
                        <a href="{{route('payment.create')}}" class="btn btn-primary">Add New</a>
                    </div>
                    <div class="col-md-12 p-2">
                        @include('message')
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Tenants Name</th>
                                        <th>Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($payment as $data)
                                    <tr>
                                        <td>{{Carbon\Carbon::parse($data->created_at)->format('M d, Y')}}</td>
                                        <td>{{$data->tenant->fullname}}</td>
                                        <td>₱ {{number_format($data->amount)}}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{route('payment.edit', $data->id)}}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                            </div>												
                                        </td>	
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Date</th>
                                        <th>Tenants Name</th>
                                        <th>Amount</th>
                                        <th>Action</th>
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
<script src="{{asset('js/plugins-init/datatables.init.js')}}"></script>
@endpush