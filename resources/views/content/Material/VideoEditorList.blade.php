
@extends('layouts/layoutMaster')
@php
    $admin='Minue';
@endphp
@section('title', 'Follow Up Lead')

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

.dt-button{
border: none;
border-radius: 4px;
padding: 0.5em 1em;
}
.imageFollowUp::before{
    contain:'';
    border: 13px red solid;
    width: 3000px;
    background: red;
    border-radius: 100px;
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
        <h5 class="card-title">Video Editor</h5>

    </div>
    <div class="card-datatable table-responsive" style="overflow-x: visible">
<table class="datatables-users border-top table" id="cm-list">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Subjects</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($video_editors as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->name}}</td>
                <td>{{ $item->phone }}</td>
                <td>
                  @php
                  $subjects = DB::table('user_subjects')
                  ->leftJoin('subjects', 'user_subjects.subject_id', '=', 'subjects.id')
                  ->where('user_id', $item->id)
                  ->get();
                  @endphp
                  @foreach( $subjects as $subject )
                  {{$subject->name}}
                  <br />
                  @endforeach
                </td>
             

                <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalCenter{{ $item->id }}">
                            Edit
                        </button>

                        <!-- Modal -->
                     
                    <a href="{{ route('deleteFollowUp',['id'=>$item->id]) }}" class="btn btn-danger">
                        Delete
                    </a>
                </td>
                
            </tr>



            @php
              $categories = DB::table('user_category')
              ->leftJoin('categories', 'user_category.category_id', '=', 'categories.id')
              ->where('user_id', $item->id)
              ->get();
            @endphp
            
            <div class="modal fade" id="modalCenter{{ $item->id }}" tabindex="-1" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modalCenterTitle">Modal title</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                  <div class="modal-body">
                      <div class="card-body">
                          <form method='POST' class="browser-default-validation" action="{{ route('editVideoEditor',['id'=> $item->id]) }}">
                          @csrf  
                          <div class="mb-3">
                              <label class="form-label" for="basic-default-name">Name</label>
                              <input
                                name='name'
                                type="text"
                                class="form-control"
                                id="basic-default-name"
                                name="name"
                                value="{{ $item->name }}"
                                placeholder="John Doe"
                                 />
                            </div>
                            <div class="mb-3">
                              <label class="form-label" for="basic-default-email">Email</label>
                              <input
                                name='email'
                                type="email" value="{{$item->email }}"
                                id="basic-default-email"
                                class="form-control"
                           
                                 />
                            <div class="mb-3">
                              <label class="form-label" for="basic-default-email">Phone</label>
                              <input
                                name='phone'
                                 value="{{$item->phone }}"
                                id="basic-default-email"
                                class="form-control"
                                 />
                            </div>
                            <div class="mb-3">
                              <label class="form-label" for="basic-default-email">ID</label>
                              <input
                                name='identity'
                                 value="{{$item->identity }}"
                                id="basic-default-email"
                                class="form-control"
                                 />
                            </div>
                            <div class="mb-3">
                              <label class="form-label" for="basic-default-email">Sales</label>
                              <input
                                name='sales'
                                 value="{{$item->sales }}"
                                id="basic-default-email"
                                class="form-control"
                                 />
                            </div>
                            <div class="mb-3 form-password-toggle">
                              <label class="form-label" for="basic-default-password">Password</label>
                              <div class="input-group input-group-merge">
                                <input
                                  name='password'
                                  type="password"
                                  id="basic-default-password"
                                  class="form-control"
                                  placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                  aria-describedby="basic-default-password3"
                                   />
                                <span class="input-group-text cursor-pointer" id="basic-default-password3"
                                  ><i class="bx bx-hide"></i
                                ></span>
                              </div>
                            </div>
                       
                     
                       <div class="mb-3">
                           @foreach($subjects as $element)
                             <label class="form-label" for="sub_1-default-upload-file{{$element->id}}">{{$element->name}}</label>
                             <input name="subjects[]" value='{{$element->id}}' type="checkbox" id="sub_1-default-upload-file{{$element->id}}" checked />
                           @endforeach
                           <br />
                           @foreach($all_subjects as $element)
                             <label class="form-label" for="sub_2-default-upload-file{{$element->id}}">{{$element->name}}</label>
                             <input name="subjects[]" value='{{$element->id}}' type="checkbox" id="sub_2-default-upload-file{{$element->id}}" />
                           @endforeach
                       </div>
                       <hr />
                     
                       <div class="mb-3">
                           @foreach($categories as $element)
                             <label class="form-label" for="cat1-default-upload-file{{$element->id}}">{{$element->category}}</label>
                             <input name="categories[]" value='{{$element->id}}' type="checkbox" id="cat1-default-upload-file{{$element->id}}" checked />
                           @endforeach
                           <br />
                           @foreach($all_categories as $element)
                             <label class="form-label" for="cat2-default-upload-file{{$element->id}}">{{$element->category}}</label>
                             <input name="categories[]" value='{{$element->id}}' type="checkbox" id="cat2-default-upload-file{{$element->id}}" />
                           @endforeach
                       </div>
                       
                     
                          
                         
                            <div class="row">
                              <div class="col-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                              </div>
                            </div>
                          </form>
                        </div>
                    </div>
                   
                  </div>
                </div>
              </div>
        @endforeach
            </tbody>
        </table>
       
    </div>
    <div class="mt-2 m-md-3 text-center">
        {{ $video_editors->links() }}
    </div>


</div>





@endsection