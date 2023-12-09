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
<h5 class="card-title">Section</h5>

{{-- <button type="reset" class="btn btn-primary btn-block glow users-list-clear mb-0" style="float:left;" data-bs-toggle="modal" data-bs-target="#filter_modal">Filter</button> --}}


</div>
<div class="card-datatable table-responsive" style="overflow-x: visible">

    

{{--  Start This Is Collaps About Content  --}}
        <div class="container" style="direction: rtl;">
          <button type="reset" class="btn btn-primary btn-block glow users-list-clear mb-0" style="float:right;" data-bs-toggle="modal" data-bs-target="#animationModal"><i class="bx bx-plus me-0 me-lg-2"></i>
            اضافة وحدة جديدة
            </button>
          
            @foreach ($sections as $section)
        
            @php
            $sections = DB::table('sections')->where('id',$id)->first();
            $contents = DB::table('contents')->where('section_id',  $section->id )->get();

                @endphp
<br>
<br>
<br>
                  <div class="container">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                              <a href="" data-toggle="modal" data-target="#exampleModal{{ $section->id }}">
                                <i class="fa-solid fa-trash fa-beat-fade" ></i>
                              </a>
                              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#d{{ $section->id }}" aria-expanded="true" aria-controls="1">
                              
                              <a href="modals-transparent{{ $section->id }}" data-bs-toggle="modal" data-bs-target="#modals-transparent{{ $section->id }}">
                                <i class="fa-solid fa-pen-to-square fa-fade"></i></a>
                              
                            
                               &nbsp {{  $section->section }} 
                                
                            
                            </button>
                      
                          
                          </h2>
                            <div id="d{{ $section->id }} "class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="container">
                                   

                                    {{-- Start Table Lessons --}}
                                    <table class="table">
                                        <thead>
                                          <tr>
                                            
                                              <th scope="col">الدرس</th>
                                              <th scope="col">الاسبوع</th>
                                              <th scope="col">الشهر</th>
                                            <th scope="col">وقت الأستحقاق</th>
                                            <th scope="col"> Actions</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                       
                                                    @foreach($contents as $content)
                                          <tr>  

                                                    <td>{{ $content->lesson }}</td>
                                                    <td>{{ $content->week }} </td>
                                                    <td>{{ $content->month }}</td>
                                                  <td>{{ $content->due_date }}</td> 
                                                    <td>
                                                       
                                                    <a href="/deleteLesson/{{ $content->id }}">
                                                      <i class="fa-solid fa-trash fa-fade"></i>
                                                    </a>
                                                       &nbsp
                                                     <button type="button" class="btn text-primary" data-bs-toggle="modal" data-bs-target="#modalTop{{ $content->id }}">
                                                      <i class="fa-solid fa-pen-to-square fa-fade"></i>
                                                     </button>
                                                    </td>
             </tr>

                                                    @endforeach
                                              
                                      
                                       
                                        </tbody>
                                      </table>
                                    {{-- End  Table Lessons --}}
                                 </div>
                            </div>
                            </div>
                        </div>
                        
                </div>
                  </div>


                    <!-- Modal template -->
<div class="modal modal-transparent fade" id="modals-transparent{{ $section->id }}" tabindex="-1">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-body">
                                <a
                                  href="javascript:void(0);"
                                  class="btn-close text-white"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"></a>
                                <p class="text-white text-large fw-light mb-3">تعديل : {{ $section->section }}</p>
                                <form  class="modal-content" method="POST" action="{{ route('editSection') }}" enctype="multipart/form-data">
                                  @csrf
                                <div class="input-group input-group-lg mb-3">
                                  <input
                                    type="text"
                                    class="form-control bg-white border-0"
                                    placeholder="{{ $section->section }}"
                                    aria-describedby="subscribe" 
                                    name="section"
                                    />
                                  <input
                                    type="hidden"
                                    class="form-control bg-white border-0"
                                    value="{{ $section->id }}"
                                    name="section_id"
                                    aria-describedby="subscribe" />
                                  <input
                                    type="hidden"
                                    class="form-control bg-white border-0"
                                    value="{{ $id }}"
                                    name="subject_id"
                                    aria-describedby="subscribe" />
                                  </div>
                                  <button type="submit"  class="btn btn-primary" type="button" id="subscribe">تعديل</button>
                                </form>
                                
                              </div>
                            </div>
                          </div>
