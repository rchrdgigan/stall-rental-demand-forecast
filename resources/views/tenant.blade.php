@extends('layouts.app')

@section('title')
Tenants
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
                <li class="breadcrumb-item active"><a href="{{route('tenant.index')}}">Tenants</a></li>
            </ol>
        </div>

        <div class="row">
            
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">List of Tenants</h4>
                        <a href="{{route('tenant.create')}}" class="btn btn-primary">Add New</a>
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
                                        <td>{{$data->phase->stall_no}}</td>
                                        <td>{{$data->phase->priceformat}}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="#" class="btn btn-success shadow btn-xs sharp me-1"><i class="fas fa-eye"></i></a>
                                                <a href="{{route('tenant.edit', $data->id)}}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                <a  data-bs-toggle="modal" id="{{$data->id}}" data-bs-target="#delModal" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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
    </div>
</div>

<!-- Del Modal -->
<div class="modal fade" id="delModal" tabindex="-1" aria-labelledby="delModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="form-validation">
            <form action="{{route('tenant.destroy')}}" method="post" id="delete_frm">
                @csrf
                @method('DELETE')
                <div class="modal-body text-center">
                    <input type="hidden" name="id">
                    <i class="fa fa-exclamation-triangle fa-6x text-warning" aria-hidden="true"></i>
                    <p class="fs-4">Are you sure you want to delete this data?</p>

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Yes, Delete it</button>
                </div>
            </form>
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

    $('#delModal').on('show.bs.modal', function (e) {
        var opener=e.relatedTarget;
        var id=$(opener).attr('id');
        $('#delete_frm').find('[name="id"]').val(id);
    });
</script>
@endpush