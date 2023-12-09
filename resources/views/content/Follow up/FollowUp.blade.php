@extends('layouts/layoutMaster')
@php
    $admin='Minue';
@endphp
@section('title', 'Follow Up Leader')

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
              <div class="row followup">
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Add Follow Up</h5>
                      <small class="text-muted float-end">Default label</small>
                    </div>
                    <div class="card-body">
                      <form action="{{ route('follow_add') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                        
                            <div class="mb-3">
                                <label style="cursor: pointer" class="form-label" for="Image">
                                    <h4>
                                    Select Image
                                    </h4>
                                </label>
                                <input name="image" type="file" class="d-none" id="Image" />
                            </div>

                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Follow Up Name</label>
                          <input name="name" type="text" class="form-control" id="basic-default-company" placeholder="Follow Up Name" />
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-company">Phone</label>
                            <input name="phone" type="text" class="form-control" id="basic-default-company" placeholder="Phone" />
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-company">Email</label>
                            <input name="email" type="email" class="form-control" id="basic-default-company" placeholder="Email" />
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-company">ID</label>
                            <input name="ID" type="text" class="form-control" id="basic-default-company" placeholder="ID" />
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-company">Password</label>
                            <input name="password" type="password" class="form-control" id="basic-default-company" placeholder="Password" />
                        </div>
                        <div class="mb-3">
                          <input name="image" type="file" class="d-none" id="teacher_img" />
                        <label class="btn" for="teacher_img">
                            <h3>
                            أختر صورة
                            </h3>
                        </label>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-company">Country</label>
                            <select class="countries form-control" name="countries">
                                @foreach($countries as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->country_name }}
                                    </option>
                                @endforeach
                            </select>
                          </div>
                          <input type="hidden" class="cities_data" value="{{ $cities }}" />
                          <div class="mb-3">
                              <label class="form-label" for="basic-default-company">Cities</label>
                              <select class="cities form-control" name="cities">
                                  @foreach($cities as $item)
                                      <option value="{{ $item->id }}">
                                          {{ $item->city_name }}
                                      </option>
                                  @endforeach
                              </select>
                            </div>
                             
                          <div class="mb-3">
                            <label class="form-label" for="basic-default-company">Follow Up Leader</label>
                            <select class="cities form-control" name="follow_leader_id">
                                <option>
                                  ...
                                </option>
                                @foreach($dataFollows as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
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
                        <table class="mb-3">
                            <tr>
                                <td class='px-2 py-3'>
                                <label class="form-label" for="basic-default-company">Salary</label>
                                </td>
                                <td class='px-2 py-3'>
                                <input name="salary" type="text" class="form-control" id="basic-default-company" placeholder="Salary" />
                                </td>
                                <td class='px-2 py-3'>
                                <label class="form-label" for="basic-default-company">Free Traget</label>
                                </td>
                                <td class='px-2 py-3'>
                                <input name="free_target" type="text" class="form-control" id="basic-default-company" placeholder="Free Traget" />
                                </td>
                                <td class='px-2 py-3'>
                                <label class="form-label" for="basic-default-company">Above</label>
                                </td>
                                <td class='px-2 py-3'>
                                <input name="free_above" type="text" class="form-control" id="basic-default-company" placeholder="Above" />
                                </td>
                                <td class='px-2 py-3'>
                                <label class="form-label" for="basic-default-company">Bonus</label>
                                </td>
                                <td class='px-2 py-3'>
                                <input name="free_bonus" type="text" class="form-control" id="basic-default-company" placeholder="Bonus" />
                                </td>
                            </tr>
                            <tr>
                                <td rowspan="2">
                                <label class="form-label" for="basic-default-company">Sales %</label>
                                </td>
                                <td rowspan="2">
                                <input name="sales" type="text" class="form-control" id="basic-default-company" placeholder="Sales %" />
                                </td>
                                <td rowspan="2">
                                <label class="form-label" for="basic-default-company">Paid Target</label>
                                </td>
                                <td rowspan="2">
                                <input name="paid_target" type="text" class="form-control" id="basic-default-company" placeholder="Paid Target" />
                                </td>
                                <td class='px-2'>
                                <label class="form-label" for="basic-default-company">Above</label>
                                </td>
                                <td class='px-2'>
                                <input name="above_1" type="text" class="form-control" id="basic-default-company" placeholder="Above" />
                                </td>
                                <td class='px-2'>
                                <label class="form-label" for="basic-default-company">Bonus</label>
                                </td>
                                <td class='px-2'>
                                <input name="bonus_1" type="text" class="form-control" id="basic-default-company" placeholder="Bonus" />
                                </td>
                            </tr>
                            <tr>
                                
                                <td class='px-2 py-1'>
                                    <label class="form-label" for="basic-default-company">Above</label>
                                    </td>
                                    <td class='px-2 py-1'>
                                    <input name="above_2" type="text" class="form-control" id="basic-default-company" placeholder="Above" />
                                    </td>
                                    <td class='px-2 py-1'>
                                    <label class="form-label" for="basic-default-company">Bonus</label>
                                    </td>
                                    <td class='px-2 py-1'>
                                    <input name="bonus_2" type="text" class="form-control" id="basic-default-company" placeholder="Bonus" />
                                    </td>
                            </tr>
                        </table>
                        
                        <button type="submit" class="btn btn-primary">Send</button>
                        
                      </form>
                    </div>
                  </div>
                </div>
               
              </div>


@endsection