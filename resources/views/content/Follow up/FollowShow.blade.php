
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
        <h5 class="card-title">Follow Up</h5>

    </div>
    <div class="card-datatable table-responsive" style="overflow-x: visible">
<table class="datatables-users border-top table" id="cm-list">
    <thead>
        <tr>
            <th>#</th>
            <th>Images</th>
            <th>Follow</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Country, City</th>
            <th>Leader</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dataFollows as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>
                    <img class="imageFollowUp" src="/public/images/followUpLead/{{ $item->follow_image }}"width='200px' alt="">
     
                     </td>
                <td>{{$item->follow_name}}</td>
                <td>{{ $item->follow_phone }}</td>
                <td>{{ $item->follow_email }}</td>
                <td>
                    {{ $item->country_name }},
                    {{ $item->city_name }}
                </td>
                <td>
                   @if(  $item->Leader )
                    {{ $item->Leader }}
                   @else
                        <h4> Empty </h4>
                   @endif
                </td>
             

                <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalCenter{{ $item->follow_id }}">
                            Edit
                        </button>

                        <!-- Modal -->
                     
                    <a href="{{ route('deleteFollowUp',['id'=>$item->follow_id]) }}" class="btn btn-danger">
                        Delete
                    </a>
                </td>
                
            </tr>



            
            <div class="modal fade" id="modalCenter{{ $item->follow_id }}" tabindex="-1" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modalCenterTitle">Modal title</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                  <div class="modal-body">
                      <div class="card-body">
                          <form enctype="multipart/form-data" method="POST" class="browser-default-validation" action="{{ route('editFollowUp',['id'=> $item->follow_id]) }}">
                            @csrf
                            <div class="mb-3">
                              <label class="form-label" for="basic-default-name">Name</label>
                              <input
                                name='name'
                                type="text"
                                class="form-control"
                                id="basic-default-name"
                                value="{{ $item->follow_name }}"
                                placeholder="John Doe"
                                 />
                            </div>
                            <div class="mb-3">
                              <label class="form-label" for="basic-default-email">Email</label>
                              <input
                                name='email'
                                type="email" value="{{$item->follow_email }}"
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
                              <label class="form-label" for="basic-default-upload-file1">Leader</label>
                              <select name="follow_leader_id" class="form-control" id="basic-default-upload-file1">
                                <option value="{{ $item->leader_id }}">{{ $item->Leader }}</option>
                                @foreach($leaders as $element)
                                <option value="{{ $element->id }}">{{ $element->name }}</option>
                                @endforeach
                              </select>
                            </div>
                       
                     
                            <div class="mb-3">
                              <label class="form-label" for="basic-default-upload-file">Profile pic</label>
                              <input name="image" type="file" class="form-control" id="basic-default-upload-file" />
                            </div>
                          
                         
                         
                            <div class="mb-3">
                              <label class="switch switch-primary">
                                <input type="checkbox" class="switch-input" />
                                <span class="switch-toggle-slider">
                                  <span class="switch-on"></span>
                                  <span class="switch-off"></span>
                                </span>
                                <span class="switch-label">Send me related emails</span>
                              </label>
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
        {{ $dataFollows->links() }}
    </div>


</div>





@endsection