@extends('layouts.app')

@section('title')
Create New Phase
@endsection

@section('content')
<div class="content-body">
    <div class="container-fluid">
        
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Create New Phase</a></li>
            </ol>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-validation">
                    <form action="{{route('phase.store')}}" method="POST" class="needs-validation" novalidate="">
                        @csrf
                        <div class="row card">
                            <div class="card-header">
                                <h4 class="card-title">Phase Form</h4>
                            </div>
                           
                            <div class="col-md-12 pt-2">

                                <div class="mb-3 row">
                                    <div class="col-md-6">
                                        <label class="col-lg-12 col-form-label" for="stallNo">
                                            Stall No 
                                        </label>
                                        <div class="col-lg-12">
                                            <input type="text" class="form-control" id="stallNo" name="stall_no"  value="{{  $edit_section->section_name ?? old('section_name') }}" placeholder="Enter a stall number.." required="">
                                            <div class="invalid-feedback">
                                                Please enter a stall number.
                                            </div>
                                            @error('stall_no')
                                                <small class="text-danger" role="alert">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-lg-12 col-form-label" for="selectCatName">
                                            Select Category Name
                                        </label>
                                        <div class="col-lg-12">
                                            <select name="cat_id" id="selectCatName" class="form-control">
                                                @foreach($section as $data)
                                                <option value="{{$data->id}}">{{$data->section_name}}</option>
                                                @endforeach
                                            </select>
                                            @error('cat_id')
                                                <small class="text-danger" role="alert">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="mb-3 row">
                                    <label class="col-lg-12 col-form-label" for="description">
                                        Description
                                    </label>
                                    <div class="col-lg-12">
                                        <textarea name="description" class="form-control" id="description" cols="30" rows="5" placeholder="Enter a stall description.."  required=""></textarea>
                                        <div class="invalid-feedback">
                                            Please enter a stall description.
                                        </div>
                                        @error('description')
                                            <small class="text-danger" role="alert">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-lg-12 col-form-label" for="price">
                                        Price
                                    </label>
                                    <div class="col-lg-12">
                                        <input type="text" class="form-control" id="price" name="price"  value="{{  $edit_section->section_name ?? old('section_name') }}" placeholder="Enter a stall price.." required="">
                                        <div class="invalid-feedback">
                                            Please enter a stall price.
                                        </div>
                                        @error('price')
                                            <small class="text-danger" role="alert">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{route('phase.index')}}" class="btn btn-secondary ">Cancel</a>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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

<script>
$('#delModal').on('show.bs.modal', function (e) {
    var opener=e.relatedTarget;
    var id=$(opener).attr('id');
    $('#delete_frm').find('[name="id"]').val(id);
});
</script>
@endpush