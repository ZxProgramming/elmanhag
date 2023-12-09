
@php

$count = null;
@endphp
@extends('layouts/layoutMaster')
@php
    $admin='Minue';
@endphp
@section('title', 'Country')

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
.newStyle {
color: rgb(0, 0, 0);
text-align: center;
}
.newStyle span{
color: #e42020;
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


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js" integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Users List Table -->
<div class="card">
@if(session()->has('msg'))
@php
echo session()->get('msg');
@endphp
@endif
@include('success')
    
  
<div class="card-header border-bottom" style="position: relative;">
       <button  type="button" class="btn btn-primary " data-bs-toggle="modal" style="float:right; " data-bs-target="#backDropModal">
                       Add New Countries
                        </button>
  
  <h5 class="card-title">Countries</h5>
    
<div class="card">

  <h5 class="card-header">Countries List</h5>
  <div class="card-datatable text-nowrap">
    <table class="datatables-ajax table table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Country Name</th>
          <th>Created_at</th>
          <th>Updated_at</th>
          <th class="">Action</th>
        </tr>
      </thead>
      <tbody>
            @php
                $count =1 ;
            @endphp
        @foreach($countries as $country)
          
        <tr>
        <td>{{ $count++ }}</td>
        <td>   {{ $country->country_name }}</td>
        <td>   {{ $country->created_at }}</td>
        <td>   {{ $country->updated_at }}</td>
        <td >   
          <button 
          class="btn btn-info"
            type="button"
            class="btn btn-primary"
            data-bs-toggle="modal"
            data-bs-target="#modals-transparent{{ $country->id }}"
          >Edit</button>  
          
          
          <a
           class="btn btn-danger"
            href="{{ route('deleteCounry',['id'=> $country->id ])}}"
            class="btn btn-primary"
        
           >Delete</a>  
           {{-- Start Model Edit Country --}}
            <div class="modal modal-transparent fade" id="modals-transparent{{ $country->id }}" tabindex="-1">
                          <div class="modal-dialog">
                            <div class="modal-content">
                            <form class="modal-content" action='{{route('editCountry',['id'=> $country->id ])}}' method="post"  enctype="multipart/form-data">
                                @csrf
                              <div class="modal-body">
                              
                                <a
                                  href="javascript:void(0);"
                                  class="btn-close text-white"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"></a>
                                <div class="input-group input-group-lg mb-3">
                                  <input
                                    type="text"
                                    class="form-control bg-white border-0"
                                    placeholder="Edit This Country : {{ $country->country_name }} "
                                    name = "name_update"
                                    aria-describedby="subscribe" />
                                  <button class="btn btn-primary" type="submit" id="subscribe">Edit</button>
                                </div>
                              </div>
                          </form>
                            </div>
                          </div>
                        </div>
           {{-- End Model Edit Country  --}}
        </td>
      </tr>
        @endforeach
      
      </tbody>
    </table>
  </div>
          <div class="mt-2 text-center m-md-5">
              {{ $countries->links() }}
          </div>
</div>

          
</div>  
 

        {{-- Start Model About Add New Countries --}}
          <!-- Modal -->
                        <div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
                          <div class="modal-dialog">
                            <form class="modal-content" action='{{route('addCountry')}}' method="post"  enctype="multipart/form-data">
                                @csrf
                              <div class="modal-header">
                                <h5 class="modal-title" id="backDropModalTitle">Modal title</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col mb-3">
                                    <label for="nameBackdrop" class="form-label">Country Name</label>
                                    <input
                                      type="text"
                                      id="nameBackdrop"
                                      class="form-control"
                                      name = "country_name"
                                      placeholder="Enter Country Name" />
                                  </div>
                                </div>
                              
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                  Close
                                </button>
                                <button type="submit"  class="btn btn-primary">Save</button>
                              </div>
                            </form>
                          </div>
                        </div>
       {{-- End Model About Add New Countries  --}}


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


@endsection