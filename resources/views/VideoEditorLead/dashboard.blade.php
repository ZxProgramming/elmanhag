@extends('layouts/layoutMaster')
@php
    $VideoEditorLead='VideoEditor';
    $menuHorizontal='VideoEditor';
@endphp
@section('title', 'Subjects')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/animate-css/animate.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/lesson/lesson.css') }}" />

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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
<!-- Vendor -->

<link rel="stylesheet" href="../../assets/vendor/libs/formvalidation/dist/css/formValidation.min.css" />
<!-- Helpers -->
<script src="../../assets/vendor/js/helpers.js"></script>

<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
<script src="../../assets/js/config.js"></script>
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
$(document).ready(function(){
    
    $("#check-prog-ve").change(function(){
                if (this.checked) {
                    console.log("true");
                    $("#spa-done-ve").removeClass("d-none");
                }else{
                    console.log("false");
                    $("#spa-done-ve").addClass("d-none");
                }
            }
        )

        $("#check-done-ve").change(function(){
                if (this.checked) {
                    console.log("true");
                    $("#chi5").removeClass("d-none");
                    $("#spa-prog-ve").addClass("d-none");
                }else{
                    console.log("false");
                    $("#spa-prog-ve").removeClass("d-none");
                    $("#chi5").addClass("d-none");
                }
            }
        )
        $("#check-prog-vf").change(function(){
                if (this.checked) {
                    console.log("true");
                    $("#spa-done-vf").removeClass("d-none");
                }else{
                    console.log("false");
                    $("#spa-done-vf").addClass("d-none");
                }
            }
        )

        $("#check-done-vf").change(function(){
                if (this.checked) {
                    console.log("true");
                    $("#chi6").removeClass("d-none");
                    $("#spa-prog-vf").addClass("d-none");
                }else{
                    console.log("false");
                    $("#spa-prog-vf").removeClass("d-none");
                    $("#chi6").addClass("d-none");
                }
            }
        )
})
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