</div>
                     <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTop{{ $section->id  ?? 'None'}}">
                       اضافة درس جديد
                     </button>              
         {{-- Start Modle To Add Lessons  --}}
         <div class="modal modal-top fade" id="modalTop{{ $section->id ?? 'None' }}" tabindex="-1">
         <div class="modal-dialog">
         <form class="modal-content" method="POST" action="{{ route('addLesson') }}" enctype="multipart/form-data">
         @csrf
         <div class="modal-header">
         <h5 class="modal-title" id="modalTopTitle">اضافة درس جديد</h5>
         <button
         type="button"
         class="btn-close"
         data-bs-dismiss="modal"
         aria-label="Close"></button>
         </div>
         <div class="modal-body">
         <div class="row">
         <div class="col mb-3">
         <label for="nameSlideTop" class="form-label">{{ $section->section ?? 'None'}}</label>
         <input
         type="text"
         id="nameSlideTop"
         class="form-control"
         name="lesson"
         placeholder="اكتب اسم الدرس" />
         </div>
         </div>
         <div class="row g-2">
         
         <div class="col mb-0">
         <input type="hidden" id="nameSlideTop" class="form-control" value={{ $section->id?? 'None' }}
         name="section_id" />
         <input type="hidden" id="nameSlideTop" class="form-control" value={{ $id }}
         name="content_id" />
         </div>
         </div>
         </div>
         <div class="modal-footer">
         <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
         Close
         </button>
         <button type="submit" class="btn btn-primary">Save</button>
         </div>
         </form>
         </div>
         </div>


        <!-- Modal -->
