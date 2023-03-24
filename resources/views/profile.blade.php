@extends('layouts.app')

@section('title')
Profile
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
                <li class="breadcrumb-item"><a href="javascript:void(0)">Profile</a></li>
            </ol>
        </div>

        <div class="row">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="profile card card-body px-3 pt-3 pb-0">
                    <div class="profile-head">
                        <div class="photo-content">
                            <div class="cover-photo rounded" style="background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,121,84,1) 0%, rgba(0,255,196,1) 100%);"></div>
                        </div>
                        <div class="profile-info">
                            <div class="profile-photo">
                                <img src="{{asset('images/profile.png')}}" class="img-fluid rounded-circle" alt="">
                            </div>
                            <div class="profile-details">
                                <div class="profile-name px-3 pt-2 text-center">
                                    <h4 class="text-primary mb-0">{{auth()->user()->name}}</h4>
                                    <p>Admin</p>
                                </div>
                                <div class="profile-email px-2 pt-2 text-center">
                                    <h4 class="text-muted mb-0">{{auth()->user()->email}}</h4>
                                    <p>Email</p>
                                </div>
                                <div class="dropdown ms-auto">
                                    <a href="#" class="btn btn-primary light sharp" data-bs-toggle="dropdown" aria-expanded="true"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li class="dropdown-item"><i class="fa fa-user-circle text-primary me-2"></i> 
                                            <a type="button" data-bs-toggle="modal" data-bs-target="#editModal">
                                                Edit profile
                                            </a>
                                        </li>
                                        <li class="dropdown-item"><i class="fa fa-key text-primary me-2"></i> 
                                            <a type="button" data-bs-toggle="modal" data-bs-target="#changepassModal">
                                                Change Password
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="form-validation">
            <form action="{{route('profile.update')}}" method="post" class="needs-validation" novalidate="">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Profile</h5>
                </div>
                <div class="modal-body">
                    <div class="mb-3 row">
                        <label class="col-lg-12 col-form-label" for="validationCustom01">
                            Admin Name
                        </label>
                        <div class="col-lg-12">
                            <input type="text" name="name" class="form-control" id="validationCustom01" placeholder="Enter your name.." value="{{auth()->user()->name}}" required="">
                            <div class="invalid-feedback">
                                Please enter your name.
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-lg-12 col-form-label" for="validationCustom01">
                            Admin Email
                        </label>
                        <div class="col-lg-12">
                            <input type="text" name="email" class="form-control" id="validationCustom01" placeholder="Enter your eamil.." value="{{auth()->user()->email}}" required="">
                            <div class="invalid-feedback">
                                Please enter your email.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>  
            </form>
        </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="changepassModal" tabindex="-1" aria-labelledby="changepassModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="form-validation">
            <form action="{{route('profile.update.password')}}" method="post" class="needs-validation" novalidate="">
            @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="changepassModalLabel">Change Password</h5>
                </div>
                <div class="modal-body">
                    <div class="mb-3 row">
                        <label class="col-lg-12 col-form-label" for="validationCustom01">
                            Old Password
                        </label>
                        <div class="col-lg-12">
                            <input type="password" name="old_password" class="form-control" id="validationCustom01" placeholder="Enter your current password.." required="">
                            <div class="invalid-feedback">
                                Please enter your old password.
                            </div>
                        </div>
                        @error('old_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3 row">
                        <label class="col-lg-12 col-form-label" for="validationCustom01">
                            New Password
                        </label>
                        <div class="col-lg-12">
                            <input type="password" name="new_password" class="form-control" id="validationCustom01" placeholder="Enter your new password.." required="">
                            <div class="invalid-feedback">
                                Please enter your new password.
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-lg-12 col-form-label" for="validationCustom01">
                            Confirmation Password
                        </label>
                        <div class="col-lg-12">
                            <input type="password" name="new_password_confirmation" class="form-control" id="validationCustom01" placeholder="Enter your new password.." required="">
                            <div class="invalid-feedback">
                                Please enter your new password.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
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