@section('content')
<div class="card">
    @if (session()->has('msg'))
        @php
            echo session()->get('msg');
        @endphp
    @endif
    @section('content')
        @include('success')
        <!-- Basic Layout -->
            {{-- Section 1 --}}
            <form method="POST" action="{{route('video_lead_material')}}">
                @csrf
            <div class="container par">
                <div class="section1">
                    <div class="col-md-12 row">
                        <div class="col-md-4 grad-sec">
                            <span>Grad</span>
                            <select name="grad" id="grad-sel" class="form-control sel_grade">
                                <option value="" selected disabled>Select category</option>
                                @foreach ($years as $year)
                                    @if ($year->status == "0")
                                    <option value="{{$year->parent}}">{{$year->category}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 year-sec">
                            <span>Year</span>
                             <select name="year" class="form-control sel_year">
                                <option value="" selected disabled>Sub category</option>
                                @foreach ($years as $year)
                                    @if ($year->status !== "0")
                                    <option value="{{$year->id}}">{{$year->category}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                            <input type="hidden" value="{{$years}}" class="year_val">
                        <input type="hidden" value="{{$subjects}}" class="subjects_val" />
                        <input type="hidden" value="{{$sections}}" class="sections_val" />
                        <input type="hidden" value="{{$lesson}}" class="lesson_val" /> 
                        <div class="col-md-4 subject-sec">
                            <span>Subject</span>
                            <select name="subject" id="subject-sel" class="form-control sel_subjects">
                                <option value="" selected disabled>select your subject</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-12 row">
                            <div class="col-md-4 section-sec">
                                <span>Section</span>
                                <select name="section" id="section-sel" class="form-control sel_sections">
                                    <option value="" selected>select your Section</option>
                                </select>
                            </div>
                            <div class="col-md-4 lesson-sec">
                                <span>Lesson</span>
                                <select name="lesson_id" id="lesson-sel" class="form-control sel_lesson">
                                    <option value="" selected>select your Lesson</option>
                                </select>
                            </div>
                            <div class="col-md-4 filter-btn">   
                                <div class="col-md-7 d-flex justify-content-between">
                                    <span class="p-1">Due Date</span>
                                    <input type="text" class="btn col-md-6 p-1" id="due-date" value="12/10"/>
                                </div>
                                <div class="col-md-4 d-flex justify-content-end">
                                    <button class="btn btn-secondary filter_btn" id="btn-filter" style="width: 100%">Filter</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
            {{-- Section 1 ////--}}


      
      
<script>
    let vd_section = document.querySelector('.vd_section');
    let vd_l_section = document.querySelector('.vd_l_section');
    let filter_btn = document.querySelector('.filter_btn');
    let sel_grade = document.querySelector('.sel_grade');
    let sel_year = document.querySelector('.sel_year');
    let sel_subjects = document.querySelector('.sel_subjects');
    let sel_sections = document.querySelector('.sel_sections');
    let sel_lesson = document.querySelector('.sel_lesson');
    let year_val = document.querySelector('.year_val');
    let subjects_val = document.querySelector('.subjects_val');
    let sections_val = document.querySelector('.sections_val');
    let lesson_val = document.querySelector('.lesson_val');
    let updates = document.querySelector('.updates');
    
    filter_btn.addEventListener('click', () => {
        let obj = {lesson_id: sel_lesson.value,
        user_id: {{$user_id}}};
        vd_l_section.classList.remove('d-none');
        vd_section.classList.remove('d-none');
        $.ajax({
            type: 'POST',
            url: "{{route('lesson_v_data')}}",
            data: obj,
            success:function(res){
                console.log(res);
                let data = res[0];
                let data2 = res[1];
                data2.forEach(item => {
                    let sel_user4 = document.querySelector('.sel_user4');
                    let u_progress_date4 = document.querySelector('.u_progress_date4');
                    let u_done_date4 = document.querySelector('.u_done_date4');
                    let u_done_duration4 = document.querySelector('.u_done_duration4');
                    sel_user4.innerHTML += `
                    <option value="${item.user_id}" selected>${item.name}</option>`;
                    u_progress_date4.value = item.progress_date;
                    u_done_date4.value = item.done_date;
                    u_done_duration4.value = item.done_duration;
                });
                data.forEach(item => {
                    let sel_user5 = document.querySelector('.sel_user5');
                    let progress_date5 = document.querySelector('.progress_date5');
                    let done_date5 = document.querySelector('.done_date5');
                    let done_duration5 = document.querySelector('.done_duration5');
                    sel_user5.innerHTML += `
                    <option value="${item.user_id}" selected>${item.name}</option>`;
                    progress_date5.value = item.progress_date;
                    done_date5.value = item.done_date;
                    done_duration5.value = item.done_duration; 
                });
            }
        })
    })
    sel_grade.addEventListener('change', () => {
        let years = year_val.value;
        years = JSON.parse(years);
        let grade = sel_grade.value;
        sel_year.innerHTML = `
        <option value="" selected disabled>Sub category</option>
        `;
        years.forEach(item => {
            if ( item.status == grade ) {
        sel_year.innerHTML += `
            <option value="${item.id}">${item.category}</option>
            `;
            }
        });
    })
    sel_year.addEventListener('change', () => {
        let subjects = subjects_val.value;
        subjects = JSON.parse(subjects);
        let year_val = sel_year.value;
        sel_subjects.innerHTML = `
        <option value="" selected disabled>select your subject</option>
        `;
        subjects.forEach(item => {
            if ( item.category_id == year_val ) {
                sel_subjects.innerHTML += `
            <option value="${item.id}">${item.name}</option>
            `;
            }
        });
    })
    sel_subjects.addEventListener('change', () => {
        let sections = sections_val.value;
        sections = JSON.parse(sections);
        let section_val = sel_subjects.value;
        sel_sections.innerHTML = `
        <option value="" selected disabled>select your Section</option>
        `;
        sections.forEach(item => {
            if ( item.subject_id == section_val ) {
                sel_sections.innerHTML += `
            <option value="${item.id}">${item.section}</option>
            `;
            }
        });
    })
    sel_sections.addEventListener('change', () => {
        let lessons = lesson_val.value;
        lessons = JSON.parse(lessons);
        let section_val = sel_sections.value;
        sel_lesson.innerHTML = `
        <option value="" selected disabled>select your Lesson</option>
        `;
        lessons.forEach(item => {
            if ( item.section_id == section_val ) {
                sel_lesson.innerHTML += `
            <option value="${item.id}">${item.lesson}</option>
            `;
            }
        });
    })
</script>
@endsection


        



@endsection


