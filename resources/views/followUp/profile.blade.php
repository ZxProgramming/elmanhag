








@extends('layouts/layoutMaster')
@php
    $followUp='FollowUp';
    $menuHorizontal='FollowUp';
@endphp
@section('title', 'Profile')

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
    @include('success')
@section('content')


            <div class="card mb-4">
                  
                <h5 class="card-header">Profile : {{  auth()->user()->name }}</h5>
                <!-- Account -->
                
                  <form id="formAccountSettings" action="{{ 'follow_up_Edit' }}" method="POST" enctype="multipart/form-data" >
                      @csrf
                      <input type="hidden" name="id" value = {{ auth()->user()->id }}>
                      <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                          <img
                            src="../public/images/users/{{ auth()->user()->image }}" alt="user-avatar"
                            class="d-block rounded"
                            height="100"
                            width="100"
                            id="uploadedAvatar" />
                          <div class="button-wrapper">
                      <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                        <span class="d-none d-sm-block">Upload new photo</span>
                        <i class="bx bx-upload d-block d-sm-none"></i>
                        <input
                          type="file"
                          id="upload"
                          name="imageProfile"
                          value="{{auth()->user()->image }}"
                          class="account-file-input"
                          hidden
                          />
                          
                      </label>
                  
                      
                    </div>
                  </div>
                </div>
                <hr class="my-0" />
                <div class="card-body">
                    <div class="row">
                      <div class="mb-3 col-md-6">
                        <label for="firstName" class="form-label">First Name</label>
                        <input
                          class="form-control"
                          type="text"
                          id="firstName"
                          name="name"
                          value="{{ auth()->user()->name }}"
                          placeholder="{{ auth()->user()->name }}"
                          autofocus />
                      </div>
                     
                      <div class="mb-3 col-md-6">
                        <label for="email" class="form-label">E-mail</label>
                        <input
                          class="form-control"
                          type="text"
                          id="email"
                          name="email"
                          value="{{ auth()->user()->email }}"
                          placeholder="{{ auth()->user()->email }}" />
                      </div>
                      <div class="mb-3 col-md-6">
                        <label class="form-label" for="Password">password</label>
                        <div class="input-group input-group-merge">
                       
                          <input
                            type="password"
                            id="Password"
                            name="password"
                            value=""
                            class="form-control"
                            placeholder="Enter Your New Password" />
                        </div>
                      </div>
                     
                          <input
                            type="hidden"
                            id="OldPassword"
                            name="oldPassword" 
                            value="{{auth()->user()->password}}"
                            class="form-control"
                            placeholder="Enter Your Old Password"
                             />
                        
                  
                      <div class="mb-3 col-md-6">
                        <label class="form-label" for="phoneNumber">Phone Number</label>
                        <div class="input-group input-group-merge">
                 
                          <input
                            type="text"
                            id="phoneNumber"
                            name="phoneNumber"
                            class="form-control"
                            value="{{ auth()->user()->phone }}"
                            placeholder="{{ auth()->user()->phone }}" />
                        </div>
                      </div>
                      <div class="mb-3 col-md-6">
                        <label class="form-label" for="phoneNumber">Parent Phone</label>
                        <div class="input-group input-group-merge">
                          <input
                            type="text"
                            id=""
                            name="parentPhone"
                            class="form-control"
                            value="{{ auth()->user()->parent_phone }}"
                            placeholder="{{ auth()->user()->parent_phone }}" />
                        </div>
                      </div>
                     
                     


                      <div class="mb-3 col-md-6">
                        <label for="state" class="form-label">ID</label>
                        <input class="form-control" 
                        type="text" 
                        id="state"
                         name="identity" 
                         value="{{ auth()->user()->identity }}"
                         placeholder="{{ auth()->user()->identity }}"
                          />
                      </div>
                  
                      {{-- <div class="mb-3 col-md-6">
                        
                        <label class="form-label" for="country">Country</label>
                                <select id="country" class="select2 form-select">
                                  <option value="">Select</option>
                                  <option value="Australia">Australia</option>
                                  <option value="Bangladesh">Bangladesh</option>
                                  <option value="Belarus">Belarus</option>
                                  <option value="Brazil">Brazil</option>
                                  <option value="Canada">Canada</option>
                                  <option value="China">China</option>
                                  <option value="France">France</option>
                                  <option value="Germany">Germany</option>
                                  <option value="India">India</option>
                                  <option value="Indonesia">Indonesia</option>
                                  <option value="Israel">Israel</option>
                                  <option value="Italy">Italy</option>
                                  <option value="Japan">Japan</option>
                                  <option value="Korea">Korea, Republic of</option>
                                  <option value="Mexico">Mexico</option>
                                  <option value="Philippines">Philippines</option>
                                  <option value="Russia">Russian Federation</option>
                                  <option value="South Africa">South Africa</option>
                                  <option value="Thailand">Thailand</option>
                                  <option value="Turkey">Turkey</option>
                                  <option value="Ukraine">Ukraine</option>
                                  <option value="United Arab Emirates">United Arab Emirates</option>
                                  <option value="United Kingdom">United Kingdom</option>
                                  <option value="United States">United States</option>
                                </select>
                      </div> --}}
                   

                  
                      {{-- <div class="mb-3 col-md-6">
                        <label for="currency" class="form-label">Currency</label>
                        <select id="currency" class="select2 form-select">
                          <option value="">Select Currency</option>
                          <option value="usd">USD</option>
                          <option value="euro">Euro</option>
                          <option value="pound">Pound</option>
                          <option value="bitcoin">Bitcoin</option>
                        </select>
                      </div> --}}
                    </div>
                    <div class="mt-2">
                      <button type="submit" class="btn btn-primary me-2">Edit</button>
                    </div>
                  </form>
                </div>
                <!-- /Account -->
              </div>
@endsection


