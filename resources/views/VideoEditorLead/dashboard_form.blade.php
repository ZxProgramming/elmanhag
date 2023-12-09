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
                                    <input type="text" class="btn col-md-6 p-1" id="due-date" value="M: {{$lesson_data->month}} W: {{$lesson_data->week}}"/>
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

            <form method="POST" action="{{route('video_lead_add')}}">
            {{-- Section2-3 --}}
            <div class="container section3 vd_section mt-3 par" id="chi4">
                  <div class="col-md-12 row">

                        {{-- chi-section1 --}}
                        <div class="col-md-4 d-flex align-items-start chi-section1">
                            <span class="col-md-3 mt-2">Video Edit</span>
                            <span class="col-md-3 mt-2">Video Editor</span>
                            <div class="col-md-6">
                                <select name="sel_user4" id="sel-ve" class="form-control sel_user4">
                                    <option value="" selected disabled>Select Editor</option>
                                    @foreach( $video_editor as $item )
                                    <option value="{{$item->id}}">
                                        {{$item->name}}
                                    </option>
                                    @endforeach 
                                    <option value="{{@$arr->id}}" selected>
                                        {{@$arr->name}}
                                    </option>
                                </select>
                            </div>
                        </div>
                        {{-- chi-section1 --}}

                            {{-- chi-section2 --}}
                        <div class="col-md-4 d-flex align-items-start chi-section2" style="justify-content: space-evenly;">
                              
                                 <div class="col-md-6 d-flex justify-content-around align-items-start mt-2">
                                    <label class="switch col-md-1.1">
                                    <input type="checkbox" id="check-prog-ve"/>
                                    <span class="slider" id="spa-prog-ve">
                                        <svg
                                        class="slider-icon"
                                        viewBox="0 0 32 32"
                                        xmlns="http://www.w3.org/2000/svg"
                                        aria-hidden="true"
                                        role="presentation"
                                        >
                                        <path fill="none" d="m4 16.5 8 8 16-16"></path>
                                        </svg>
                                    </span>
                                    </label>
                                    <span class="col-md-3">Date</span>
                                </div>

                                <div class="col-md-6 pa-duration">

                                
                                    <div class="row" id="duration-1">
                                        <div class="col-md-7">
                                            <input value="{{@$arr->progress_date}}" name="u_progress_date4" type="date" id="dat-ve1" class="form-control u_progress_date4"/>
                                        </div>
                                        
                                        <div class="col-md-5 p-0">
                                            <input name="u_duration4" value="{{@$arr->progress_duration}}" type="number" id="duration-ve1" class="form-control u_duration4" style="width: 75px;" placeholder="Duration"/>
                                        </div>

                                        <div class="col-md-12  mt-2 duration-bt btn-duration1">
                                            <div class="d-flex col-md-6 align-items-center justify-content-around">
                                                <label class="container-check">
                                                    <input type="checkbox">
                                                    <div class="checkmark"></div>
                                                </label>
                                                <span>freelancer</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                        </div>
                            {{-- chi-section2 --}}

                            {{-- chi-section3 --}}
                        <div class="col-md-4 d-flex align-items-start chi-section3" style="gap: 10px"> 
                                    <label class="switch col-md-1.1 mt-2">
                                    <input type="checkbox" id="check-done-ve"/>
                                    <span class="slider d-none" id="spa-done-ve">
                                        <svg
                                        class="slider-icon"
                                        viewBox="0 0 32 32"
                                        xmlns="http://www.w3.org/2000/svg"
                                        aria-hidden="true"
                                        role="presentation"
                                        >
                                        <path fill="none" d="m4 16.5 8 8 16-16"></path>
                                        </svg>
                                    </span>
                                    </label>
                            <div class="col-md-4">
                                <input name="u_done_date4" value="{{@$arr->done_date}}" type="date" id="dat-done-ve" class="form-control u_done_date4"/>
                            </div>
                            <div class="col-md-5 d-flex align-items-center">
                                <span class="col-md-6 px-1">Duration</span>
                                <input name="u_done_duration4" value="{{@$arr->done_duration}}" id="dur-done-ve" style="width: 75px" class="form-control u_done_duration4" placeholder="Duration"/>
                            </div>
                        </div>
                            {{-- chi-section3 --}}
                        
                    </div>
                
            </div>
            {{-- Section2-3 ////--}}




            {{-- Section2-4 --}}
            <div class="container vd_l_section d-flex flex-column mt-3 par" style="gap: 10px" id="chi5">
                <div class="col-md-12 row chi2">

                        {{-- chi-section1 --}}
                        <div class="col-md-4 d-flex align-items-center chi-section1">
                            <span class="col-md-3">Video final</span>
                            <span class="col-md-3">video leader</span>
                            <div class="col-md-6">
                                <select name="sel_user5" id="sel-vl" class="form-control sel_user5">
                                    @foreach( $video_editor_leader as $item )
                                    <option value="{{$item->id}}">
                                        {{$item->name}}
                                    </option>
                                    @endforeach
                                    <option value="{{@$data->id}}" selected>
                                        {{@$data->name}}
                                    </option>
                                </select>
                            </div>
                        </div>
                            {{-- chi-section1 --}}

                            {{-- chi-section2 --}}
                        <div class="col-md-4 d-flex align-items-center chi-section2">
                            <div class="col-md-6 d-flex justify-content-around align-items-center">
                                    <label class="switch col-md-1.1">
                                    <input type="checkbox" id="check-prog-vf"/>
                                    <span class="slider" id="spa-prog-vf">
                                        <svg
                                        class="slider-icon"
                                        viewBox="0 0 32 32"
                                        xmlns="http://www.w3.org/2000/svg"
                                        aria-hidden="true"
                                        role="presentation"
                                        >
                                        <path fill="none" d="m4 16.5 8 8 16-16"></path>
                                        </svg>
                                    </span>
                                    </label>
                                    <span class="col-md-3">Date</span>
                            </div>
                            <div class="col-md-6">
                                <input type="date" value="{{@$data->progress_date}}" name="progress_date5" id="dat-vl" class="form-control progress_date5"/>
                            </div>
                        </div>
                            {{-- chi-section2 --}}

                            {{-- chi-section3 --}}
                        <div class="col-md-4 d-flex align-items-center chi-section3" style="gap: 10px">
                                    <label class="switch col-md-1.1">
                                    <input type="checkbox" id="check-done-vf"/>
                                    <span class="slider d-none" id="spa-done-vf">
                                        
                                        <svg
                                        class="slider-icon"
                                        viewBox="0 0 32 32"
                                        xmlns="http://www.w3.org/2000/svg"
                                        aria-hidden="true"
                                        role="presentation"
                                        >
                                        <path fill="none" d="m4 16.5 8 8 16-16"></path>
                                        </svg>
                                    </span>
                                    </label>
                            <div class="col-md-4">
                                <input type="date" value="{{@$data->done_date}}" name="done_date5" id="dat-done-vl" class="form-control done_date5"/>
                            </div>
                           <div class="col-md-5 d-flex align-items-center">
                                <span class="col-md-4 px-1">Size</span>
                                <input name="done_duration5" value="{{@$data->done_duration}}" id="siz-vf-vl" style="width: 75px" class="form-control done_duration5" placeholder="Size"/>
                            </div>
                        </div>
                            {{-- chi-section3 --}}
                        
                    </div>
            </div>
            {{-- Section2-4 --}}


      
            
 

      

            {{-- Section-btn-submit --}}
            <div class="mt-3 d-flex justify-content-end align-items-center">
                <input type="submit" value="Submit" class="btn btn-secondary" id="btn-sub">
            </div>
            {{-- Section-btn-submit ////--}}
        </div>
    </div>
</form>
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


