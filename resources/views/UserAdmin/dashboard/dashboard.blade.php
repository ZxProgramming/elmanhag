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

        /* Checkebox */
        
        $("#check-prog-teac").change(function(){
                if (this.checked) {
                    console.log("true");
                    $("#spa-done-teac").removeClass("d-none");
                }else{
                    console.log("false");
                    $("#spa-done-teac").addClass("d-none");
                    $("#chi2").addClass('d-none');
                }
            }
        )

        $("#check-done-teac").change(function(){
                if (this.checked) {
                    console.log("true");
                    $("#chi2").removeClass("d-none");
                    $("#spa-prog-teac").addClass("d-none");
                }else{
                    console.log("false");
                    $("#spa-prog-teac").removeClass("d-none");
                    $("#chi2").addClass("d-none");
                }
            }
        )

        $("#check-prog-voice").change(function(){
                if (this.checked) {
                    console.log("true");
                    $("#spa-done-voice").removeClass("d-none");
                }else{
                    console.log("false");
                    $("#spa-done-voice").addClass("d-none");
                }
            }
        )

        $("#check-done-voice").change(function(){
                if (this.checked) {
                    console.log("true");
                    $("#chi3").removeClass("d-none");
                    $("#spa-prog-voice").addClass("d-none");
                }else{
                    console.log("false");
                    $("#spa-prog-voice").removeClass("d-none");
                    $("#chi3").addClass("d-none");
                }
            }
        )

        $("#check-prog-pp").change(function(){
                if (this.checked) {
                    console.log("true");
                    $("#spa-done-pp").removeClass("d-none");
                }else{
                    console.log("false");
                    $("#spa-done-pp").addClass("d-none");
                }
            }
        )

        $("#check-done-pp").change(function(){
                if (this.checked) {
                    console.log("true");
                    $("#chi4").removeClass("d-none");
                    $("#spa-prog-pp").addClass("d-none");
                }else{
                    console.log("false");
                    $("#spa-prog-pp").removeClass("d-none");
                    $("#chi4").addClass("d-none");
                }
            }
        )

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

        $("#check-prog-cmp").change(function(){
                if (this.checked) {
                    console.log("true");
                    $("#spa-done-cmp").removeClass("d-none");
                }else{
                    console.log("false");
                    $("#spa-done-cmp").addClass("d-none");
                }
            }
        )

        $("#check-done-cmp").change(function(){
                if (this.checked) {
                    console.log("true");
                    $("#sec-2").removeClass("d-none");
                    $("#spa-prog-cmp").addClass("d-none");
                }else{
                    console.log("false");
                    $("#spa-prog-cmp").removeClass("d-none");
                    $("#sec-2").addClass("d-none");
                }
            }
        )

        $("#check-prog-upl").change(function(){
                if (this.checked) {
                    console.log("true");
                    $("#spa-done-upl").removeClass("d-none");
                }else{
                    console.log("false");
                    $("#spa-done-upl").addClass("d-none");
                }
            }
        )

        $("#check-done-upl").change(function(){
                if (this.checked) {
                    console.log("true");
                    $("#sec-3").removeClass("d-none");
                    $("#spa-prog-upl").addClass("d-none");
                }else{
                    console.log("false");
                    $("#spa-prog-upl").removeClass("d-none");
                    $("#sec-3").addClass("d-none");
                }
            }
        )
        
        $("#check-prog-Asi").change(function(){
                if (this.checked) {
                    console.log("true");
                    $("#spa-done-Asi").removeClass("d-none");
                }else{
                    console.log("false");
                    $("#spa-done-Asi").addClass("d-none");
                }
            }
        )

        $("#check-done-Asi").change(function(){
                if (this.checked) {
                    console.log("true");
                    $("#checked").removeClass("d-none");
                    $("#spa-prog-Asi").addClass("d-none");
                }else{
                    console.log("false");
                    $("#spa-prog-Asi").removeClass("d-none");
                    $("#checked").addClass("d-none");
                }
            }
        )
        


        /* Checkebox// */


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
        <!-- Basic Layout -->
            {{-- Section 1 --}}
            <form method="POST" action="{{route('materialUserAdminAdd')}}">
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
                                <select name="lesson" id="lesson-sel" class="form-control sel_lesson">
                                    <option value="" selected>select your Lesson</option>
                                </select>
                            </div>
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
            {{-- Section 1 ////--}}


            @if( in_array('material', $premisions))
            {{-- Section2-1 --}}
            <div class="container section2 mt-3 par">
                    {{-- first child --}}
                    <div class="col-md-12 row chi1">
                        {{-- chi-section1 --}}
                        <div class="col-md-4 d-flex align-items-center chi-section1">
                            <span class="col-md-3">Material</span>
                            <span class="col-md-3">Teacher</span>
                            <div class="col-md-6">
                                <select name="sel_teacher1" id="sel-teacher" class="form-control sel_teacher1">
                                    <option value="" selected disabled>Select Teacher</option>
                                    @foreach( $teachers as $item )
                                    <option value="{{$item->id}}">
                                        {{$item->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                            {{-- chi-section1 --}}

                            {{-- chi-section2 --}}
                        <div class="col-md-4 d-flex align-items-center chi-section2">
                            <div class="col-md-6 d-flex justify-content-around align-items-center">
                                    <label class="switch col-md-1.1">
                                    <input type="checkbox" id="check-prog-teac"/>
                                    <span class="slider" id="spa-prog-teac">
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
                                <input type="date" name="t_progress_date1" id="dat-teacher" class="form-control t_progress_date1"/>
                            </div>
                        </div>
                            {{-- chi-section2 --}}

                            {{-- chi-section3 --}}
                        <div class="col-md-4 d-flex align-items-center chi-section3" style="gap: 10px">
                                    <label class="switch col-md-1.1 ">
                                    <input type="checkbox" id="check-done-teac" />
                                    <span class="slider d-none" id="spa-done-teac">
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
                                <input type="date" name="t_done_date1" id="dat-done-teacher" class="form-control t_done_date1"/>
                            </div>
                            <div class="col-md-5 d-flex align-items-center justify-content-between">
                                <span>Type</span>
                                <select name="t_m_Type1" id="sel-type" class="form-control t_m_Type1" style="width: 110px">
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

            {{-- Section2-1 ////--}}
            @else
            {{-- Section2-1 --}}
            <div class="container section2 mt-3 par">
                    {{-- first child --}}
           <h6 style="color:red;"> You Can't Edit About This Section</h4>

                    <div class="col-md-12 row chi1">
                        
                        {{-- chi-section1 --}}
                        <div class="col-md-4 d-flex align-items-center chi-section1">
                            <span class="col-md-3">Material</span>
                            <span class="col-md-3">Teacher</span>
                            <div class="col-md-6">
                                <select id="sel-teacher" class="form-control sel_teacher1">
                                    <option value="" selected disabled>Select Teacher</option>
                                </select>
                            </div>
                        </div>
                            {{-- chi-section1 --}}

                            {{-- chi-section2 --}}
                        <div class="col-md-4 d-flex align-items-center chi-section2">
                            <div class="col-md-6 d-flex justify-content-around align-items-center">
                                    <label class="switch col-md-1.1">
                                    <input type="checkbox" id="check-prog-teac"/>
                                    <span class="slider" id="spa-prog-teac">
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
                                <input type="date" readonly id="dat-teacher" class="form-control t_progress_date1"/>
                            </div>
                        </div>
                            {{-- chi-section2 --}}

                            {{-- chi-section3 --}}
                        <div class="col-md-4 d-flex align-items-center chi-section3" style="gap: 10px">
                                    <label class="switch col-md-1.1 ">
                                    <input type="checkbox" id="check-done-teac" />
                                    <span class="slider d-none" id="spa-done-teac">
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
                                <input type="date" readonly id="dat-done-teacher" class="form-control t_done_date1"/>
                            </div>
                            <div class="col-md-5 d-flex align-items-center justify-content-between">
                                <span>Type</span>
                                <select readonly id="sel-type" class="form-control t_m_Type1" style="width: 110px">
                                    <option value="" selected disabled>Select Type</option>
                                </select>
                            </div>
                        </div>
                            {{-- chi-section3 --}}
                    </div>
                    {{-- first section-child --}}
            {{-- Section2-1 ////--}}
            @endif

            @if( in_array('voice', $premisions))
                    {{-- Secound section-child --}}
                    <div class="col-md-12 row chi2 d-none" id="chi2">

                        {{-- chi-section1 --}}
                        <div class="col-md-4 d-flex align-items-center chi-section1">
                            <span class="col-md-3">Voice</span>
                            <span class="col-md-3">Teacher</span>
                            <div class="col-md-6">
                                <select name="sel_teacher2" id="sel-voice-teacher" class="form-control sel_teacher2">
                                    <option value="" selected disabled>Select Voice Teacher</option>
                                    @foreach( $teachers as $item )
                                    <option value="{{$item->id}}">
                                        {{$item->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                            {{-- chi-section1 --}}

                            {{-- chi-section2 --}}
                        <div class="col-md-4 d-flex align-items-center chi-section2">
                            <div class="col-md-6 d-flex justify-content-around align-items-center">
                                    <label class="switch col-md-1.1">
                                    <input type="checkbox" id="check-prog-voice" />
                                    <span class="slider" id="spa-prog-voice">
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
                                <input name="t_progress_date2" type="date" id="dat-voice-teacher" class="form-control t_progress_date2"/>
                            </div>
                        </div>
                            {{-- chi-section2 --}}

                            {{-- chi-section3 --}}
                        <div class="col-md-4 d-flex align-items-center chi-section3" style="gap: 10px">
                                    <label class="switch col-md-1.1">
                                    <input type="checkbox" id="check-done-voice"/>
                                    <span class="slider d-none" id="spa-done-voice">
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
                                <input type="date" name="t_done_date2" id="dat-done-voice-teacher" class="form-control t_done_date2"/>
                            </div>
                            <div class="col-md-5 d-flex align-items-center">
                                <span class="col-md-6 px-1">Duration</span>
                                <input name="done_duration2" id="dur-voice-teacher" style="width: 75px" class="form-control done_duration2" placeholder="Duration"/>
                            </div>
                        </div>
                            {{-- chi-section3 --}}
                        
                    </div>
                    {{-- Secound section-child --}}
            </div>
            @else
                {{-- Secound section-child --}}
                <div class="col-md-12 row chi2 d-none" id="chi2">
                    <h6 style="color:red;"> You Can't Edit About This Section</h4>

                    {{-- chi-section1 --}}
                    <div class="col-md-4 d-flex align-items-center chi-section1">
                        <span class="col-md-3">Voice</span>
                        <span class="col-md-3">Teacher</span>
                        <div class="col-md-6">
                            <select id="sel-voice-teacher" class="form-control sel_teacher2">
                                <option value="" selected disabled>Select Voice Teacher</option>
                               
                            </select>
                        </div>
                    </div>
                        {{-- chi-section1 --}}

                        {{-- chi-section2 --}}
                    <div class="col-md-4 d-flex align-items-center chi-section2">
                        <div class="col-md-6 d-flex justify-content-around align-items-center">
                                <label class="switch col-md-1.1">
                                <input type="checkbox" id="check-prog-voice" />
                                <span class="slider" id="spa-prog-voice">
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
                            <input readonly type="date" id="dat-voice-teacher" class="form-control t_progress_date2"/>
                        </div>
                    </div>
                        {{-- chi-section2 --}}

                        {{-- chi-section3 --}}
                    <div class="col-md-4 d-flex align-items-center chi-section3" style="gap: 10px">
                                <label class="switch col-md-1.1">
                                <input type="checkbox" id="check-done-voice"/>
                                <span class="slider d-none" id="spa-done-voice">
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
                            <input type="date" readonly id="dat-done-voice-teacher" class="form-control t_done_date2"/>
                        </div>
                        <div class="col-md-5 d-flex align-items-center">
                            <span class="col-md-6 px-1">Duration</span>
                            <input readonly id="dur-voice-teacher" style="width: 75px" class="form-control done_duration2" placeholder="Duration"/>
                        </div>
                    </div>
                        {{-- chi-section3 --}}
                    
                </div>
                {{-- Secound section-child --}}
                </div>
            @endif

            
            @if( in_array('powerpoint', $premisions))
            {{-- Section2-2 --}}
            <div class="container d-flex flex-column mt-3 par d-none" style="gap: 10px" id="chi3">
              <div class="col-md-12 row chi3">

                        {{-- chi-section1 --}}
                        <div class="col-md-4 d-flex align-items-start chi-section1">
                            <span class="col-md-3 mt-2">Power point</span>
                            <span class="col-md-3 mt-2">User</span>
                            <div class="col-md-6">
                                <select name="sel_user3" id="sel-power-user" class="form-control sel_user3">
                                    <option value="" selected disabled>Select user</option>
                                    @foreach( $users as $item )
                                    <option value="{{$item->id}}">
                                        {{$item->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- chi-section1 --}}

                            {{-- chi-section2 --}}
                        <div class="col-md-4 d-flex align-items-start chi-section2" style="justify-content: space-evenly;">
                                <div class="col-md-6 d-flex justify-content-around align-items-start mt-2">
                                    <label class="switch col-md-1.1">
                                    <input type="checkbox" id="check-prog-pp"/>
                                    <span class="slider" id="spa-prog-pp">
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

                                <div class="col-md-6 pa-slide">

                                
                                    <div class="row" id="slide-1">
                                        <div class="col-md-7">
                                            <input name="u_progress_date3" type="date" id="dat-power-user1" class="form-control u_progress_date3"/>
                                        </div>
                                        
                                        <div class="col-md-5 p-0">
                                            <input name="u_add_slide1" type="number" id="slide-power-user1" class="form-control u_add_slide1" style="width: 75px;" placeholder="Slide"/>
                                        </div>
                                    </div>

                                    <div class="row d-none mt-1" id="slide-2">
                                        <div class="col-md-7">
                                            <input type="date" id="dat-power-user2" class="form-control"/>
                                        </div>
                                        
                                        <div class="col-md-5 p-0">
                                            <input type="number" id="slide-power-user2" class="form-control" style="width: 75px;"/>
                                        </div>

                                        <div class="col-md-12 mt-2 slide-bt btn-slide2">
                                            <button type="button" class="button" id="btn-slide2">
                                                <span class="button__text">Add Slide</span>
                                            <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg"><line y2="19" y1="5" x2="12" x1="12"></line><line y2="12" y1="12" x2="19" x1="5"></line></svg></span>
                                            </button>
                                        </div>
                                    </div>
 


                                </div>

                        </div>
                            {{-- chi-section2 --}}

                            {{-- chi-section3 --}}
                        <div class="col-md-4 d-flex align-items-start chi-section3" style="gap: 10px"> 
                                    <label class="switch col-md-1.1 mt-2">
                                    <input type="checkbox" id="check-done-pp"/>
                                    <span class="slider d-none" id="spa-done-pp">
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
                                    {{-- <span class="col-md-3">Date</span> --}}
                            <div class="col-md-4">
                                <input name="u_done_date3" type="date" id="dat-User" class="form-control u_done_date3"/>
                            </div>
                            <div class="col-md-5 d-flex align-items-center">
                                <span class="col-md-6 px-1">Slides</span>
                                <input type="number" name="u_slides3" id="fil-User" style="width: 75px" class="form-control u_slides3" placeholder="Slides"/>
                            </div>
                        </div>
                            {{-- chi-section3 --}}
                        
                    </div>


            </div>
            {{-- Section2-2//// --}}
            @else
            {{-- Section2-2 --}}
            <div class="container d-flex flex-column mt-3 par d-none" style="gap: 10px" id="chi3">
                <h6 style="color:red;"> You Can't Edit About This Section</h4>
         
                <div class="col-md-12 row chi3">

                        {{-- chi-section1 --}}
                        <div class="col-md-4 d-flex align-items-start chi-section1">
                            <span class="col-md-3 mt-2">Power point</span>
                            <span class="col-md-3 mt-2">User</span>
                            <div class="col-md-6">
                                <select id="sel-power-user" class="form-control sel_user3">
                                    <option value="" selected disabled>Select user</option>
                                    
                                </select>
                            </div>
                        </div>
                        {{-- chi-section1 --}}

                            {{-- chi-section2 --}}
                        <div class="col-md-4 d-flex align-items-start chi-section2" style="justify-content: space-evenly;">
                                <div class="col-md-6 d-flex justify-content-around align-items-start mt-2">
                                    <label class="switch col-md-1.1">
                                    <input type="checkbox" id="check-prog-pp"/>
                                    <span class="slider" id="spa-prog-pp">
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

                                <div class="col-md-6 pa-slide">

                                
                                    <div class="row" id="slide-1">
                                        <div class="col-md-7">
                                            <input readonly type="date" id="dat-power-user1" class="form-control u_progress_date3"/>
                                        </div>
                                        
                                        <div class="col-md-5 p-0">
                                            <input readonly type="number" id="slide-power-user1" class="form-control u_add_slide1" style="width: 75px;" placeholder="Slide"/>
                                        </div>
                                    </div>

                                    <div class="row d-none mt-1" id="slide-2">
                                        <div class="col-md-7">
                                            <input type="date" readonly id="dat-power-user2" class="form-control"/>
                                        </div>
                                        
                                        <div class="col-md-5 p-0">
                                            <input type="number" readonly id="slide-power-user2" class="form-control" style="width: 75px;"/>
                                        </div>

                                        <div class="col-md-12 mt-2 slide-bt btn-slide2">
                                            <button type="button" class="button" id="btn-slide2">
                                                <span class="button__text">Add Slide</span>
                                            <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg"><line y2="19" y1="5" x2="12" x1="12"></line><line y2="12" y1="12" x2="19" x1="5"></line></svg></span>
                                            </button>
                                        </div>
                                    </div>
 


                                </div>

                        </div>
                            {{-- chi-section2 --}}

                            {{-- chi-section3 --}}
                        <div class="col-md-4 d-flex align-items-start chi-section3" style="gap: 10px"> 
                                    <label class="switch col-md-1.1 mt-2">
                                    <input type="checkbox" id="check-done-pp"/>
                                    <span class="slider d-none" id="spa-done-pp">
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
                                    {{-- <span class="col-md-3">Date</span> --}}
                            <div class="col-md-4">
                                <input readonly type="date" id="dat-User" class="form-control u_done_date3"/>
                            </div>
                            <div class="col-md-5 d-flex align-items-center">
                                <span class="col-md-6 px-1">Slides</span>
                                <input type="number" readonly id="fil-User" style="width: 75px" class="form-control u_slides3" placeholder="Slides"/>
                            </div>
                        </div>
                            {{-- chi-section3 --}}
                        
                    </div>


            </div>
            {{-- Section2-2//// --}}
            @endif


            {{-- Section2-3 --}}
            <div class="container section3 mt-3 par d-none" id="chi4">
                  <div class="col-md-12 row">

                        {{-- chi-section1 --}}
                        <div class="col-md-4 d-flex align-items-start chi-section1">
                            <span class="col-md-3 mt-2">Video Edit</span>
                            <span class="col-md-3 mt-2">Video Editor</span>
                            <div class="col-md-6">
                                <select id="sel-ve" class="form-control sel_user4">
                                    <option value="" selected disabled>Select Editor</option>
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
                                            <input readonly type="date" id="dat-ve1" class="form-control u_progress_date4"/>
                                        </div>
                                        
                                        <div class="col-md-5 p-0">
                                            <input readonly type="number" id="duration-ve1" class="form-control u_duration4" style="width: 75px;" placeholder="Duration"/>
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
                                <input readonly type="date" id="dat-done-ve" class="form-control u_done_date4"/>
                            </div>
                            <div class="col-md-5 d-flex align-items-center">
                                <span class="col-md-6 px-1">Duration</span>
                                <input readonly id="dur-done-ve" style="width: 75px" class="form-control u_done_duration4" placeholder="Duration"/>
                            </div>
                        </div>
                            {{-- chi-section3 --}}
                        
                    </div>
                
            </div>
            {{-- Section2-3 ////--}}


            {{-- Section2-4 --}}
            <div class="container d-flex flex-column mt-3 par d-none" style="gap: 10px" id="chi5">
                <div class="col-md-12 row chi2">

                        {{-- chi-section1 --}}
                        <div class="col-md-4 d-flex align-items-center chi-section1">
                            <span class="col-md-3">Video final</span>
                            <span class="col-md-3">video leader</span>
                            <div class="col-md-6">
                                <select id="sel-vl" class="form-control sel_user5">
                                    <option value="" selected disabled>Select Video Leader</option>
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
                                <input type="date" readonly id="dat-vl" class="form-control progress_date5"/>
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
                                <input type="date" readonly id="dat-done-vl" class="form-control done_date5"/>
                            </div>
                           <div class="col-md-5 d-flex align-items-center">
                                <span class="col-md-4 px-1">Size</span>
                                <input readonly id="siz-vf-vl" style="width: 75px" class="form-control done_duration5" placeholder="Size"/>
                            </div>
                        </div>
                            {{-- chi-section3 --}}
                        
                    </div>
            </div>
            {{-- Section2-4 --}}
            
            {{-- Section2-5 --}}
            <div class="container d-flex flex-column mt-3 par d-none" style="gap: 10px" id="chi6">

                @if( in_array('compress', $premisions))
                    {{-- First section-child --}}
                    <div class="col-md-12 row" id="sec-1">

                        {{-- chi-section1 --}}
                        <div class="col-md-4 d-flex align-items-center chi-section1">
                            <span class="col-md-3">Compress</span>
                            <span class="col-md-3">user</span>
                            <div class="col-md-6">
                                <select name="sel_user6" id="sel-user-compress1" class="form-control sel_user6">
                                    <option value="" selected disabled>Select User</option>
                                    @foreach( $users as $item )
                                    <option value="{{$item->id}}">
                                        {{$item->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                            {{-- chi-section1 --}}

                            {{-- chi-section2 --}}
                        <div class="col-md-4 d-flex align-items-center chi-section2">
                            <div class="col-md-6 d-flex justify-content-around align-items-center">
                                    <label class="switch col-md-1.1">
                                    <input type="checkbox" id="check-prog-cmp"/>
                                    <span class="slider" id="spa-prog-cmp">
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
                                <input type="date" name="progress_date6" id="dat-user-compress1" class="form-control progress_date6"/>
                            </div>
                        </div>
                            {{-- chi-section2 --}}

                            {{-- chi-section3 --}}
                        <div class="col-md-4 d-flex align-items-center chi-section3" style="gap: 10px">
                                    <label class="switch col-md-1.1">
                                    <input type="checkbox" id="check-done-cmp"/>
                                    <span class="slider d-none" id="spa-done-cmp">
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
                                <input type="date" name="done_date6" id="dat-done-user-compress1" class="form-control done_date6"/>
                            </div>
                            <div class="col-md-5 d-flex align-items-center">
                                <span class="col-md-4 px-1">Size</span>
                                <input name="done_duration6" id="siz-user-compress1" style="width: 75px" class="form-control done_duration6" placeholder="Size"/>
                            </div>
                        </div>
                            {{-- chi-section3 --}}
                        
                    </div>
                    {{-- First section-child --}}
                @else
                    {{-- First section-child --}}
                    <div class="col-md-12 row" id="sec-1">
                        <h6 style="color:red;"> You Can't Edit About This Section</h4>

                        {{-- chi-section1 --}}
                        <div class="col-md-4 d-flex align-items-center chi-section1">
                            <span class="col-md-3">Compress</span>
                            <span class="col-md-3">user</span>
                            <div class="col-md-6">
                                <select id="sel-user-compress1" class="form-control sel_user6">
                                    <option value="" selected disabled>Select User</option>
                                </select>
                            </div>
                        </div>
                            {{-- chi-section1 --}}

                            {{-- chi-section2 --}}
                        <div class="col-md-4 d-flex align-items-center chi-section2">
                            <div class="col-md-6 d-flex justify-content-around align-items-center">
                                    <label class="switch col-md-1.1">
                                    <input type="checkbox" id="check-prog-cmp"/>
                                    <span class="slider" id="spa-prog-cmp">
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
                                <input type="date" readonly id="dat-user-compress1" class="form-control progress_date6"/>
                            </div>
                        </div>
                            {{-- chi-section2 --}}

                            {{-- chi-section3 --}}
                        <div class="col-md-4 d-flex align-items-center chi-section3" style="gap: 10px">
                                    <label class="switch col-md-1.1">
                                    <input type="checkbox" id="check-done-cmp"/>
                                    <span class="slider d-none" id="spa-done-cmp">
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
                                <input type="date" readonly id="dat-done-user-compress1" class="form-control done_date6"/>
                            </div>
                            <div class="col-md-5 d-flex align-items-center">
                                <span class="col-md-4 px-1">Size</span>
                                <input readonly id="siz-user-compress1" style="width: 75px" class="form-control done_duration6" placeholder="Size"/>
                            </div>
                        </div>
                            {{-- chi-section3 --}}
                        
                    </div>
                    {{-- First section-child --}}
                @endif

                @if( in_array('upload', $premisions))
                    {{-- Secound section-child --}}
                    <div class="col-md-12 row d-none" id="sec-2">

                        {{-- chi-section1 --}}
                        <div class="col-md-4 d-flex align-items-center chi-section1">
                            <span class="col-md-3">Upload</span>
                            <span class="col-md-3">User</span>
                            <div class="col-md-6">
                                <select name="sel_user7" id="sel-user-upload2" class="form-control sel_user7">
                                    <option value="" selected disabled>Select user</option>
                                    @foreach( $users as $item )
                                    <option value="{{$item->id}}">
                                        {{$item->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                            {{-- chi-section1 --}}

                            {{-- chi-section2 --}}
                        <div class="col-md-4 d-flex align-items-center chi-section2">
                            <div class="col-md-6 d-flex justify-content-around align-items-center">
                                    <label class="switch col-md-1.1">
                                    <input type="checkbox" id="check-prog-upl"/>
                                    <span class="slider" id="spa-prog-upl">
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
                                <input name="progress_date7" type="date" id="dat-user-upload2" class="form-control progress_date7"/>
                            </div>
                        </div>
                            {{-- chi-section2 --}}
                        <input type="hidden" value="[]" name="updates" class="updates" />
                            {{-- chi-section3 --}}
                        <div class="col-md-4 d-flex align-items-center chi-section3" style="gap: 10px">
                                    <label class="switch col-md-1.1">
                                    <input type="checkbox" id="check-done-upl"/>
                                    <span class="slider d-none" id="spa-done-upl">
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
                                <input name="done_date7" type="date" id="dat-done-user-upload2" class="form-control done_date7"/>
                            </div>
                            <div class="col-md-5 d-flex align-items-center">
                                <span class="col-md-4 px-1">Size</span>
                                <input name="duration7" id="siz-user-upload2" style="width: 75px" class="form-control duration7" placeholder="Size"/>
                                
                            </div> 
                        </div>
                            {{-- chi-section3 --}}
                        
                    </div>
                    {{-- Secound section-child --}}
                @else
                    {{-- Secound section-child --}}
                    <div class="col-md-12 row d-none" id="sec-2">
                        <h6 style="color:red;"> You Can't Edit About This Section</h4>

                        {{-- chi-section1 --}}
                        <div class="col-md-4 d-flex align-items-center chi-section1">
                            <span class="col-md-3">Upload</span>
                            <span class="col-md-3">User</span>
                            <div class="col-md-6">
                                <select id="sel-user-upload2" class="form-control sel_user7">
                                    <option value="" selected disabled>Select user</option>
                                </select>
                            </div>
                        </div>
                            {{-- chi-section1 --}}

                            {{-- chi-section2 --}}
                        <div class="col-md-4 d-flex align-items-center chi-section2">
                            <div class="col-md-6 d-flex justify-content-around align-items-center">
                                    <label class="switch col-md-1.1">
                                    <input type="checkbox" id="check-prog-upl"/>
                                    <span class="slider" id="spa-prog-upl">
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
                                <input readonly type="date" id="dat-user-upload2" class="form-control progress_date7"/>
                            </div>
                        </div>
                            {{-- chi-section2 --}}
                        <input type="hidden" value="[]" name="updates" class="updates" />
                            {{-- chi-section3 --}}
                        <div class="col-md-4 d-flex align-items-center chi-section3" style="gap: 10px">
                                    <label class="switch col-md-1.1">
                                    <input type="checkbox" id="check-done-upl"/>
                                    <span class="slider d-none" id="spa-done-upl">
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
                                <input readonly type="date" id="dat-done-user-upload2" class="form-control done_date7"/>
                            </div>
                            <div class="col-md-5 d-flex align-items-center">
                                <span class="col-md-4 px-1">Size</span>
                                <input readonly id="siz-user-upload2" style="width: 75px" class="form-control duration7" placeholder="Size"/>
                                
                            </div> 
                        </div>
                            {{-- chi-section3 --}}
                        
                    </div>
                    {{-- Secound section-child --}}
                @endif
                
                @if( in_array('assign', $premisions))
                    {{-- Thured section-child --}}
                    <div class="col-md-12 row d-none" id="sec-3">

                        {{-- chi-section1 --}}
                        <div class="col-md-4 d-flex align-items-center chi-section1">
                            <span class="col-md-3">Assign</span>
                            <span class="col-md-3">User</span>
                            <div class="col-md-6">
                                <select name="sel_user_8" id="sel-user-assign3" class="form-control sel_user_8">
                                    <option value="" selected disabled>Select user</option>
                                    @foreach( $users as $item )
                                    <option value="{{$item->id}}">
                                        {{$item->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                            {{-- chi-section1 --}}

                            {{-- chi-section2 --}}
                        <div class="col-md-4 d-flex align-items-center chi-section2">
                            <div class="col-md-6 d-flex justify-content-around align-items-center">
                                    <label class="switch col-md-1.1">
                                    <input type="checkbox" id="check-prog-Asi"/>
                                    <span class="slider" id="spa-prog-Asi">
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
                                <input name="progress_date8" type="date" id="dat-user-assign3" class="form-control progress_date8"/>
                            </div>
                        </div>
                            {{-- chi-section2 --}}

                            {{-- chi-section3 --}}
                        <div class="col-md-4 d-flex align-items-center chi-section3" style="gap: 10px">
                                <label class="switch col-md-1.1">
                                <input type="checkbox" id="check-done-Asi"/>
                                <span class="slider d-none" id="spa-done-Asi">
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
                                <input name="done_date8" type="date" id="dat-done-user-assign3" class="form-control done_date8"/>
                            </div>
                            <div class="col-md-5 d-flex align-items-center">
                                <span class="col-md-4 px-1">Size</span>
                                <input name="duration8" id="siz-user-assign3" style="width: 75px" class="form-control duration8" placeholder="Size"/>
                                <select name="sel_size_assign3" id="sel-size-assign3" class="form-control" style="width: 50px">
                                    <option value="" selected>&#11206;</option>
                                    <option value="MB">MB</option>
                                    <option value="GB">GB</option>
                                </select>
                            </div>
                        </div>
                            {{-- chi-section3 --}}
                        
                    </div>
                    {{-- Thured section-child --}}
                @else
                    {{-- Thured section-child --}}
                    <div class="col-md-12 row d-none" id="sec-3">
                        <h6 style="color:red;"> You Can't Edit About This Section</h4>

                        {{-- chi-section1 --}}
                        <div class="col-md-4 d-flex align-items-center chi-section1">
                            <span class="col-md-3">Assign</span>
                            <span class="col-md-3">User</span>
                            <div class="col-md-6">
                                <select id="sel-user-assign3" class="form-control sel_user_8">
                                    <option value="" selected disabled>Select user</option>
                                </select>
                            </div>
                        </div>
                            {{-- chi-section1 --}}

                            {{-- chi-section2 --}}
                        <div class="col-md-4 d-flex align-items-center chi-section2">
                            <div class="col-md-6 d-flex justify-content-around align-items-center">
                                    <label class="switch col-md-1.1">
                                    <input type="checkbox" id="check-prog-Asi"/>
                                    <span class="slider" id="spa-prog-Asi">
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
                                <input readonly type="date" id="dat-user-assign3" class="form-control progress_date8"/>
                            </div>
                        </div>
                            {{-- chi-section2 --}}

                            {{-- chi-section3 --}}
                        <div class="col-md-4 d-flex align-items-center chi-section3" style="gap: 10px">
                                <label class="switch col-md-1.1">
                                <input type="checkbox" id="check-done-Asi"/>
                                <span class="slider d-none" id="spa-done-Asi">
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
                                <input readonly type="date" id="dat-done-user-assign3" class="form-control done_date8"/>
                            </div>
                            <div class="col-md-5 d-flex align-items-center">
                                <span class="col-md-4 px-1">Size</span>
                                <input name="duration8" id="siz-user-assign3" style="width: 75px" class="form-control duration8" placeholder="Size"/>
                                <select id="sel-size-assign3" class="form-control" style="width: 50px">
                                    <option value="" selected>&#11206;</option>
                                </select>
                            </div>
                        </div>
                            {{-- chi-section3 --}}
                        
                    </div>
                    {{-- Thured section-child --}}
                @endif
            </div>
            {{-- Section2-5 ////--}} 

            {{-- Section2-6 --}}
            <div class="container d-flex flex-column mt-3 par d-none" id="checked" style="gap: 10px" id="chi7">

                    {{-- First section-child --}}
                    <div class="col-md-12 row">

                        {{-- chi-section1 --}}
                        <div class="col-md-4 d-flex align-items-center chi-section1">
                            <span class="col-md-3">Checked</span>
                            <span class="col-md-3">user</span>
                            <div class="col-md-6">
                                <select name="sel-user-compress1" id="sel-user-compress1" class="form-control">
                                    <option value="" selected disabled>Select User</option>
                                    <option value="Ahmed">Ahmed</option>
                                    <option value="Mohamed">Mohamed</option>
                                    <option value="Ali">Ali</option>
                                    <option value="Saad">Saad</option>
                                    <option value="Ibrahem">Ibrahem</option>
                                </select>
                            </div>
                        </div>
                            {{-- chi-section1 --}}

                            {{-- chi-section2 --}}
                        <div class="col-md-4 d-flex align-items-center chi-section2">
                            <div class="col-md-6 d-flex justify-content-around align-items-center">
                                    <label class="switch col-md-1.1">
                                    <input type="checkbox" id="check-done-chec"/>
                                    <span class="slider" id="spa-done-chec">
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
                                <input type="date" id="dat-done-check" class="form-control"/>
                            </div>
                        </div>
                            {{-- chi-section2 --}}
                        
                    </div>
                    {{-- First section-child --}}

            </div>
            {{-- Section2-6 ////--}}

            {{-- Section-btn-submit --}}
            <div class="mt-3 d-flex justify-content-end align-items-center">
                <input type="submit" value="Submit" class="btn btn-secondary" id="btn-sub">
            </div>
            {{-- Section-btn-submit ////--}}
        </div>
    </div>
</form>
                            <script>
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
                                let updates_val = [];
                                filter_btn.addEventListener('click', () => {
                                    let obj = {lesson_id: sel_lesson.value};
                                    $.ajax({
                                        type: 'POST',
                                        url: "{{route('lesson_data')}}",
                                        data: obj,
                                        success:function(data){
                                            data.forEach(item => {
                                                if ( item.material == 'material' ) {
                                                    updates_val = [...updates_val, 'material']

                                                    let sel_teacher1 = document.querySelector('.sel_teacher1');
                                                    let t_progress_date1 = document.querySelector('.t_progress_date1');
                                                    let t_done_date1 = document.querySelector('.t_done_date1');
                                                    let t_m_Type1 = document.querySelector('.t_m_Type1');
                                                    sel_teacher1.innerHTML += `
                                                    <option value="${item.user_id}" selected>${item.name}</option>`;
                                                    t_progress_date1.value = item.progress_date;
                                                    t_done_date1.value = item.done_date;
                                                    t_m_Type1.value = item.m_Type;
                                                }
                                                else if( item.material == 'voice' ){
                                                    updates_val = [...updates_val, 'voice']

                                                    let sel_teacher2 = document.querySelector('.sel_teacher2');
                                                    let t_progress_date2 = document.querySelector('.t_progress_date2');
                                                    let t_done_date2 = document.querySelector('.t_done_date2');
                                                    let done_duration2 = document.querySelector('.done_duration2');
                                                    sel_teacher2.innerHTML += `
                                                    <option value="${item.user_id}" selected>${item.name}</option>`;
                                                    t_progress_date2.value = item.progress_date;
                                                    t_done_date2.value = item.done_date;
                                                    done_duration2.value = item.done_duration;
                                                }
                                                else if( item.material == 'powerpoint' ){  
                                                    updates_val = [...updates_val, 'powerpoint']
  
                                                    let sel_user3 = document.querySelector('.sel_user3');
                                                    let u_progress_date3 = document.querySelector('.u_progress_date3');
                                                    let u_done_date3 = document.querySelector('.u_done_date3');
                                                    let u_slides3 = document.querySelector('.u_slides3');
                                                    sel_user3.innerHTML += `
                                                    <option value="${item.user_id}" selected>${item.name}</option>`;
                                                    u_progress_date3.value = item.progress_date;
                                                    u_done_date3.value = item.done_date;
                                                    u_slides3.value = item.slides;
                                                }
                                                else if( item.material == 'video edit' ){
                                                    updates_val = [...updates_val, 'video edit']

                                                    let sel_user4 = document.querySelector('.sel_user4');
                                                    let u_progress_date4 = document.querySelector('.u_progress_date4');
                                                    let u_done_date4 = document.querySelector('.u_done_date4');
                                                    let u_done_duration4 = document.querySelector('.u_done_duration4');
                                                    sel_user4.innerHTML += `
                                                    <option value="${item.user_id}" selected>${item.name}</option>`;
                                                    u_progress_date4.value = item.progress_date;
                                                    u_done_date4.value = item.done_date;
                                                    u_done_duration4.value = item.done_duration;
                                                }
                                                else if( item.material == 'video final' ){
                                                    updates_val = [...updates_val, 'video final']

                                                    let sel_user5 = document.querySelector('.sel_user5');
                                                    let progress_date5 = document.querySelector('.progress_date5');
                                                    let done_date5 = document.querySelector('.done_date5');
                                                    let done_duration5 = document.querySelector('.done_duration5');
                                                    sel_user5.innerHTML += `
                                                    <option value="${item.user_id}" selected>${item.name}</option>`;
                                                    progress_date5.value = item.progress_date;
                                                    done_date5.value = item.done_date;
                                                    done_duration5.value = item.done_duration;
                                                }
                                                else if( item.material == 'compress' ){
                                                    updates_val = [...updates_val, 'compress']

                                                    let sel_user6 = document.querySelector('.sel_user6');
                                                    let progress_date6 = document.querySelector('.progress_date6');
                                                    let done_date6 = document.querySelector('.done_date6');
                                                    let done_duration6 = document.querySelector('.done_duration6');
                                                    sel_user6.innerHTML += `
                                                    <option value="${item.user_id}" selected>${item.name}</option>`;
                                                    progress_date6.value = item.progress_date;
                                                    done_date6.value = item.done_date;
                                                    done_duration6.value = item.done_duration;
                                                }
                                                else if( item.material == 'upload' ){
                                                    updates_val = [...updates_val, 'upload']

                                                    let sel_user7 = document.querySelector('.sel_user7');
                                                    let progress_date7 = document.querySelector('.progress_date7');
                                                    let done_date7 = document.querySelector('.done_date7');
                                                    let duration7 = document.querySelector('.duration7');
                                                    sel_user7.innerHTML += `
                                                    <option value="${item.user_id}" selected>${item.name}</option>`;
                                                    progress_date7.value = item.progress_date;
                                                    done_date7.value = item.done_date;
                                                    duration7.value = item.done_duration;
                                                }
                                                else if( item.material == 'assign' ){
                                                    updates_val = [...updates_val, 'assign']

                                                    let sel_user_8 = document.querySelector('.sel_user_8');
                                                    let progress_date8 = document.querySelector('.progress_date8');
                                                    let done_date8 = document.querySelector('.done_date8');
                                                    let duration8 = document.querySelector('.duration8');
                                                    sel_user_8.innerHTML += `
                                                    <option value="${item.user_id}" selected>${item.name}</option>`;
                                                    progress_date8.value = item.progress_date;
                                                    done_date8.value = item.done_date;
                                                    duration8.value = item.done_duration;
                                                }
                                            });
                                            updates.value = updates_val;
                                            console.log(updates.value);
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
