








@extends('layouts/layoutMaster')

@section('title', 'Follow Up')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/animate-css/animate.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/moment/moment.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-responsive/datatables.responsive.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-buttons/datatables-buttons.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.js')}}"></script>
<script src="{{asset('assets/vendor/libs/jszip/jszip.js')}}"></script>
<script src="{{asset('assets/vendor/libs/pdfmake/pdfmake.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-buttons/buttons.html5.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-buttons/buttons.print.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
<script src="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
@endsection
@php
    $followUp='FollowUp';
    $menuHorizontal='FollowUp';
@endphp
@section('page-script')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
.dt-buttons{
width: fit-content;
float: left;
margin-inline-start: 1em
}
.dt-button{
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

function popup(id){
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
 window.location = '/delete-lead/'+id;
}
})
}
</script>
<!--<script src="{{ asset('assets/js/ui-modals.js') }}"></script>-->
<!--<script src="{{ asset('assets/js/app-user-list.js') }}"></script>-->
@endsection
@if(session()->has('msg'))
@php
echo session()->get('msg');
@endphp
@endif

@section('content')
 
@include('success')
Welcome  : {{ auth()->user()->name }}


<div class="col-xxl">
    <div class="card mb-4">
      <h5 class="card-header">Sign Up ADD</h5>
      <form class="card-body" action="{{ route('signUpAdd') }}" method="POST"  enctype="multipart/form-data">
        @csrf
        <h6 class="mb-b fw-normal">1. Sign Up Information</h6>
        <div class="row mb-3">
          <label class=" col-form-label" for="multicol-username">Username</label>
          <div class="col-sm-9">
            <input type="text" name="name" id="multicol-username" class="form-control" placeholder="Enter UserName Student" />
          </div>
        </div>
        <div class="row mb-3">
          <label class=" col-form-label" for="multicol-email">Email</label>
          <div class="col-sm-9">
            <div class="input-group input-group-merge">
              <input
                type="text"
                id="multicol-email"
                class="form-control"
                name="email"
                placeholder="Enter Email Student"
                aria-label="john.doe"
                aria-describedby="multicol-email2" />
              <span class="input-group-text" id="multicol-email2">@example.com</span>
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <label class=" col-form-label" for="multicol-email">Student Phone</label>
          <div class="col-sm-9">
            <div class="input-group input-group-merge">
              <input
                type="number"
                id="multicol-email"
                name="phone"
                class="form-control"
                placeholder="Enter Student Phone"
                aria-describedby="multicol-email2" />
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <label class=" col-form-label" for="multicol-email">Parent Phone</label>
          <div class="col-sm-9">
            <div class="input-group input-group-merge">
              <input
                type="number"
                id="multicol-email"
                name="parent_phone"
                class="form-control"
                placeholder="Enter Student Parent Phone"
                aria-describedby="multicol-email2" />
            </div>
          </div>
        </div>
     

        <div class="col-md-9">
          <label class="form-label" for="multicol-birthdate">Purchase date </label>
          <input
            type="date"
            name="purchase_date"
            id="multicol-birthdate"
            class="form-control dob-picker"
            placeholder="YYYY-MM-DD" />
        </div>
          <br>
          <br>
          <label class="switch switch-success">
                            
            <input type="checkbox" name="paid" value="Paid" class="switch-input"  />
            <span class="switch-toggle-slider">
              <span class="switch-on">
                <i class="bx bx-check"></i>
              </span>
              <span class="switch-off">
                <i class="bx bx-x"></i>
              </span>
            </span>
            <span class="switch-label">paid</span>
          </label>
        
        <hr class="my-4 mx-n4" />
        <h6 class="mb-3 fw-normal">2. Sign Up Details</h6>

        <div class="mb-2 col-md-4">
            <label class="form-label" for="basic-default-company">Country</label>
            <select class="countries form-control" name="countries">
                @foreach($countries as $item)
                    <option value="{{ $item->id }}">
                        {{ $item->country_name }}
                    </option>
                @endforeach
            </select>
          <input type="hidden" class="cities_data" value="{{ $cities }}" />
              <label class="form-label" for="basic-default-company">Cities</label>
              <select class="cities form-control" name="cities">
                  @foreach($cities as $item)
                      <option value="{{ $item->id }}">
                          {{ $item->city_name }}
                      </option>
                  @endforeach
              </select>
              <input type="hidden" class="dataYears" value="{{ $dataYear }}" />
              <div class="mb-3 mb-2 ">
  
                <label class="form-label" for="basic-default-company">Grade</label>
                  <select name="grade" class="category form-control">
                    @foreach($dataYear as $item)
                      @if( $item->status == '0' )
                      <option value="{{ $item->parent }}">
                      {{ $item->category }}
                      </option>
                      @endif
                    @endforeach
                  </select>
              </div>
              <div class="mb-3 mb-2 ">
  
                <label class="form-label" for="basic-default-company">Year</label>
                  <select name="year" class="year form-control">
                    @foreach($dataYear as $item)
                    @if( $item->status != '0' )
                        <option value="{{ $item->id }}">
                        {{ $item->category }}
                        </option>
                        @endif
                    @endforeach
                  </select>
              </div>
            </div>

              <div class="mb-3 mb-2 col-4 ">
  
                <label class="form-label" for="basic-default-company">Bundles</label>
                  <select name="bundle" class="year form-control" >
                    @foreach($bundles as $bundle)
                   
                        <option value="{{ $bundle->id }}" title=" Price : {{ $bundle->price }}">
                        {{ $bundle->name }}
                        </option>
                    @endforeach
                  </select>
              </div>
            </div>
           
     <script>
      let category = document.querySelector('.category');
      let year = document.querySelector('.year');
      let dataYears = document.querySelector('.dataYears');
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

      let countries = document.querySelector('.countries');
      let cities = document.querySelector('.cities');
      let cities_data = document.querySelector('.cities_data');
      cities_data = cities_data.value;
      cities_data = JSON.parse(cities_data);
      countries.addEventListener('change', () => {
          cities.innerHTML = null;
        cities_data.forEach( item => {
          if ( item.country == countries.value ) {
            cities.innerHTML += `
            <option value="${item.id}">${item.city_name}</option>
            `;
          }
        });
      })
     </script>
      
        <div class="pt-4">
          <div class="row justify-content-end">
            <div class="col-sm-5">
              <button type="submit" class="btn btn-primary me-sm-2 me-1">Submit</button>
              <button type="reset" class="btn btn-label-secondary">Cancel</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  
  <script>
    let countries = document.querySelector('.followup .countries');
    let cities = document.querySelector('.followup .cities');
      countries.addEventListener('change', (e) => {
        let cities_data = document.querySelector('.followup .cities_data');
        cities_data = cities_data.value;
        cities_data = JSON.parse(cities_data)
        let countries_val = e.target.value;
        console.log(countries_val);

        cities.innerHTML = null;
        cities_data.forEach(item => {
          if(item.country == countries_val){
            cities.innerHTML += `
              <option value="${ item.id }">
                ${ item.city_name }
              </option>
              `;
          }
        });
      })
    </script>
@endsection


