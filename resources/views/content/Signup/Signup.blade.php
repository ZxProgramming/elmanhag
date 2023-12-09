@extends('layouts/layoutMaster')
@php
    $admin='Minue';
@endphp
@section('title', 'Sign Up')

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

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"
integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Users List Table -->
<div class="card">
@if (session()->has('msg'))
@php
echo session()->get('msg');
@endphp
@endif
@include('success')



{{-- <div class="card-header border-bottom">
<h5 class="card-title">Categories</h5>


<button type="reset" class="btn btn-primary btn-block glow users-list-clear mb-0" style="float:right;"data-bs-toggle="modal" data-bs-target="#EditLead"><i class="bx bx-plus me-0 me-lg-2"></i>Add New </button>
</div> --}}





{{-- <div class="col-lg-6">
<h5 class="card-title">Content</h5>
<div class="demo-inline-spacing mt-3">
@foreach ($sections as $section)
<div class="list-group">
<div class="list-group-item list-group-item-action active">{{$section->section}}</div>
@php
$contents = DB::table('contents')->where('section_id',$section->id)->get();
@endphp
@foreach ($contents as $content)
<div class="list-group-item list-group-item-action"><p>{{$content->lesson}}</p></div>
@endforeach
</div>
@endforeach
</div>
</div> --}}
<div class="card-header border-bottom">
<h5 class="card-title">Sign up</h5>

{{-- <button type="reset" class="btn btn-primary btn-block glow users-list-clear mb-0" style="float:left;" data-bs-toggle="modal" data-bs-target="#filter_modal">Filter</button> --}}


</div>
<div class="card-datatable table-responsive" style="overflow-x: visible">

    

{{--  Start This Is Collaps About Content  --}}
              <div class="row sign_up">
                
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                    </div>
                    <div class="card-body">
                      <form action="{{ route('AddSignup') }}" method="POST">
                            @csrf
                        <table>
                        <tr>
                          <td>
                            <label class="form-label" for="basic-default-company">type</label>
                            <select name="type" class="form-control" id="basic-default-company">
                              <option value=''>...</option>
                              <option value="Free">Free</option>
                              <option value="Paid">Paid</option>
                            </select>
                          </td>
                          <td>
                            <label class="form-label" for="basic-default-company">Country</label>
                            <select name="country" class="form-control country" id="basic-default-company">
                            @foreach( $countries as $item )  
                            <option value="{{$item->id}}">{{$item->country_name}}</option>
                            @endforeach
                            </select>
                          </td>
                        </tr>
                        
                        <tr>
                          <td>
                            <label class="form-label" for="basic-default-company">Purchase date</label>
                            <input name='purchase_date' class="form-control" type='date' />
                          </td>
                          <td>
                            <label class="form-label" for="basic-default-company">City</label>
                            <select name="city" class="form-control city" id="basic-default-company">
                            @foreach( $cities as $item )  
                            <option value="{{$item->id}}">{{$item->city_name}}</option>
                            @endforeach
                            </select>
                            <input type="hidden" class='cities_data' value="{{ $cities }}" />
                          </td>
                        </tr>
                        
                        <tr>
                          <td>
                            <label class="form-label" for="basic-default-company">User Name</label>
                            <input name='user_name' class="form-control" placeholder='User Nmae' />
                          </td>
                          <td>
                            <label class="form-label" for="basic-default-company">Grade</label>
                            <select name="grade" class="form-control category" id="basic-default-company">
                            @foreach( $grades as $item )  
                            <option value="{{$item->id}}">{{$item->category}}</option>
                            @endforeach
                            </select>
                          </td>
                        </tr>
                        
                        <tr>
                          <td>
                            <label class="form-label" for="basic-default-company">Email</label>
                            <input name='email' type='email' class="form-control" placeholder='Email' />
                          </td>
                          <td>
                            <label class="form-label" for="basic-default-company">Year</label>
                            <select name="year" class="form-control year" id="basic-default-company">
                            @foreach( $years as $item )
                            @if( $item->status == '1' )  
                              <option value="{{$item->id}}">{{$item->category}}</option>
                            @endif
                            @endforeach
                            </select>
                            <input type="hidden" class='dataYears' value="{{$years}}" />
                          </td>
                        </tr>

                        <tr>
                          <td>
                            <label class="form-label" for="basic-default-company">Password</label>
                            <input name='password' type='password' class="form-control" placeholder='Password' />
                          </td>
                          <td>
                            <label class="form-label" for="basic-default-company">Student Phone</label>
                            <input name='phone' class="form-control" placeholder='Phone' />
                          </td>
                        </tr>
                        
                        <tr>
                          <td>
                            <label class="form-label" for="basic-default-company">Parent Phone</label>
                            <input name='parent_phone' class="form-control" placeholder='Parent Phone' />
                          </td>
                          <td>
                            <label class="form-label" for="basic-default-company">Bundle</label>
                            <select name="bundle" class="form-control" id="basic-default-company">
                            <option value=''>...</option>
                            @foreach( $bundels as $item )  
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                            </select>
                          </td>
                          <td>
                            <label class="form-label" for="basic-default-company">Or Subject</label>
                            <select name="subject" class="form-control" id="basic-default-company">
                            <option value=''>...</option>
                            @foreach( $subjects as $item )  
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                            </select>
                          </td>
                        </tr>
                        
                        <tr>
                          <td>
                            <label class="form-label" for="basic-default-company">Follow Up</label>
                            <select name="follow_up" class="form-control" id="basic-default-company">
                            <option value=''>...</option>
                            @foreach( $follow_up as $item )  
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                            </select>
                          </td>
                        </tr>
                      </table>
                        <button type="submit" class="btn btn-primary mt-3">Send</button>
                      </form>
                    </div>
                  </div>
                </div>
               
              </div>
    



              <script>

                let category = document.querySelector('.sign_up .category');
                let year = document.querySelector('.sign_up .year');
                let dataYears = document.querySelector('.sign_up .dataYears');
                category.addEventListener('change', (e) => {
                  let year_val = e.target.value;
                  let years_val = dataYears.value;
                  years_val = JSON.parse(years_val);
                  year.innerHTML = null;
                  years_val.forEach(item => {
                    if(item.status == year_val){
                      year.innerHTML += `
                        <option value="${ item.id }">
                          ${ item.category }
                        </option>
                        `;
                    }
                  });
                })

                let country = document.querySelector('.sign_up .country');
                let city = document.querySelector('.sign_up .city');
                let cities_data = document.querySelector('.sign_up .cities_data');
                country.addEventListener('change', (e) => {
                  let country_val = e.target.value;
                  let city_val = cities_data.value;
                  city_val = JSON.parse(city_val);
                  city.innerHTML = null;
                  city_val.forEach(item => {
                    if(item.country == country_val){
                      city.innerHTML += `
                        <option value="${ item.id }">
                          ${ item.city_name }
                        </option>
                        `;
                    }
                  });
                })
              </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
     
    @endsection
    