@extends('layouts/layoutMaster')
@php
    $admin='Minue';
@endphp
@section('title', 'Content')

@section('vendor-style')
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/animate-css/animate.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
@endsection

@section('vendor-script')
<script src="{{ asset('assets/vendor/libs/moment/moment.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatables-responsive/datatables.responsive.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatables-buttons/datatables-buttons.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/jszip/jszip.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/pdfmake/pdfmake.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatables-buttons/buttons.html5.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatables-buttons/buttons.print.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/cleavejs/cleave.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endsection



@section('page-script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
.dt-buttons {
width: fit-content;
float: left;
margin-inline-start: 1em
}

.dt-button {
border: none;
border-radius: 4px;
padding: 0.5em 1em;
}
</style>
<script>
$(document).ready(function() {
$("#cm-list").DataTable({
dom: 'Bfrtip',
buttons: [
'copy', 'csv', 'excel', 'pdf', 'print'
],
scrollX: true,

});
});

function popup(id) {
Swal.fire({
title: 'Are you sure?',
text: "You won't be able to revert this!",
icon: 'warning',
showCancelButton: true,
confirmButtonColor: '#3085d6',
cancelButtonColor: '#d33',
confirmButtonText: 'Yes, delete it!'
}).then((result) => {
if (result.isConfirmed) {
window.location = '/delete-lead/' + id;
}
})
}
</script>
<!--<script src="{{ asset('assets/js/ui-modals.js') }}"></script>-->
<!--<script src="{{ asset('assets/js/app-user-list.js') }}"></script>-->
@endsection

<div class="card">
  @if(session()->has('msg'))
  @php
  echo session()->get('msg');
  @endphp
  @endif
@section('content')

  @include('success')
  <!-- Basic Layout -->

  <form action="{{route('Add_User_Admin')}}" method="POST" enctype="multipart/form-data">
    @csrf
                        
    <div class="mb-3 d-flex justify-content-center">
        <label style="cursor: pointer" class="form-label" for="Image">
            <img src="{{asset('/public/images/users/default.png')}}" style="height: 150px;width: 150px;border-raduis:50%;" />
        </label>
        <input name="image" type="file" class="d-none" id="Image" />
    </div>

    <div class='my-2'>
        <label>
            Name
        </label>
        <input class="form-control" placeholder='User Name' name="name" required />
    </div>
    <div class='my-2'>
        <label>
            E-mail
        </label>
        <input class="form-control" type="email" placeholder='E-mail' name="email" required />
    </div>
    <div class='my-2'>
        <label>
            Password
        </label>
        <input class="form-control"  type="password" placeholder='Password' name="password" required />
    </div>
    <div class='my-2'>
        <label>
            Confirm Password
        </label>
        <input class="form-control" type="password" placeholder='Confirm Password' name="conf_pass" required />
    </div>
    <div class='my-2'>
        <label>
            Phone
        </label>
        <input class="form-control" placeholder='Phone' name="phone" required />
    </div>
    <div class='my-2'>
        <label>
            Identity
        </label>
        <input class="form-control" placeholder='Identity' name="identity" required />
    </div>
    <div class='my-2'>
        <label class="switch switch-success">
            <input type="checkbox" class="switch-input" name="material">
            <span class="switch-toggle-slider">
                <span class="switch-on">
                <i class="bx bx-check"></i>
                </span>
                <span class="switch-off">
                <i class="bx bx-x"></i>
                </span>
            </span>
            <span class="switch-label">Teacher Material</span>
        </label>
    </div>
    <div class='my-2'>
        <label class="switch switch-success">
            <input type="checkbox" class="switch-input" name="voice">
            <span class="switch-toggle-slider">
                <span class="switch-on">
                <i class="bx bx-check"></i>
                </span>
                <span class="switch-off">
                <i class="bx bx-x"></i>
                </span>
            </span>
            <span class="switch-label">Teacher Voice</span>
        </label>
    </div>
    <div class='my-2'>
        <label class="switch switch-success">
            <input type="checkbox" class="switch-input" name="powerpoint">
            <span class="switch-toggle-slider">
                <span class="switch-on">
                <i class="bx bx-check"></i>
                </span>
                <span class="switch-off">
                <i class="bx bx-x"></i>
                </span>
            </span>
            <span class="switch-label">Powerpoint</span>
        </label>
    </div>
    <div class='my-2'>
        <label class="switch switch-success">
            <input type="checkbox" class="switch-input" name="compress">
            <span class="switch-toggle-slider">
                <span class="switch-on">
                <i class="bx bx-check"></i>
                </span>
                <span class="switch-off">
                <i class="bx bx-x"></i>
                </span>
            </span>
            <span class="switch-label">Compress</span>
        </label>
    </div>
    <div class='my-2'>
        <label class="switch switch-success">
            <input type="checkbox" class="switch-input" name="upload">
            <span class="switch-toggle-slider">
                <span class="switch-on">
                <i class="bx bx-check"></i>
                </span>
                <span class="switch-off">
                <i class="bx bx-x"></i>
                </span>
            </span>
            <span class="switch-label">Upload</span>
        </label>
    </div>
    <div class='my-2'>
        <label class="switch switch-success">
            <input type="checkbox" class="switch-input" name="assign">
            <span class="switch-toggle-slider">
                <span class="switch-on">
                <i class="bx bx-check"></i>
                </span>
                <span class="switch-off">
                <i class="bx bx-x"></i>
                </span>
            </span>
            <span class="switch-label">Assign</span>
        </label>
    </div>

    <div class='my-3'>
        <button class='btn btn-primary'>
            Submit
        </button>
        <button class='btn btn-danger' type='reset'>
            Clear
        </button>
    </div>
  </form>

@endsection