
@php
$TeacherMenu = 12;
@endphp
@extends('layouts/layoutMaster')

@section('title', 'Teacher')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/animate-css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/lesson/lesson.css') }}" />
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
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>


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

    <script>
    $(document).ready(function() {
        const addButton1 = $('#btn-slide1');
        const addButton2 = $('#btn-slide2');
        const container = $('#show-adds');
        

        addButton1.click(function(){
        
           const newitem=$(`<div class="col-md-7">
                                    <input type="date" id="dat-user" class="form-control"/>
                                </div>
                                
                                <div class="col-md-5 px-1">
                                    <input type="number" id="slide-teacher" class="form-control ml-2" style="width: 75px;"/>
                                </div>

                                <div class="col-md-12 mt-2 slide-bt">
                                    <button type="button" class="button" id="btn-slide2">
                                        <span class="button__text">Add Slide</span>
                                      <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg"><line y2="19" y1="5" x2="12" x1="12"></line><line y2="12" y1="12" x2="19" x1="5"></line></svg></span>
                                    </button>
                                </div>`);

            addButton1.remove();
            container.append(newitem);
        });
    });
    $(document).ready(function(){
/* Add-Slides */
        $("#btn-slide1").click(function(){
            $("#slide-2").removeClass("d-none");
            $(".btn-slide1").hide();
        })
        $("#btn-slide2").click(function(){
            $("#slide-3").removeClass("d-none");
            $(".btn-slide2").hide();
        })
        $("#btn-slide3").click(function(){
            $("#slide-4").removeClass("d-none");
            $(".btn-slide3").hide();
        })
        $("#btn-slide4").click(function(){
            $("#slide-5").removeClass("d-none");
            $(".btn-slide4").hide();
        })
        $("#btn-slide5").click(function(){
            $("#slide-6").removeClass("d-none");
            $(".btn-slide5").hide();
        })
        $("#btn-slide6").click(function(){
            $("#slide-7").removeClass("d-none");
            $(".btn-slide6").hide();
        })
        $("#btn-slide7").click(function(){
            $("#slide-8").removeClass("d-none");
            $(".btn-slide7").hide();
        })
        $("#btn-slide8").click(function(){
            $("#slide-9").removeClass("d-none");
            $(".btn-slide8").hide();
        })
        $("#btn-slide9").click(function(){
            $("#slide-10").removeClass("d-none");
            $(".btn-slide9").hide();
        })
        $("#btn-slide10").click(function(){
            $("#slide-11").removeClass("d-none");
            $(".btn-slide10").hide();
        })
        /* Add-Slides// */
        
        /* Add-Duration */
        $("#btn-duration1").click(function(){
            $("#duration-2").removeClass("d-none");
            $("#btn-duration1").hide();
        })
        $("#btn-duration2").click(function(){
            $("#duration-3").removeClass("d-none");
            $("#btn-duration2").hide();
        })
        $("#btn-duration3").click(function(){
            $("#duration-4").removeClass("d-none");
            $("#btn-duration3").hide();
        })
        $("#btn-duration4").click(function(){
            $("#duration-5").removeClass("d-none");
            $("#btn-duration4").hide();
        })
        $("#btn-duration5").click(function(){
            $("#duration-6").removeClass("d-none");
            $("#btn-duration5").hide();
        })
        $("#btn-duration6").click(function(){
            $("#duration-7").removeClass("d-none");
            $("#btn-duration6").hide();
        })
        $("#btn-duration7").click(function(){
            $("#duration-8").removeClass("d-none");
            $("#btn-duration7").hide();
            console.log("Hello")
        })
        $("#btn-duration8").click(function(){
            $("#duration-9").removeClass("d-none");
            $("#btn-duration8").hide();
        })
        $("#btn-duration9").click(function(){
            $("#duration-10").removeClass("d-none");
            $("#btn-duration9").hide();
        })
        $("#btn-duration10").click(function(){
            $("#duration-11").removeClass("d-none");
            $("#btn-duration10").hide();
        })
        /* Add-Duration// */


        /* subCategory */
        $("#grad-sel").change(function(){
            console.log($("#grad-sel").val())
        

            if ($("#grad-sel").val() == "1") {
                $("#year-sel-all").addClass("d-none");
                $("#year-sel2").addClass("d-none");
                $("#year-sel3").addClass("d-none");
                $("#year-sel1").removeClass("d-none");
                console.log($("#year-sel1").val())
            }
            if ($("#grad-sel").val() == "2") {
                $("#year-sel-all").addClass("d-none");
                $("#year-sel1").addClass("d-none");
                $("#year-sel3").addClass("d-none");
                $("#year-sel2").removeClass("d-none");
                console.log($("#year-sel2").val())
            }
            if ($("#grad-sel").val() == "3") {
                $("#year-sel-all").addClass("d-none");
                $("#year-sel1").addClass("d-none");
                $("#year-sel2").addClass("d-none");
                $("#year-sel3").removeClass("d-none");
                console.log($("#year-sel3").val())
            }
       
       
        })
        /* subCategory/// */
        
        /* Subject */


        /* Subject/// */
    })
    </script>
    <!--<script src="{{ asset('assets/js/ui-modals.js') }}"></script>-->
    <!--<script src="{{ asset('assets/js/app-user-list.js') }}"></script>-->
