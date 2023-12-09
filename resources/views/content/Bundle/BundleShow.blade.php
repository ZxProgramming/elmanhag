
@php

$count = null;
@endphp
@extends('layouts/layoutMaster')
@php
    $admin='Minue';
@endphp
@section('title', 'Bundle')

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
<div class="card-header border-bottom" style="position: relative;">
<h5 class="card-title">Bundle</h5>


{{-- @php
$dataYear = DB::table('bundle_subjects')->where('status','1')->get();
@endphp --}}


@foreach ($databundle as $item)
@php
$dataCategory= DB::table('categories')->where('id',$item->category_id)->get();
  // echo "<pre>";
  //   print_r($databundle);
  // echo "</pre>";

@endphp
          {{-- ابتدائي --}}
    @if( $dataCategory[0]->status != $count )
      @php
        $count = $dataCategory[0]->status;
      @endphp
      @if( $dataCategory[0]->status == 1 )
            <span></span>
        <h1 class="text-center newStyle"><span>الصف</span> الابتدائي </h1>
      @elseif( $dataCategory[0]->status == 2 )
        <h1  class="text-center newStyle"> <span>الصف</span> اعدادى</h1>
      @elseif( $dataCategory[0]->status == 3 )
        <h1  class="text-center newStyle"> <span>الصف</span> ثانوى</h1>
      @endif
    </div>
    <div class="row">
    @endif
  <div class="col-12 col-sm-6 col-lg-4 mb-4">
    <div class="card">
      <div class="card-body text-center">
        <i class="mb-3 bx bx-md bx-bar-chart-alt-2"></i>
        <h5 class="className"> {{ $item->name }} : الباقة </h5>
        
      

            @if($item->Active == 1)
            <a href="{{ route('edit_actvate_Bundle',['id'=> $item->id ,'Active'=> '0' ] ) }}"  >
              <h3 style="color:#5aee5c;">Activated</h3>
            </a>
            @elseif ( $item->Active  == 0)
            <a href="{{ route('edit_actvate_Bundle',['id'=> $item->id ,'Active'=> '1' ] ) }}"  >
              <h3 style="color:#ee5a5a;">Not Activated</h3>
            </a>

            
          @endif
            
          
        <button


          type="button"
          class="btn btn-primary"
          data-bs-toggle="modal"
          data-bs-target="#pricingModal{{ $loop->iteration }}">
          Show
        </button>
      </div>
    </div>
  </div>

  
          












  <!-- Pricing Modal -->
