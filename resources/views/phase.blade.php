@extends('layouts.app')

@section('title')
Phase
@endsection

@push('links')
<link href="{{asset('vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
@endpush
@section('content')
<div class="content-body">
    <div class="container-fluid">
        
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Phase</a></li>
            </ol>
        </div>

        <div class="row">
            
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Phase List</h4>
                        <a href="{{route('phase.create')}}" class="btn btn-primary">Add New</a>
                    </div>
                    <div class="col-md-12 p-2">
                        @include('message')
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table_id" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Date Created</th>
                                        <th>Stall No.</th>
                                        <th>Section</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($phase as $data)
                                    <tr>
                                        <td>{{Carbon\Carbon::parse($data->created_at)->format('M d, Y')}}</td>
                                        <td>{{$data->stall_no}}</td>
                                        <td>{{$data->section->section_name}}</td>
                                        <td>{{$data->description}}</td>
                                        <td>{{$data->price}}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="#" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                <a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                            </div>												
                                        </td>	
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Date Created</th>
                                        <th>Stall No.</th>
                                        <th>Section</th>
                                        <th>Description</th>
                                        <th>Price</th>
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