@extends('layouts.app')

@section('title')
Edit Section
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
                <li class="breadcrumb-item"><a href="javascript:void(0)">Edit Category</a></li>
            </ol>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-validation">
                    <form action="{{route('section.update', $edit_section->id)}}" method="POST" class="needs-validation" novalidate="">
                        @csrf
                        @method('PUT')
                        <div class="row card">
                            <div class="card-header">
                                <h4 class="card-title">Section Edit Form</h4>
                            </div>
                           
                            <div class="col-md-12 pt-2">
                                <div class="mb-3 row">
                                    <label class="col-lg-12 col-form-label" for="validationCustom01">
                                        Category Name
                                    </label>
                                    <div class="col-lg-12">
                                        <input type="text" class="form-control" id="validationCustom01" name="section_name"  value="{{  $edit_section->section_name ?? old('section_name') }}" placeholder="Enter a category name.." required="">
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
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{route('section.index')}}" class="btn btn-secondary ">Cancel</a>
                                        <button type="submit" class="btn btn-primary">Update</button>
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
                            <table id="example3" class="display" style="min-width: 400px">
                                <thead>
                                    <tr>
                                        <th>Date Created</th>
                                        <th>Category</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sections as $data)
                                    <tr>
                                        <td>{{Carbon\Carbon::parse($data->created_at)->format('M d, Y')}}</td>
                                        <td>{{$data->section_name}}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{route('section.edit',$data->id)}}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                <a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                            </div>												
                                        </td>	
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Date Created</th>
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
@endsection

@push('script')
<script src="{{asset('vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/plugins-init/datatables.init.js')}}"></script>


<script>
		(function () {
		  'use strict'

		  // Fetch all the forms we want to apply custom Bootstrap validation styles to
		  var forms = document.querySelectorAll('.needs-validation')

		  // Loop over them and prevent submission
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
	</script>
@endpush