<div class="modal " id="pricingModal{{ $loop->iteration }}" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-xl modal-simple modal-pricing">
<div class="modal-content bg-body p-2 p-md-5">
<div class="modal-body">
  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  <!-- Pricing Plans -->
  <div class="pricing-plans">
    <h2 class="text-center mb-3 mt-0 mt-md-4">
      <i class="fa-solid fa-w fa-fade"></i>
      <i class="fa-solid fa-e fa-fade"></i>
      <i class="fa-solid fa-g fa-fade"></i>
      <i class="fa-solid fa-o fa-fade"></i>
    </h2>
    <h1 class="text-center newStyle" style="direction: rtl;">
      <span style="direction: rtl;"> اسم الباقة</span>  : {{ $item->name }}   
   
    </h1>
   
    <div class="row mx-0 gy-3">
        <div class="nav-align-top mb-4">
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
              <button
                type="button"
                class="nav-link active"
                role="tab"
                data-bs-toggle="tab"
                data-bs-target="#navs-top-home{{ $item->id }}"
                aria-controls="navs-top-home"
                aria-selected="true">
                About Bundle
              </button>
            </li>
            <li class="nav-item">
              <button
                type="button"
                class="nav-link"
                role="tab"
                data-bs-toggle="tab"
                data-bs-target="#navs-top-profile{{ $item->id }}"
                aria-controls="navs-top-profile"
                aria-selected="false">
                Edit
              </button>
            </li>
            <li class="nav-item">
              <button
                type="button"
                class="nav-link"
                role="tab"
                data-bs-toggle="tab"
                data-bs-target="#navs-top-messages{{ $item->id }}"
                aria-controls="navs-top-messages"
                aria-selected="false">
                Messages
              </button>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane fade show active" id="navs-top-home{{ $item->id }}" role="tabpanel">
                <table class="table caption-top">
                    <caption>List of users</caption>
                    <thead>

                      <tr>

                        <th scope="col">اسم الباقة</th>
                        <th scope="col">price</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Grade</th>
                        <th scope="col">Teacher Precentage</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                      $bundleGetSubject = DB::table('bundle_subjects')->where('bundle_id',$item->id )->get();
                      
                          
                  @endphp
                  <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->price }} EGP</td>
                
                
                  
                    
                  <td>

                        @foreach ($bundleGetSubject as $databundle) 
                        @php
                  $subjectsBundles = DB::table('subjects')->where('id',$databundle->subject_id  )->get();
                  $categoryBundles = DB::table('categories')->where('id',$item->category_id   )->get();
                        // echo '<pre>';
                        //   print_r($categoryBundles );
                          
                        // echo '</pre>';
                        @endphp
                         <div class="col-lg-12">
                          <div class="demo-inline-spacing mt-3">
                            
                      @foreach($subjectsBundles as $subjectsBundle)
                          @foreach($categoryBundles as $categoryBundle)
                         
                               <!-- List group Icons -->
                               <ul class="list-group">
                                <li class="list-group-item d-flex align-items-center" style="display: flex;justify-content: space-between;">
                            {{ $subjectsBundle->name }} <a href="{{ route('deleteLanguageBundle',['id'=> $subjectsBundle->id]) }}"><i class="fa-solid fa-trash fa-beat-fade" style="color: #ff0000; "></i></a>

                          </li>
                          
                        </ul>
                   
                    <!--/ List group Icons -->
                      
                          @endforeach
                      @endforeach
                    </div>
                  </div>
                      @endforeach
                    </td>
                    <td class="list-item">
                      {{ $categoryBundle->category }}
                      
                      </td>
                    <td class="list-item">
                      {{ $item->teacher_precentage }}%
                      
                      </td>
                   
                    </tr>
               
                    </tbody>
                  </table>
            </div>

            <div class="tab-pane fade" id="navs-top-profile{{ $item->id }}" role="tabpanel">
              <div class="col-xl">
                <div class="card mb-4">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Bundle</h5>
                    <small class="text-muted float-end">Default label</small>
                  </div>
                  <div class="card-body">
                    <form  action="{{ route('edit_actvate_Bundle',['id'=>$item->id ]) }}" method="POST" enctype="multipart/form-data">
                      @csrf
                    
                      <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">اسم الباقة</label>
                        <input type="text"
                          class="form-control" 
                        id="basic-default-fullname"
                        name='bundleName'
                        value="{{ $item->name }}"
                          placeholder="{{ $item->name }}" />
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="basic-default-company">price</label>

                        <input type="number" 
                        class="form-control" 
                        id="basic-default-company"
                        name="bundlePrice" value="{{ $item->price }}"
                          placeholder="{{ $item->price }} EGP" />
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="basic-default-company">Teacher Precentage</label>

                        <input type="number" 
                        class="form-control" 
                        id="basic-default-company"
                        name="teacher_precentage" value="{{ $item->teacher_precentage }}"
                          placeholder="{{ $item->price }} EGP" />
                      </div>
                      <div class="mb-3">
                      @if($item->paid == '1' ) 
                                    <div class="form-check form-switch mb-2">
                                      <input class="form-check-input" name="paid"  value = "0"   
                                      type="checkbox" id="paid" checked=''/>
                                      <label class="form-check-label"  for="paid" >
                                        paid{{ $item->paid }}
                                      </label>
                                    </div>
                                        @else
                                        <div class="form-check form-switch mb-2">
                                          <input class="form-check-input" name="paid"  value="1" 
                                          type="checkbox" id="paid"/>
                                          <label class="form-check-label" for="paid">
                                            paid{{ $item->paid }}
                                          </label>
                                        </div>

                                        @endif

                                            @if($item->free === '1' ) 
                                            {{ $item->free }}
                                            <div class="form-check form-switch mb-2">
                                              <input class="form-check-input" name="free"  value = "0"   
                                              type="checkbox" id="free{{ $item->free }}" checked=''/>
                                              <label class="form-check-label"  for="free{{ $item->free }}" >
                                                free{{ $item->free }}
                                              </label>
                                            </div>
                                                @else
                                                <div class="form-check form-switch mb-2">
                                                  <input class="form-check-input" 
                                                  name="free"  value="1" 
                                                  type="checkbox" id="free{{ $item->free }}"/>
                                                  <label class="form-check-label" for="free{{ $item->free }}">
                                                    free{{ $item->free }}
                                                  </label>
                                                </div>

                                                @endif
                                        




                                
                        
                  
                              
                    
                  
                      </div>
                      <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                  </div>
                </div>
              </div>
          
            </div>



            <div class="tab-pane fade" id="navs-top-messages{{ $item->id }}" role="tabpanel">
              <p>
                Oat cake chupa chups dragée donut toffee. Sweet cotton candy jelly beans macaroon gummies
                cupcake gummi bears cake chocolate.
              </p>
              <p class="mb-0">
                Cake chocolate bar cotton candy apple pie tootsie roll ice cream apple pie brownie cake. Sweet
                roll icing sesame snaps caramels danish toffee. Brownie biscuit dessert dessert. Pudding jelly
                jelly-o tart brownie jelly.
              </p>
            </div>
          </div>
        </div>

  

    
    </div>
  </div>
  <!--/ Pricing Plans -->
</div>
</div>
</div>
</div>
<!--/ Pricing Modal -->


@endforeach

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


@endsection