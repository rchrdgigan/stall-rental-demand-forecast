@extends('layouts.app')

@section('title')
Show Tenant
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
                <li class="breadcrumb-item"><a href="{{route('tenant.index')}}">Tenant</a></li>
                <li class="breadcrumb-item active"><a>Show Tenant</a></li>
            </ol>
        </div>

        <div class="row card">
            <div class="card-header">
                <h4 class="card-title">Show Tenants Info</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="text-center bg-primary text-white rounded-top p-2">Tenants Details</h3>
                        <div class="text-center p-3">
                            Tenants : <b>{{ $show_tenant->fullname }}</b> <br>
                            Email Address : <b>{{ $show_tenant->email }}</b> <br>
                            Contact : <b>{{ $show_tenant->contact }}</b> <br>
                            Rental Rate : <b>{{$show_tenant->phase->priceformat ?? 'N/A'}}</b> <br>
                            Total Paid : <br>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <h3 class="text-center bg-primary text-white rounded-top p-2">Payment list</h3>
                            <div class="table-responsive p-3">
                                <table id="table_id" class="display" style="min-width: 400px">
                                    <thead>
                                        <tr>
                                            <th>Date Paid</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Date Paid</th>
                                            <th>Amount</th>
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
</div>
@endsection

@push('script')
<script src="{{asset('vendor/datatables/js/jquery.dataTables.min.js')}}"></script>

<script>
    $(function () {
        var table = $('#table_id').DataTable({
            order:[[0,'desc']],
            lengthMenu:[[10,25,50,-1],[10,25,50,"All"]],
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