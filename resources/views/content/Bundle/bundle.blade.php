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
              <div class="row bundle">
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Add Bundle</h5>
                      <small class="text-muted float-end">Default label</small>
                    </div>
                    <div class="card-body">
                      <form action="/add_bundle" method="POST" enctype="multipart/form-data">
                            @csrf

                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">Bundle Name</label>
                          <input name="name" type="text" class="form-control" id="basic-default-company" placeholder="Bundle Name" />
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-company">Price</label>
                            <input name="price" type="text" class="form-control" id="basic-default-company" placeholder="Price" />
                        </div>


                        <div class="mb-3">
                            <label class="form-label" for="basic-default-company">Category</label>
                            <select name="" class="category form-control">
                              @foreach($dataCategories as $item)
                                  <option value="{{ $item->id }}">
                                  {{ $item->category }}
                                  </option>
                              @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-company">Year</label>
                            <select name="category_id" class="year form-control">
                              @foreach($dataYear as $item)
                                  <option value="{{ $item->id }}">
                                  {{ $item->category }}
                                  </option>
                              @endforeach
                            </select>
                        </div>
                        <input type="hidden" class="dataYears" value="{{ $Years }}" />
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-company">Select Subjects</label>
                            <br />
                              @foreach($dataSubjects as $item)
                                <input type="checkbox" name="subject_id[]" id="{{ $loop->iteration }}" value="{{ $item->id }}" />
                                <label for="{{ $item->id }}">
                                  {{ $item->name }}
                                </label>
                                <br />
                              @endforeach
                        </div>
                        

                          <div class="form-check form-switch mb-2">
                            <input class="form-check-input" name="paid" value="1"
                            type="checkbox" id="paid"/>
                            <label class="form-check-label" for="paid">
                              paid
                            </label>
                          </div>
                          
                          <div class="form-check form-switch mb-2">
                            <input class="form-check-input" name="free" value="1"
                            type="checkbox" id="free"/>
                            <label class="form-check-label" for="free">
                              Free
                            </label>
                          </div>

                          <div class="form-check form-switch mb-2">
                            <input class="form-check-input" name="activate" value="1"
                            type="checkbox" id="activate" checked="" />
                            <label class="form-check-label" for="activate">
                              Activate
                            </label>
                          </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                        
                      </form>
                    </div>
                  </div>
                </div>
               
              </div>


              <script>
                let category = document.querySelector('.bundle .category');
                let year = document.querySelector('.bundle .year');
                let dataYears = document.querySelector('.bundle .dataYears');
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
              </script>

@endsection