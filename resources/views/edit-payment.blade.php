@extends('layouts.app')

@section('title')
Edit Payment
@endsection

@push('links')
<link rel="stylesheet" href="{{asset('vendor/select2/css/select2.min.css')}}">
@endpush

@section('content')
<div class="content-body">
    <div class="container-fluid">
        
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('payment.index')}}">Payment</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Payment</a></li>
            </ol>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-validation">
                    <form action="{{route('payment.update',$edit_pay->id)}}" method="POST" class="needs-validation" novalidate="">
                        @csrf
                        @method('PUT')
                        <div class="row card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Payment</h4>
                            </div>
                           
                            <div class="col-md-12 pt-2">
                
                                <div class="card">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="card-body">
                                            @livewire('payments',['edit_pay' => $edit_pay])
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card-body">
                                                <div class="mb-4">
                                                    <h4 class="card-title" for="amount">Amount Pay</h4>
                                                </div>
                                                <div class="input-group mb-2">
													<div class="input-group-text">₱ </div>
                                                    <input type="number" name="amount" class="form-control" id="amount" value="{{ $edit_pay->amount ?? old('amount') }}" placeholder="Enter a amount..">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="mb-3 row">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{route('payment.index')}}" class="btn btn-secondary ">Cancel</a>
                                        <button type="submit" class="btn btn-primary">Update</button>
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
<script src="{{asset('vendor/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('js/plugins-init/select2-init.js')}}"></script>
@endpush