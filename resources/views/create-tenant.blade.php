@extends('layouts.app')

@section('title')
Create New Tenant
@endsection

@section('content')
<div class="content-body">
    <div class="container-fluid">
        
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('tenant.index')}}">Tenants</a></li>
                <li class="breadcrumb-item active"><a href="{{route('tenant.create')}}">Create New Tenant</a></li>
            </ol>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-validation">
                    <form action="{{route('tenant.store')}}" method="POST" class="needs-validation" novalidate="">
                        @csrf
                        <div class="row card">
                            <div class="card-header">
                                <h4 class="card-title">Tenants Form</h4>
                            </div>
                            <div class="col-md-12 p-2">
                                @include('message')
                            </div>
                            <div class="col-md-12 pt-2">

                                <div class="mb-3 row">
                                    <div class="col-md-4">
                                        <label class="col-lg-12 col-form-label" for="lname">
                                        Last Name
                                        </label>
                                        <div class="col-lg-12">
                                            <input type="text" class="form-control" id="lname" name="lname"  value="{{  old('lname') }}"  placeholder="Enter a last name.." required="">
                                            <div class="invalid-feedback">
                                                Please enter a last name.
                                            </div>
                                            @error('lname')
                                                <small class="text-danger" role="alert">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-lg-12 col-form-label" for="fname">
                                        First Name
                                        </label>
                                        <div class="col-lg-12">
                                            <input type="text" class="form-control" id="fname" name="fname"  value="{{  old('fname') }}" placeholder="Enter a first name.." required="">
                                            <div class="invalid-feedback">
                                                Please enter a first name.
                                            </div>
                                            @error('stall_no')
                                                <small class="text-danger" role="alert">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-lg-12 col-form-label" for="mname">
                                        Middle Name
                                        </label>
                                        <div class="col-lg-12">
                                            <input type="text" class="form-control" id="mname" name="mname"  value="{{  old('mname') }}" placeholder="Enter a middle name..">
                                            <div class="invalid-feedback">
                                                Please enter a middle name.
                                            </div>
                                            @error('mname')
                                                <small class="text-danger" role="alert">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="mb-3 row">
                                    <div class="col-md-6">
                                        <label class="col-lg-12 col-form-label" for="email">
                                        Email Address
                                        </label>
                                        <div class="col-lg-12">
                                            <input type="text" class="form-control" id="email" name="email"  value="{{  old('email') }}"  placeholder="Enter a email address..">
                                            <div class="invalid-feedback">
                                                Please enter a email address.
                                            </div>
                                            @error('email')
                                                <small class="text-danger" role="alert">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-lg-12 col-form-label" for="contact">
                                        Contact Number
                                        </label>
                                        <div class="col-lg-12">
                                            <input type="text" class="form-control" id="contact" name="contact"  value="{{  old('contact') }}"  placeholder="Enter a contact.." required="">
                                            <div class="invalid-feedback">
                                                Please enter a contact.
                                            </div>
                                            @error('contact')
                                                <small class="text-danger" role="alert">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="col-md-6">
                                        <label class="col-lg-12 col-form-label" for="price">
                                            Stall No.
                                        </label>
                                        <div class="col-lg-12">
                                            <select name="stall_no" id="stall_no" class="form-control">
                                                @foreach($phase as $data)
                                                <option value="{{$data->id}}">{{$data->stall_no}}</option>
                                                @endforeach
                                            </select>
                                            @error('stall_no')
                                                <small class="text-danger" role="alert">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-lg-12 col-form-label" for="dateR">
                                        Date Registered From
                                        </label>
                                        <div class="col-lg-12">
                                            <input type="date" class="form-control" id="dateR" name="date_reg"  value="{{  old('date_reg') }}"  placeholder="Enter a date registered.." required="">
                                            <div class="invalid-feedback">
                                                Please select a date.
                                            </div>
                                            @error('date_reg')
                                                <small class="text-danger" role="alert">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-lg-12 col-form-label" for="dateU">
                                        Date Registered Until
                                        </label>
                                        <div class="col-lg-12">
                                            <input type="date" class="form-control" id="dateU" name="date_until"  value="{{  old('date_until') }}"  placeholder="Enter a date until.." required="">
                                            <div class="invalid-feedback">
                                                Please select a date.
                                            </div>
                                            @error('date_until')
                                                <small class="text-danger" role="alert">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{route('tenant.index')}}" class="btn btn-secondary ">Cancel</a>
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
@endpush