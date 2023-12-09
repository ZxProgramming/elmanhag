
@php
    $sub_iter = 0;
@endphp
@extends('layouts/layoutMaster')
@php
    $admin='Minue';
@endphp
@section('title', 'Techer List')

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

.images{
  border: 5px solid white;
  border-radius: 100px;
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
    <div class="card-header border-bottom">
        <h5 class="card-title">Teachers</h5>

{{-- <button type="reset" class="btn btn-primary btn-block glow users-list-clear mb-0" style="float:left;" data-bs-toggle="modal" data-bs-target="#filter_modal">Filter</button> --}}
        <button type="reset" class="btn btn-primary btn-block glow users-list-clear mb-0" style="float:right;" data-bs-toggle="modal" data-bs-target="#animationModal"><i class="bx bx-plus me-0 me-lg-2"></i>
          Add New Teacher
        </button>
    </div>
    <div class="card-datatable table-responsive" style="overflow-x: visible">
<table class="datatables-users border-top table" id="cm-list">
    <thead>
        <tr>
            <th>id</th>
            <th >Image</th>
            <th>Teacher Name</th>
            <th>Phone</th>
            <th>Subjects</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dataTeachers as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>
               <img  class="images" src="/public/images/users/{{ $item->image }}"width='200px' alt="">

                </td>
                <td>{{$item->name}}</td>
                <td>{{ $item->phone }}</td>
                <td>
                    @for($i = $sub_iter, $end = count($dataSubjects); $i < $end; $i++)
                        @if ( $dataSubjects[$i]->teacher_id == $item->id  )
                  <div class="col-lg-12">
                    <div class="demo-inline-spacing mt-3">
                           
                                <div class="list-group list-group-flush">
                                  <a href=""
                                  class=""
                                   data-bs-toggle="modal" 
                                  data-bs-target="#exampleModal{{ $dataSubjects[$i]->id }}"
                                   style="direction: rtl;"
                                  >
                                    <i class="fa-solid fa-delete-left fa-fade"></i>
                                          </a> 
                                  <a href="javascript:void(0);" class="list-group-item list-group-item-action">
                                   
                                    {{ $dataSubjects[$i]->name }} 
                                    
                                    
                                  </a>
                                  
                                </div>
                      </div>
                    </div>
                             {{-- Start Model Edit Subject  --}}

                             <div class="modal fade" id="exampleModal{{ $dataSubjects[$i]->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">!!! تنبيه </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                 <h5 class="text-center"> {{ $dataSubjects[$i]->name }}  هل انت متأكد من الغاء هذه المادة </h5>
                                  </div>
                                  <div class="modal-footer">
                                    <a style="color: white;" type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</a>
                                    <a  href="{{route('deleteTecher',['id'=>$dataSubjects[$i]->id]) }}" type="button" class="btn btn-danger">تعم</a>
                                  </div>
                                </div>
                              </div>
                            </div>
          {{-- End Model Edit Subject  --}}
                        @else
                    @php
                                $sub_iter = $i - 1;
                            @endphp
                        @endif
                    @endfor
                </td>
                <td>{{ $item->email }}</td>
                  

                <td>
                   
                    <button
                    type="button"
                    class="btn btn-primary"
                    data-bs-toggle="modal"
                    data-bs-target="#animationModal{{ $item->id }}">
                    Edit
                  </button>
                       <a class="btn btn-danger"  href="{{ route('deleteTecher',['id'=>$item->id ]) }}"> Delete </a>
                </td>
            </tr>
              

      {{-- Start Modale Edit Teacher --}}
             
 <div class="modal fade" id="animationModal{{ $item->id }}" tabindex="-1" style="direction: rtl;" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
 <div class="modal-header">
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="card-body">
          <form class="browser-default-validation" action="{{ route('editTeacher') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                  <input type="hidden"value='{{ $item->id }}'>
              <label class="form-label" for="basic-default-name">اسم المدرس</label>
              <input
                type="text"
                class="form-control"
                id="basic-default-name"
                name="name"
                value="{{$item->name}}"
                placeholder="{{$item->name}}"
                 />
            </div>
            <div class="mb-3">
              <label class="form-label" for="basic-default-email">ايميل المدرس</label>
              <input
                type="email"
                id="basic-default-email"
                class="form-control"
                name="email"
                placeholder="{{$item->email}}"
                value="{{$item->email}}"
                 />
            </div>
            <div class="mb-3 form-password-toggle">
              <label class="form-label" for="basic-default-password">كلمة المرور </label>
              <div class="input-group input-group-merge">
                  <input 
                  type="hidden"
                  name = "password" 
                  value="{{ $item->password }}"
                  />
                  <input 
                  type="hidden"
                  name = "id" 
                  value="{{ $item->id }}"
                  />
                <input
                  type="password"
                  id="basic-default-password"
                  class="form-control"
                  name = "password" 
                  placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                  aria-describedby="basic-default-password3"
                   />
                

                <span class="input-group-text cursor-pointer" id="basic-default-password3"><i class="bx bx-hide"></i></span>
              </div>
            </div>
           
        
          
            <div class="mb-3">
              <label class="form-label" for="basic-default-dob"> رقم تليفون المدرس</label>
              <input
                type="number"
                placeholder=  ' {{ $item->phone }}'
                class="form-control flatpickr-validation"
                id="basic-default-dob"
                name="phone"
                 />
            </div>
            <div class="mb-3">
              <label class="form-label" for="basic-default-upload-file">تعديل الصورة</label>
              <input type="file" name="image" class="form-control" id="basic-default-upload-file"  />
            </div>
              <div class="mb-3">
              <label class="form-label" for="basic-default-dob">نسبة المدرس</label>
              <input
                type="sales"
                placeholder="{{ $item->sales }}"
                class="form-control flatpickr-validation"
                id="basic-default-dob"
                 />
            </div>

         
            <div class="modal-footer">
              <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                Close
              </button>
              <button type="submit" class="btn btn-primary">تعديل</button>
            </div>
          </form>
    </div>
  </div>
</div>
{{-- End Modale Edit Teacher--}}

        
                       
        @endforeach
            </tbody>
        </table>
        <div class="mt-5 text-center">
          {{ $subject->links() }}
        </div>
    </div>
 


</div>
            

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


@endsection