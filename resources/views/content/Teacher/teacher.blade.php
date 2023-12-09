@extends('layouts/layoutMaster')
@php
    $admin='Minue';
@endphp
@section('title', 'Teacher')

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


<script src="../../assets/vendor/libs/jquery/jquery.js"></script>
<script src="../../assets/vendor/libs/popper/popper.js"></script>
<script src="../../assets/vendor/js/bootstrap.js"></script>
<script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

<script src="../../assets/vendor/libs/hammer/hammer.js"></script>

<script src="../../assets/vendor/libs/i18n/i18n.js"></script>
<script src="../../assets/vendor/libs/typeahead-js/typeahead.js"></script>

<script src="../../assets/vendor/js/menu.js"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="../../assets/vendor/libs/select2/select2.js"></script>
<script src="../../assets/vendor/libs/tagify/tagify.js"></script>
<script src="../../assets/vendor/libs/bootstrap-select/bootstrap-select.js"></script>
<script src="../../assets/vendor/libs/typeahead-js/typeahead.js"></script>
<script src="../../assets/vendor/libs/bloodhound/bloodhound.js"></script>

<!-- Main JS -->
<script src="../../assets/js/main.js"></script>

<!-- Page JS -->
<script src="../../assets/js/forms-selects.js"></script>
<script src="../../assets/js/forms-tagify.js"></script>
<script src="../../assets/js/forms-typeahead.js"></script>

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
              <div class="row teacher">
                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                    </div>
                    <div class="card-body">
                <h1 class="text-center">Teacher</h1>
                <br>
                <br>

                      <form action="/AddTeacher" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="mb-3">
                          <input name="image" type="file" class="d-none" id="teacher_img" />
                        <label class="btn" for="teacher_img">
                            <h3>
                            أختر صورة
                            </h3>
                        </label>
                        </div>

                        <div class="mb-3">
                            <input type="hidden" name='position' value="teacher">
                          <label class="form-label" for="basic-default-company">أسم المدرس</label>
                          <input name="name" type="text" class="form-control" id="basic-default-company" placeholder="أسم المدرس" />
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-company">تليفون المدرس</label>
                            <input name="phone" type="text" class="form-control" id="basic-default-company" placeholder="تليفون المدرس" />
                        </div>

                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">الايميل</label>
                          <input name="email" type="email" class="form-control" id="basic-default-company" placeholder="الايميل" />
                        </div>

                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">الرقم السرى</label>
                          <input name="password" type="password" class="form-control" id="basic-default-company" placeholder="الرقم السرى" />
                        </div>

                        <div class="mb-3">
                          <label class="form-label" for="basic-default-company">نسبة المعلم %</label>
                          <input name="sales" type="text" class="form-control" id="basic-default-company" placeholder="نسبة المعلم %" />
                        </div>

                        <input type="hidden" value="{{ $dataYears }}" class="dataYears">
                        <div class="mb-3">
                          
                            <label class="form-label" for="basic-default-company">Grade</label>
                            <select name="category" class="category form-control">
                              @foreach($dataCategories as $item)
                                  <option value="{{ $item->parent }}" data-type="{{ $item->category }}">
                                  {{ $item->category }}
                                  </option>
                              @endforeach
                            </select>
                        </div>
                        <div class="mb-3">

                          <label class="form-label" for="basic-default-company">Year</label>
                            <select name="year" class="year form-control">
                              @foreach($dataYear as $item)
                                  <option value="{{ $item->status }}">
                                  {{ $item->category }}
                                  </option>
                              @endforeach
                            </select>
                        </div>
                        <div class="mb-3">

                            <div class="col-lg-6">
                              <b class=" fw-bold">Subjects</b>
                              <div class="demo-inline-spacing mt-3">
                                <div class="list-group">
                                    @foreach($dataSubjects as $item)
                                          
                                    <label class="list-group-item{{ $item->id }}">
                                      <input class="form-check-input me-1" name="subject[]" type="checkbox" value="{{ $item->id }}" />
                                      {{ $item->name }}
                                    </label>
                                @endforeach 
                                </div>
                              </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Send</button>
                      </form>
                    </div>
                  </div>
                </div>
               
             
              </div>


              <script>

                let category = document.querySelector('.teacher .category');
                let year = document.querySelector('.teacher .year');
                let dataYears = document.querySelector('.teacher .dataYears');
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
              {{-- @livewire('post') --}}
@endsection