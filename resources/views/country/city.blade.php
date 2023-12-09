

@extends('layouts/layoutMaster')
@php
    $admin='Minue';
@endphp
@section('title', 'City')

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
    

<div class="card-header border-bottom" >
        <button  type="button" class="btn btn-primary " data-bs-toggle="modal" style="float:right; " data-bs-target="#backDropModal">
                       Add New City
                        </button>
  
  <h5 class="card-title">City</h5>
    
<div class="card">

  <h5 class="card-header">City List</h5>
  <div class="card-datatable text-nowrap">
    <table class="datatables-ajax table table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>City Name</th>
          {{-- <th>Cities Dependet</th> --}}
          <th>country</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
            @php
                $count =1 ;
            @endphp
             @foreach($cities as $city)
              
        <tr>
        <td>{{ $count++ }}</td>
        <td>  {{ $city->city_name }} </td>
        <td>  
            @php
              $country_depend = DB::table('location')->where('id',$city->country)
              ->value('country_name');
            @endphp
             {{ $country_depend  }}
        </td>
        <td>   
          <button
                          type="button"
                          class="btn btn-info"
                          data-bs-toggle="modal"
                          data-bs-target="#modalCenter{{ $city ->id}}">
                             Edit
                        </button>  
                    <a href='{{route('deleteCity',['id'=>$city->id])}}' class="btn btn-danger">Delete</a>  
                          {{-- Start Edit With City  --}}
                          <div class="modal fade" id="modalCenter{{ $city ->id}}" tabindex="-1" aria-hidden="true">
                        <form action="{{ route('editCity') }}" method="post" enctype="multipart/form-data">
                          @csrf
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalCenterTitle">Edit City : {{ $city ->city_name}}</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col mb-3">
                                      <input type="hidden" name="id" value="{{ $city->id }}">
                                    <label for="nameWithTitle" class="form-label">{{ $city ->city_name}}</label>
                                    <input
                                      type="text"
                                      id="nameWithTitle"
                                      name="city_name"
                                      value="{{ $city ->city_name}}"
                                      class="form-control"
                                      placeholder="Enter Name" />
                                  </div>
                                </div>
                                <div class="row g-2">
                                  <div class="col mb-0">
                                      <!-- Basic -->
                                  <div class="col-md-6 mb-4">
                                    <label for="select2Basic" class="form-label">Basic</label>
                                    <select name='country'id="select2Basic" class="select2 form-select form-select-lg" data-allow-clear="true">
                                      @foreach($countries as $country)
                                      <option  value="{{ $country->id }}">{{ $country->country_name }}</option>
                                      @endforeach
                                    </select>
                                      </div>
                                    </div>
                                  </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                  Close
                                </button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                              </div>
                          </div>
                        </form>
                          </div>
                          {{-- End Edit With City  --}}
        </td>
      </tr>


           
        @endforeach
      
      </tbody>
    </table>
  </div>
         
</div>
 <div class="mt-2 text-center m-md-5" >
              {{ $cities->links() }}
          </div>
          
</div>


        
 {{-- Start Model About Add New Countries --}}
          <!-- Modal -->
                        <div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
                          <div class="modal-dialog">
                            <form class="modal-content" action='{{route('addCities')}}' method="post"  enctype="multipart/form-data">
                                @csrf
                              <div class="modal-header">
                                <h5 class="modal-title" id="backDropModalTitle">Add city</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col mb-3">
                                    <label for="nameBackdrop" class="form-label">city Name</label>
                                    <input
                                      type="text"
                                      id="nameBackdrop"
                                      class="form-control"
                                      name = "city_name"
                                      placeholder="Enter Country Name" />
                                  </div>
                                </div>
                                 <div class="col-md-6 mb-4">
                          <label for="select2Basic" class="form-label">Country Dependent</label>
                          <select id="select2Basic" name="country_debend" class="select2 form-select form-select-lg" data-allow-clear="true">
                               @foreach($countries as $country)
                            <option value="{{$country->id}}">{{$country->country_name}}</option>
                            @endforeach
                          </select>
                        </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                  Close
                                </button>
                                <button type="submit"  class="btn btn-primary">Savee</button>
                              </div>
                            </form>
                          </div>
                        </div>
       {{-- End Model About Add New Countries  --}}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
       
@endsection