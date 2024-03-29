@extends('layouts.app')

@section('title')
Section
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
                <li class="breadcrumb-item active"><a href="{{route('section.index')}}">Category</a></li>
            </ol>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-validation">
                    <form action="{{route('section.store')}}" method="POST" class="needs-validation" novalidate="">
                        @csrf
                        <div class="row card">
                            <div class="card-header">
                                <h4 class="card-title">Section Form</h4>
                            </div>
                           
                            <div class="col-md-12 pt-2">
                                <div class="mb-3 row">
                                    <label class="col-lg-12 col-form-label" for="validationCustom01">
                                        Category Name
                                    </label>
                                    <div class="col-lg-12">
                                        <input type="text" class="form-control" id="validationCustom01" name="section_name"  value="{{ old('section_name') }}" placeholder="Enter a category name.." required="">
                                        <div class="invalid-feedback">
                                            Please enter a category name.
                                        </div>
                                        @error('section_name')
                                            <small class="text-danger" role="alert">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-lg-12 col-form-label" for="validationCustom01">
                                        Year
                                    </label>
                                    <div class="col-lg-12">
                                        <input type="number" name="date_year" min="1900" max="2099" step="1" class="form-control" value="{{Carbon\Carbon::now()->format('Y')}}" required="">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{route('section.index')}}" class="btn btn-secondary ">Cancel</a>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Category List</h4>
                    </div>
                    <div class="col-md-12 p-2">
                        @include('message')
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table_id" class="display" style="min-width: 400px">
                                <thead>
                                    <tr>
                                        <th>Year</th>
                                        <th>Category</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sections as $data)
                                    <tr>
                                        <td>{{$data->date_year}}</td>
                                        <td>{{$data->section_name}}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{route('section.edit',$data->id)}}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                <a data-bs-toggle="modal" id="{{$data->id}}" data-bs-target="#delModal" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                            </div>												
                                        </td>	
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Year</th>
                                        <th>Category</th>
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
            <form action="{{route('section.destroy')}}" method="post" id="delete_frm">
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
    
    (function () {
        'use strict'

        var forms = document.querySelectorAll('.needs-validation')
        Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }

            form.classList.add('was-validated')
            }, false)
        })
    })()

    $('#delModal').on('show.bs.modal', function (e) {
        var opener=e.relatedTarget;
        var id=$(opener).attr('id');
        $('#delete_frm').find('[name="id"]').val(id);
    });
</script>
@endpush