<div class="modal fade animate__animated animate__jackInTheBox" id="animationModal" tabindex="-1" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
 <div class="modal-content" style="overflow-y: scroll">
     <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel5">اضافة وحدة</h5>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
     </div>
     <form method="POST" id="leads_form" action="{{ route('addChapter') }}" enctype="multipart/form-data">
         @csrf
         <div class="modal-body">
             <div class="row">
             <div class="col mb-3">
                 <label for="nameAnimation" class="form-label">اسم الوحدة</label>
                 <input type="text" name="section" id="name" class="form-control lead_input" required placeholder="اكتب اسم الوحدة">
             </div>
             </div>
             <input type="hidden" name="subject_id" value={{$id ?? 'None' }} >
               {{ $id }}
             {{-- <div class="row">
             <div class="col mb-3">
                 <label class="form-label">Category(Subject)</label>
                 <select name="category_id" class="form-control">
                     <option value="">Category(Subject)</option>
                     @php
                     $subjects=DB::table('subjects')->get();
                     @endphp
                     @foreach ($subjects as $subject)
                     @php
                         $category=DB::table('categories')->where('id',$subject->category_id)->first();
                     @endphp
                     <option value="{{$subject->id}}">{{$category->category}} ({{$subject->name}})</option>
                     @endforeach
                 </select>
             </div>
             </div> --}}



         <div class="modal-footer">
             <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">الغاء</button>
             <button type="submit" class="btn btn-primary" id="add_lead_btn">اضاقة</button>
         </div>
     </form>
 </div>
 </div>
 </div>

 <!--Buttons-->


 <div class="modal fade animate__animated animate__jackInTheBox" id="buttons_modal" tabindex="-1"
 aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
     <div class="modal-content" style="overflow-y: scroll">
         <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel5">Contact Popup</h5>
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
             <div class="row">
                 <div class="col mb-3 d-flex justify-content-center">
                     <button class="btn btn-success">Book</button>
                 </div>
                 <div class="col mb-3 d-flex justify-content-center">
                     <button class="btn btn-success">Request</button>
                 </div>
             </div>
             <div class="row">
                 <div class="col mb-3 d-flex justify-content-center">
                     <button class="btn btn-danger" id="btn_later">Later</button>
                 </div>
             </div>
         </div>
     </div>
 </div>
 </div>

 </div>


         {{--  Start Delete Section  --}}
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal{{ $section->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
 <div class="modal-content">
   <div class="modal-header">
     <h5 class="modal-title" id="exampleModalLabel">سوف يتم مسح هذه الوحدة نهائيا </h5>
 
   </div>
   <div class="modal-body">
      
   
    <form method="POST" id="leads_form" action="{{ route('deleteSection') }}" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="section_id" value="{{ $section->id }}">
      <input type="hidden" name="subject_id" value="{{ $id }}">
      <button type="submit" class="btn btn-primary" id="add_lead_btn">مسح</button>
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
   
    </form>
   </div>
  
 </div>
</div>
</div>
     {{-- End Delet Section  --}}
                    
              <!--/ Extended Modals -->



            {{-- Start This modals Cause Edit Lessons --}}
            <div class="modal modal-top fade" id="modalTop{{ $content->id ?? 'None'}}" tabindex="-1">
              <div class="modal-dialog">
                <form class="modal-content" method="post" action="{{ route('updateLesson') }}">
                  @csrf
                  <div class="modal-header">
                    <h5 class="modal-title" id="modalTopTitle">تعديل الدرس {{ $content->lesson ?? 'None'}}</h5>
                    <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="modal"
                      aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      <div class="col mb-3">
                        <label for="nameSlideTop" class="form-label">تعديل اسم الدرس </label>
                        <input
                          type="text"
                          id="nameSlideTop" name="lesson"
                          class="form-control" value="{{ $content->lesson ?? 'Null'}}"
                          placeholder="Enter Name" />
                      </div>
                      <div class="col mb-3">
                        <label for="nameSlideTop" class="form-label">تعديل وقت الأستحقاق</label>
                        <input
                          type="date"
                          id="nameSlideTop" name="due_date"
                          class="form-control" value="{{ $content->due_date ?? 'Null'}}"
                          placeholder="Enter Name" />
                      </div>
                    </div>
                    <div class="row g-2">
                      <div class="col mb-0">
                        <label for="emailSlideTop" class="form-label">Month</label>
                        <input
                          type="date"
                          id="emailSlideTop" name="month"
                          value="{{ $content->month ?? 'Null'}}"
                          class="form-control"
                          placeholder="xxxx@xxx.xx" />
                      </div>
                      <div class="col mb-0">
                        <label for="dobSlideTop" class="form-label">Week</label>
                        <input type="text" 
                        name="week" value="{{ $content->week ?? 'Null' }}" id="dobSlideTop" class="form-control" />
                      </div>
                        <input type="hidden" 
                        name="id" value="{{ $content->id ?? 'Null'}}"  />
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                      Close
                    </button>
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
                </form>
              </div>
            </div>
            {{-- End This modals Cause Edit Lessons --}}

             @endforeach
        
                     {{--  This Modale When inde Edit Or Delete Or Update ^_^  --}}
               
                      
{{--  End Modle To Add Lessons  --}} 
    {{--  End This Is Collaps About Content  --}}



                     




                       





    <div class="modal fade animate__animated animate__jackInTheBox" id="animationModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content" style="overflow-y: scroll">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel5">اضافة وحدة</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form method="POST" id="leads_form" action="{{ route('addChapter') }}" enctype="multipart/form-data">
              @csrf
              <div class="modal-body">
                  <div class="row">
                  <div class="col mb-3">
                      <label for="nameAnimation" class="form-label">اسم الوحدة</label>
                      <input type="text" name="section" id="name" class="form-control lead_input" required placeholder="اكتب اسم الوحدة">
                  </div>
                  </div>
                  <input type="hidden" name="subject_id" value="{{$id ?? 'None' }}" >
              <div class="modal-footer">
                  <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">الغاء</button>
                  <button type="submit" class="btn btn-primary" id="add_lead_btn">اضاقة</button>
              </div>
          </form>
      </div>
      </div>
      </div>
    




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



{{-- <script>

let phone = $("#phone");
let nationality = $("#nationality");
let email = $("#email");
let name = $("#name");

$(phone).keyup(function(){
let number = phone.val();

$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$.ajax({
type:'POST',
url:"{{ route('get_leads') }}",
data:{number:number},
dataType: "json",
success:function(data){
if(data == null){
$(".lead_input").val("");
$(".lead_input").attr("readonly", false)
}else{
console.log(data)
$(".lead_input").attr("readonly", true)
email.val(data.lead['email']);
name.val(data.lead['name']);
}
}
});
})

$("#leads_form").submit(function(e){
e.preventDefault();
$("#buttons_modal").modal("show");
});
$("#btn_later").click(function(){
$("#leads_form").submit();
})
</script> --}}
@endsection