@endsection

<div class="card">
    @if (session()->has('msg'))
        @php
            echo session()->get('msg');
        @endphp
    @endif
    @section('content')
        @include('success')

        <form action="{{route('TMaterialsEdit')}}" method="POST">
            @csrf
            <div class="container par lesson">
                <div class="section1">
                    <div class="col-md-12  row">
                        <div class="col-md-4 grad-sec">
                            <span>Grad</span>
                            <select name="grad" class="form-control grad_sel">
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

                            <select name="year" class="year_sel form-control">
                                <option value="" selected disabled>Sub category</option>
                                @foreach ($years as $year)
                                    @if ($year->status == "1")
                                    <option value="{{$year->id}}">{{$year->category}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 subject-sec">
                            <span>Subject</span>
                            <select name="subject" class="form-control subject_sel">
                                <option value="" selected disabled>select your subject</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-12 row">
                            <div class="col-md-4 section-sec">
                                <span>Section</span>
                                <select name="section" class="form-control section_sel">
                                    <option value="" selected>select your section</option>
                                </select>
                            </div>
                            <div class="col-md-4 lesson-sec">
                                <span>Lesson</span>
                                <select name="lesson" class="form-control lesson_sel">
                                    <option value="" selected>select your Lesson</option>
                                </select>
                            </div>
                            <input type="hidden" value="{{$years}}" class="year_val">
                            <input type="hidden" class='subjects_val' value="{{$subjects}}" />
                            <input type="hidden" class='sections_val' value="{{$sections}}" />
                            <input type="hidden" class='lesson_val' value="{{$lesson}}" />
                            <div class="col-md-4 filter-btn">   
                                <div class="col-md-7 d-flex justify-content-between">
                                    <span class="p-1">Due Date</span>
                                    <input type="text" class="btn col-md-6 p-1" id="due-date" value="12/10"/>
                                </div>
                                <div class="col-md-4 d-flex justify-content-end">
                                    <button type="button" class="btn btn-secondary filter_btn" id="btn-filter" style="width: 100%">Filter</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
{{-- Section2-1 --}}
            <div class="container  lesson_sections d-none mt-3 par">
                    {{-- first child --}}
                <div class='material_sec'>
                    <div class="col-md-12 row chi1">
                        {{-- chi-section1 --}}
                        <div class="col-md-2 d-flex align-items-center chi-section1">
                            <span class="col-md-4">Material</span>
                        </div>
                            {{-- chi-section1 --}}

                            {{-- chi-section2 --}}
                        <div class="col-md-4 d-flex align-items-center chi-section2">
                            <div class="col-md-6 d-flex justify-content-around align-items-center">
                                    <label class="switch col-md-1.1">
                                    <input type="checkbox" />
                                    <span class="slider">
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
                                <input type="date" name="progress_date1" id="dat-teacher" class="form-control"/>
                            </div>
                        </div>
                            {{-- chi-section2 --}}

                            {{-- chi-section3 --}}
                        <div class="col-md-4 d-flex align-items-center chi-section3" style="gap: 10px">
                                    <label class="switch col-md-1.1 " >
                                    <input type="checkbox"/>
                                    <span class="slider">
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
                                <input name="done_date1" type="date" id="dat-done-teacher" class="form-control"/>
                            </div>
                            <div class="col-md-5 d-flex align-items-center justify-content-between">
                                <span>Type</span>
                                <select name="sel_type1" id="sel-type" class="form-control" style="width: 110px">
                                    <option value="" selected disabled>Select Type</option>
                                    <option value="PDF">PDF</option>
                                    <option value="Power Point">Power Point</option>
                                    <option value="Editor">Editor</option>
                                </select>
                            </div>
                        </div>
                            {{-- chi-section3 --}}
                    </div>
                    {{-- first section-child --}}
                    {{-- first child --}}
                    <div class="col-md-12 voice row mt-2 chi1">
                        {{-- chi-section1 --}}
                        <div class="col-md-2 d-flex align-items-center chi-section1">
                            <span class="col-md-4">Voice</span>
                        </div>
                            {{-- chi-section1 --}}

                            {{-- chi-section2 --}}
                        <div class="col-md-4 d-flex align-items-center chi-section2">
                            <div class="col-md-6 d-flex justify-content-around align-items-center">
                                    <label class="switch col-md-1.1">
                                    <input type="checkbox" />
                                    <span class="slider">
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
                                <input name="progress_date2" type="date" id="dat-teacher" class="form-control"/>
                            </div>
                        </div>
                            {{-- chi-section2 --}}

                            {{-- chi-section3 --}}
                        <div class="col-md-4 d-flex align-items-center chi-section3" style="gap: 10px">
                                    <label class="switch col-md-1.1 " >
                                    <input type="checkbox"/>
                                    <span class="slider">
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
                                <input type="date" name="done_date2" id="dat-done-teacher" class="form-control"/>
                            </div>
                            <div class="col-md-5 d-flex align-items-center justify-content-between">
                                <span>Duration</span>
                                <input name="done_duration2" id="dat-done-teacher" class="form-control" />
                            </div>
                        </div>
                            {{-- chi-section3 --}}
                    </div>
                    {{-- first section-child --}}
                </div>
                <button class="btn btn-secondary mt-3" style="width: 120px">Submit</button>
</div>
</form>
<script>
let filter_btn = document.querySelector('.lesson .filter_btn');
let lesson_sections = document.querySelector('.lesson_sections');
let year_sel = document.querySelector('.lesson .year_sel');
let grad_sel = document.querySelector('.lesson .grad_sel');
let subject_sel = document.querySelector('.lesson .subject_sel');
let section_sel = document.querySelector('.lesson .section_sel');
let lesson_sel = document.querySelector('.lesson .lesson_sel');
let year_val = document.querySelector('.lesson .year_val');
let subjects_val = document.querySelector('.lesson .subjects_val');
let sections_val = document.querySelector('.lesson .sections_val');
let lesson_val = document.querySelector('.lesson .lesson_val');
year_val = year_val.value;
year_val = JSON.parse(year_val);
subjects_val = subjects_val.value;
subjects_val = JSON.parse(subjects_val);
sections_val = sections_val.value;
sections_val = JSON.parse(sections_val);
lesson_val = lesson_val.value;
lesson_val = JSON.parse(lesson_val);
grad_sel.addEventListener('change', () => {
    year_sel.innerHTML = `
<option value="" selected disabled>Sub category</option>`;
    year_val.forEach(item => {
        if ( item.status == grad_sel.value ) {
            year_sel.innerHTML += `
            <option value="${item.id}">${item.category}</option>`;
        }
    });
})
year_sel.addEventListener('change', () => {
    subject_sel.innerHTML = `
<option value="" selected disabled>select your subject</option>`;
    subjects_val.forEach(item => {
        if ( item.category_id == year_sel.value ) {
            subject_sel.innerHTML += `
            <option value="${item.id}">${item.name}</option>`;
        }
    });
})
subject_sel.addEventListener('change', () => {
    section_sel.innerHTML = `
    <option value="" selected disabled>select your section</option>`;
    sections_val.forEach(item => {
        if ( item.subject_id == subject_sel.value ) {
            section_sel.innerHTML += `
            <option value="${item.id}">${item.section}</option>`;
        }
    });
})
section_sel.addEventListener('change', () => {
    lesson_sel.innerHTML = `
    <option value="" selected disabled>select your Lesson</option>`;
    lesson_val.forEach(item => {
        if ( item.section_id == section_sel.value ) {
            lesson_sel.innerHTML += `
            <option value="${item.id}">${item.lesson}</option>`;
        }
    });
})
filter_btn.addEventListener('click', () => {
        let obj = {
                'lesson_id' : lesson_sel.value,
                'user_id' : {{$user_id}},
            };
            let sel_teacher = document.querySelector('#sel-teacher')
        
            let material_sec =  document.querySelector('.material_sec'); 
        $.ajax({
            type: 'POST',
            url: "{{route('Tteacher_lesson_data')}}",
            data: obj,
            success:function(res){
                material_sec.innerHTML = null;
                res.forEach(data => {
                let checked = data.done_date == null ? null : 'checked';
                data = (data == []) ? {user_id:'',
                    name: '', progress_date: '', done_date:'', m_Type: ''}: data;
                if( data.material == 'material' && res.length > 1 ){
                    material_sec.innerHTML += `
                    <div class="material_sec">
                    {{-- first child --}}
                    <div class="col-md-12 row chi1">
                        {{-- chi-section1 --}}
                        <div class="col-md-2 d-flex align-items-center chi-section1">
                            <span class="col-md-4">Material</span>
                        </div>
                            {{-- chi-section1 --}}

                            {{-- chi-section2 --}}
                        <div class="col-md-4 d-flex align-items-center chi-section2">
                            <div class="col-md-6 d-flex justify-content-around align-items-center">
                                    <label class="switch col-md-1.1">
                                    <input type="checkbox" checked />
                                    <span class="slider">
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
                                <input type="date" value="${data.progress_date}" name="progress_date1" id="dat-teacher" class="form-control"/>
                            </div>
                        </div>
                            {{-- chi-section2 --}}

                            {{-- chi-section3 --}}
                        <div class="col-md-4 d-flex align-items-center chi-section3" style="gap: 10px">
                                    <label class="switch col-md-1.1 " >
                                    <input type="checkbox" ${checked}/>
                                    <span class="slider">
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
                                <input name="done_date1" value="${data.done_date}" type="date" id="dat-done-teacher" class="form-control"/>
                            </div>
                            <div class="col-md-5 d-flex align-items-center justify-content-between">
                                <span>Type</span>
                                <select name="sel_type1" id="sel-type" class="form-control" style="width: 110px">
                                    <option value="" selected disabled>Select Type</option>
                                    <option value="PDF">PDF</option>
                                    <option value="Power Point">Power Point</option>
                                    <option value="Editor">Editor</option>
                                    <option value="${data.m_Type}" selected>${data.m_Type}</option>
                                </select>
                            </div>
                        </div>
                            {{-- chi-section3 --}}
                    </div>
                    {{-- first section-child --}}
                    </div>
                    `;
                }
                else if( data.material == 'voice' && res.length > 1 ){
                    material_sec.innerHTML += `
                    {{-- first child --}}
                    <div class="col-md-12 voice row mt-2 chi1">
                        {{-- chi-section1 --}}
                        <div class="col-md-2 d-flex align-items-center chi-section1">
                            <span class="col-md-4">Voice</span>
                        </div>
                            {{-- chi-section1 --}}

                            {{-- chi-section2 --}}
                        <div class="col-md-4 d-flex align-items-center chi-section2">
                            <div class="col-md-6 d-flex justify-content-around align-items-center">
                                    <label class="switch col-md-1.1">
                                    <input type="checkbox" checked />
                                    <span class="slider">
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
                                <input value="${data.progress_date}" name="progress_date2" type="date" id="dat-teacher" class="form-control"/>
                            </div>
                        </div>
                            {{-- chi-section2 --}}

                            {{-- chi-section3 --}}
                        <div class="col-md-4 d-flex align-items-center chi-section3" style="gap: 10px">
                                    <label class="switch col-md-1.1 " >
                                    <input type="checkbox" ${checked}/>
                                    <span class="slider">
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
                                <input type="date" value="${data.done_date}" name="done_date2" id="dat-done-teacher" class="form-control"/>
                            </div>
                            <div class="col-md-5 d-flex align-items-center justify-content-between">
                                <span>Duration</span>
                                <input name="done_duration2" value="${data.done_duration}" id="dat-done-teacher" class="form-control" />
                            </div>
                        </div>
                            {{-- chi-section3 --}}
                    </div>
                    {{-- first section-child --}}
                    </div>
                    `;
                }
                else if( data.material == 'material' ){
                    material_sec.innerHTML += `
                    <div class="material_sec">
                    {{-- first child --}}
                    <div class="col-md-12 row chi1">
                        {{-- chi-section1 --}}
                        <div class="col-md-2 d-flex align-items-center chi-section1">
                            <span class="col-md-4">Material</span>
                        </div>
                            {{-- chi-section1 --}}

                            {{-- chi-section2 --}}
                        <div class="col-md-4 d-flex align-items-center chi-section2">
                            <div class="col-md-6 d-flex justify-content-around align-items-center">
                                    <label class="switch col-md-1.1">
                                    <input type="checkbox" checked />
                                    <span class="slider">
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
                                <input type="date" value="${data.progress_date}" name="progress_date1" id="dat-teacher" class="form-control"/>
                            </div>
                        </div>
                            {{-- chi-section2 --}}

                            {{-- chi-section3 --}}
                        <div class="col-md-4 d-flex align-items-center chi-section3" style="gap: 10px">
                                    <label class="switch col-md-1.1 " >
                                    <input type="checkbox" ${checked}/>
                                    <span class="slider">
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
                                <input name="done_date1" value="${data.done_date}" type="date" id="dat-done-teacher" class="form-control"/>
                            </div>
                            <div class="col-md-5 d-flex align-items-center justify-content-between">
                                <span>Type</span>
                                <select name="sel_type1" id="sel-type" class="form-control" style="width: 110px">
                                    <option value="" selected disabled>Select Type</option>
                                    <option value="PDF">PDF</option>
                                    <option value="Power Point">Power Point</option>
                                    <option value="Editor">Editor</option>
                                    <option value="${data.m_Type}" selected>${data.m_Type}</option>
                                </select>
                            </div>
                        </div>
                            {{-- chi-section3 --}}
                    </div>
                    {{-- first section-child --}}
                    </div>
                    <div class="col-md-12 voice row mt-2 chi1">
                        {{-- chi-section1 --}}
                        <div class="col-md-2 d-flex align-items-center chi-section1">
                            <span class="col-md-4">Voice</span>
                        </div>
                            {{-- chi-section1 --}}

                            {{-- chi-section2 --}}
                        <div class="col-md-4 d-flex align-items-center chi-section2">
                            <div class="col-md-6 d-flex justify-content-around align-items-center">
                                    <label class="switch col-md-1.1">
                                    <input type="checkbox" />
                                    <span class="slider">
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
                                <input name="progress_date2" type="date" id="dat-teacher" class="form-control"/>
                            </div>
                        </div>
                            {{-- chi-section2 --}}

                            {{-- chi-section3 --}}
                        <div class="col-md-4 d-flex align-items-center chi-section3" style="gap: 10px">
                                    <label class="switch col-md-1.1 " >
                                    <input type="checkbox"/>
                                    <span class="slider">
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
                                <input type="date" name="done_date2" id="dat-done-teacher" class="form-control"/>
                            </div>
                            <div class="col-md-5 d-flex align-items-center justify-content-between">
                                <span>Duration</span>
                                <input name="done_duration2" id="dat-done-teacher" class="form-control" />
                            </div>
                        </div>
                            {{-- chi-section3 --}}
                    </div>
                    `;
                }
                else if( data.material == 'voice' ){
                    material_sec.innerHTML += `
                    <div class="col-md-12 row chi1">
                        {{-- chi-section1 --}}
                        <div class="col-md-2 d-flex align-items-center chi-section1">
                            <span class="col-md-4">Material</span>
                        </div>
                            {{-- chi-section1 --}}

                            {{-- chi-section2 --}}
                        <div class="col-md-4 d-flex align-items-center chi-section2">
                            <div class="col-md-6 d-flex justify-content-around align-items-center">
                                    <label class="switch col-md-1.1">
                                    <input type="checkbox" />
                                    <span class="slider">
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
                                <input type="date" name="progress_date1" id="dat-teacher" class="form-control"/>
                            </div>
                        </div>
                            {{-- chi-section2 --}}

                            {{-- chi-section3 --}}
                        <div class="col-md-4 d-flex align-items-center chi-section3" style="gap: 10px">
                                    <label class="switch col-md-1.1 " >
                                    <input type="checkbox"/>
                                    <span class="slider">
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
                                <input name="done_date1" type="date" id="dat-done-teacher" class="form-control"/>
                            </div>
                            <div class="col-md-5 d-flex align-items-center justify-content-between">
                                <span>Type</span>
                                <select name="sel_type1" id="sel-type" class="form-control" style="width: 110px">
                                    <option value="" selected disabled>Select Type</option>
                                    <option value="PDF">PDF</option>
                                    <option value="Power Point">Power Point</option>
                                    <option value="Editor">Editor</option>
                                </select>
                            </div>
                        </div>
                            {{-- chi-section3 --}}
                    </div>
                    {{-- first child --}}
                    <div class="col-md-12 voice row mt-2 chi1">
                        {{-- chi-section1 --}}
                        <div class="col-md-2 d-flex align-items-center chi-section1">
                            <span class="col-md-4">Voice</span>
                        </div>
                            {{-- chi-section1 --}}

                            {{-- chi-section2 --}}
                        <div class="col-md-4 d-flex align-items-center chi-section2">
                            <div class="col-md-6 d-flex justify-content-around align-items-center">
                                    <label class="switch col-md-1.1">
                                    <input type="checkbox" checked />
                                    <span class="slider">
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
                                <input value="${data.progress_date}" name="progress_date2" type="date" id="dat-teacher" class="form-control"/>
                            </div>
                        </div>
                            {{-- chi-section2 --}}

                            {{-- chi-section3 --}}
                        <div class="col-md-4 d-flex align-items-center chi-section3" style="gap: 10px">
                                    <label class="switch col-md-1.1 " >
                                    <input type="checkbox" ${checked}/>
                                    <span class="slider">
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
                                <input type="date" value="${data.done_date}" name="done_date2" id="dat-done-teacher" class="form-control"/>
                            </div>
                            <div class="col-md-5 d-flex align-items-center justify-content-between">
                                <span>Duration</span>
                                <input name="done_duration2" value="${data.done_duration}" id="dat-done-teacher" class="form-control" />
                            </div>
                        </div>
                            {{-- chi-section3 --}}
                    </div>
                    {{-- first section-child --}}
                    </div>
                    `;
                }
                });
            }
        })
        lesson_sections.classList.remove('d-none');
})
</script>
@endsection