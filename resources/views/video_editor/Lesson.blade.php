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
            <div class="container par">
                <div class="section1">
                    <div class="col-md-12 row">
                        <div class="col-md-4 grad-sec">
                            <span>Grad</span>
                            <select name="grad" id="grad-sel" class="form-control">
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
                            <input type="hidden" value="{{$years}}" class="valu-year">
                             <select name="year" id="year-sel-all" class="form-control">
                                <option value="" selected disabled>Sub category</option>
                                @foreach ($years as $year)
                                    @if ($year->status !== "0")
                                    <option value="{{$year->status}}" class="d-none">{{$year->category}}</option>
                                    @endif
                                @endforeach
                            </select>

                            <select name="year" id="year-sel1" class="form-control d-none">
                                <option value="" selected disabled>Sub category</option>
                                @foreach ($years as $year)
                                    @if ($year->status == "1")
                                    <option value="{{$year->status}}">{{$year->category}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <select name="year" id="year-sel2" class="form-control d-none">
                                <option value="" selected disabled>Sub category</option>
                                @foreach ($years as $year)
                                    @if ($year->status == "2")
                                    <option value="{{$year->status}}">{{$year->category}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <select name="year" id="year-sel3" class="form-control d-none">
                                <option value="" selected disabled>Sub category</option>
                                @foreach ($years as $year)
                                    @if ($year->status == "3")
                                    <option value="{{$year->status}}">{{$year->category}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 subject-sec">
                            <span>Subject</span>
                            <select name="subject" id="subject-sel" class="form-control">
                                <option value="" selected disabled>select your subject</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-12 row">
                            <div class="col-md-4 section-sec">
                                <span>Section</span>
                                <select name="section" id="section-sel" class="form-control">
                                    <option value="" selected>select your Section</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="col-md-4 lesson-sec">
                                <span>Lesson</span>
                                <select name="lesson" id="lesson-sel" class="form-control">
                                    <option value="" selected>select your Lesson</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="col-md-4 filter-btn">   
                                <div class="col-md-7 d-flex justify-content-between">
                                    <span class="p-1">Due Date</span>
                                    <input type="text" class="btn col-md-6 p-1" id="due-date" value="12/10"/>
                                </div>
                                <div class="col-md-4 d-flex justify-content-end">
                                    <button class="btn btn-secondary" id="btn-filter" style="width: 100%">Filter</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            {{-- Section 1 ////--}}


            {{-- Section2-1 --}}
            <div class="container section2 mt-3 par">
                    {{-- first child --}}
                    <div class="col-md-12 row chi1">
                        {{-- chi-section1 --}}
                        <div class="col-md-4 d-flex align-items-center chi-section1">
                            <span class="col-md-3">Material</span>
                            <span class="col-md-3">Teacher</span>
                            <div class="col-md-6">
                                <select name="sel-teacher" id="sel-teacher" class="form-control">
                                    <option value="" selected disabled>Select Teacher</option>
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
                                <input type="date" id="dat-teacher" class="form-control"/>
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
                                <input type="date" id="dat-done-teacher" class="form-control"/>
                            </div>
                            <div class="col-md-5 d-flex align-items-center justify-content-between">
                                <span>Type</span>
                                <select name="sel-type" id="sel-type" class="form-control" style="width: 110px">
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

                    {{-- Secound section-child --}}
                    <div class="col-md-12 row chi2 d-none" id="chi2">

                        {{-- chi-section1 --}}
                        <div class="col-md-4 d-flex align-items-center chi-section1">
                            <span class="col-md-3">Voice</span>
                            <span class="col-md-3">Teacher</span>
                            <div class="col-md-6">
                                <select name="sel-voice-teacher" id="sel-voice-teacher" class="form-control">
                                    <option value="" selected disabled>Select Voice Teacher</option>
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
                                <input type="date" id="dat-voice-teacher" class="form-control"/>
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
                                <input type="date" id="dat-done-voice-teacher" class="form-control"/>
                            </div>
                            <div class="col-md-5 d-flex align-items-center">
                                <span class="col-md-6 px-1">Duration</span>
                                <input type="number" id="dur-voice-teacher" style="width: 75px" class="form-control" placeholder="Duration"/>
                            </div>
                        </div>
                            {{-- chi-section3 --}}
                        
                    </div>
                    {{-- Secound section-child --}}
            </div>
            {{-- Section2-1 ////--}}


            {{-- Section2-2 --}}
            <div class="container d-flex flex-column mt-3 par d-none" style="gap: 10px" id="chi3">
              <div class="col-md-12 row chi3">

                        {{-- chi-section1 --}}
                        <div class="col-md-4 d-flex align-items-start chi-section1">
                            <span class="col-md-3 mt-2">Power point</span>
                            <span class="col-md-3 mt-2">User</span>
                            <div class="col-md-6">
                                <select name="sel-power-user" id="sel-power-user" class="form-control">
                                    <option value="" selected disabled>Select user</option>
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
                                            <input type="date" id="dat-power-user1" class="form-control"/>
                                        </div>
                                        
                                        <div class="col-md-5 p-0">
                                            <input type="number" id="slide-power-user1" class="form-control" style="width: 75px;" placeholder="Slide"/>
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

                                    <div class="row d-none mt-1" id="slide-3">
                                        <div class="col-md-7">
                                            <input type="date" id="dat-power-user3" class="form-control"/>
                                        </div>
                                        
                                        <div class="col-md-5 p-0">
                                            <input type="number" id="slide-power-user3" class="form-control" style="width: 75px;"/>
                                        </div>

                                        <div class="col-md-12 mt-2 slide-bt btn-slide3">
                                            <button type="button" class="button" id="btn-slide3">
                                                <span class="button__text">Add Slide</span>
                                            <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg"><line y2="19" y1="5" x2="12" x1="12"></line><line y2="12" y1="12" x2="19" x1="5"></line></svg></span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row d-none mt-1" id="slide-4">
                                        <div class="col-md-7">
                                            <input type="date" id="dat-power-user4" class="form-control"/>
                                        </div>
                                        
                                        <div class="col-md-5 p-0">
                                            <input type="number" id="slide-power-user4" class="form-control" style="width: 75px;"/>
                                        </div>

                                        <div class="col-md-12 mt-2 slide-bt btn-slide4">
                                            <button type="button" class="button" id="btn-slide4">
                                                <span class="button__text">Add Slide</span>
                                            <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg"><line y2="19" y1="5" x2="12" x1="12"></line><line y2="12" y1="12" x2="19" x1="5"></line></svg></span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row d-none mt-1" id="slide-5">
                                        <div class="col-md-7">
                                            <input type="date" id="dat-power-user5" class="form-control"/>
                                        </div>
                                        
                                        <div class="col-md-5 p-0">
                                            <input type="number" id="slide-power-user5" class="form-control" style="width: 75px;"/>
                                        </div>

                                        <div class="col-md-12 mt-2 slide-bt btn-slide5">
                                            <button type="button" class="button" id="btn-slide5">
                                                <span class="button__text">Add Slide</span>
                                            <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg"><line y2="19" y1="5" x2="12" x1="12"></line><line y2="12" y1="12" x2="19" x1="5"></line></svg></span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row d-none mt-1" id="slide-6">
                                        <div class="col-md-7">
                                            <input type="date" id="dat-power-user6" class="form-control"/>
                                        </div>
                                        
                                        <div class="col-md-5 p-0">
                                            <input type="number" id="slide-power-user6" class="form-control" style="width: 75px;"/>
                                        </div>

                                        <div class="col-md-12 mt-2 slide-bt btn-slide6">
                                            <button type="button" class="button" id="btn-slide6">
                                                <span class="button__text">Add Slide</span>
                                            <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg"><line y2="19" y1="5" x2="12" x1="12"></line><line y2="12" y1="12" x2="19" x1="5"></line></svg></span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row d-none mt-1" id="slide-7">
                                        <div class="col-md-7">
                                            <input type="date" id="dat-power-user7" class="form-control"/>
                                        </div>
                                        
                                        <div class="col-md-5 p-0">
                                            <input type="number" id="slide-power-user7" class="form-control" style="width: 75px;"/>
                                        </div>

                                        <div class="col-md-12 mt-2 slide-bt btn-slide7">
                                            <button type="button" class="button" id="btn-slide7">
                                                <span class="button__text">Add Slide</span>
                                            <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg"><line y2="19" y1="5" x2="12" x1="12"></line><line y2="12" y1="12" x2="19" x1="5"></line></svg></span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row d-none mt-1" id="slide-8">
                                        <div class="col-md-7">
                                            <input type="date" id="dat-power-user8" class="form-control"/>
                                        </div>
                                        
                                        <div class="col-md-5 p-0">
                                            <input type="number" id="slide-power-user8" class="form-control" style="width: 75px;"/>
                                        </div>

                                        <div class="col-md-12 mt-2 slide-bt btn-slide8">
                                            <button type="button" class="button" id="btn-slide8">
                                                <span class="button__text">Add Slide</span>
                                            <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg"><line y2="19" y1="5" x2="12" x1="12"></line><line y2="12" y1="12" x2="19" x1="5"></line></svg></span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row d-none mt-1" id="slide-9">
                                        <div class="col-md-7">
                                            <input type="date" id="dat-power-user9" class="form-control"/>
                                        </div>
                                        
                                        <div class="col-md-5 p-0">
                                            <input type="number" id="slide-power-user9" class="form-control" style="width: 75px;"/>
                                        </div>

                                        <div class="col-md-12 mt-2 slide-bt btn-slide9">
                                            <button type="button" class="button" id="btn-slide9">
                                                <span class="button__text">Add Slide</span>
                                            <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg"><line y2="19" y1="5" x2="12" x1="12"></line><line y2="12" y1="12" x2="19" x1="5"></line></svg></span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row d-none mt-1" id="slide-10">
                                        <div class="col-md-7">
                                            <input type="date" id="dat-power-user10" class="form-control"/>
                                        </div>
                                        
                                        <div class="col-md-5 p-0">
                                            <input type="number" id="slide-power-user10" class="form-control" style="width: 75px;"/>
                                        </div>

                                        <div class="col-md-12 mt-2 slide-bt btn-slide10">
                                            <button type="button" class="button" id="btn-slide10">
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
                                <input type="date" id="dat-User" class="form-control"/>
                            </div>
                            <div class="col-md-5 d-flex align-items-center">
                                <span class="col-md-6 px-1">Slides</span>
                                <input type="number" id="fil-User" style="width: 75px" class="form-control" placeholder="Slides"/>
                            </div>
                        </div>
                            {{-- chi-section3 --}}
                        
                    </div>


            </div>
            {{-- Section2-2//// --}}


            {{-- Section2-3 --}}
            <div class="container section3 mt-3 par d-none" id="chi4">
                  <div class="col-md-12 row">

                        {{-- chi-section1 --}}
                        <div class="col-md-4 d-flex align-items-start chi-section1">
                            <span class="col-md-3 mt-2">Video Edit</span>
                            <span class="col-md-3 mt-2">Video Editor</span>
                            <div class="col-md-6">
                                <select name="sel-ve" id="sel-ve" class="form-control">
                                    <option value="" selected disabled>Select Editor</option>
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
                                            <input type="date" id="dat-ve1" class="form-control"/>
                                        </div>
                                        
                                        <div class="col-md-5 p-0">
                                            <input type="number" id="duration-ve1" class="form-control" style="width: 75px;" placeholder="Duration"/>
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
                                <input type="date" id="dat-done-ve" class="form-control"/>
                            </div>
                            <div class="col-md-5 d-flex align-items-center">
                                <span class="col-md-6 px-1">Duration</span>
                                <input type="number" id="dur-done-ve" style="width: 75px" class="form-control" placeholder="Duration"/>
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
                                <select name="sel-vl" id="sel-vl" class="form-control">
                                    <option value="" selected disabled>Select Video Leader</option>
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
                                <input type="date" id="dat-vl" class="form-control"/>
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
                                <input type="date" id="dat-done-vl" class="form-control"/>
                            </div>
                           <div class="col-md-5 d-flex align-items-center">
                                <span class="col-md-4 px-1">Size</span>
                                <input type="number" id="siz-vf-vl" style="width: 75px" class="form-control" placeholder="Size"/>
                                <select name="sel-size-vf" id="sel-size-vf" class="form-control" style="width: 50px">
                                    <option value="" selected>&#11206;</option>
                                    <option value="MB">MB</option>
                                    <option value="GB">GB</option>
                                </select>
                            </div>
                        </div>
                            {{-- chi-section3 --}}
                        
                    </div>
            </div>
            {{-- Section2-4 --}}
            
            {{-- Section2-5 --}}
            <div class="container d-flex flex-column mt-3 par d-none" style="gap: 10px" id="chi6">

                    {{-- First section-child --}}
                    <div class="col-md-12 row" id="sec-1">

                        {{-- chi-section1 --}}
                        <div class="col-md-4 d-flex align-items-center chi-section1">
                            <span class="col-md-3">Compress</span>
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
                                <input type="date" id="dat-user-compress1" class="form-control"/>
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
                                <input type="date" id="dat-done-user-compress1" class="form-control"/>
                            </div>
                            <div class="col-md-5 d-flex align-items-center">
                                <span class="col-md-4 px-1">Size</span>
                                <input type="number" id="siz-user-compress1" style="width: 75px" class="form-control" placeholder="Size"/>
                                <select name="sel-size-compress1" id="sel-size-compress1" class="form-control" style="width: 50px">
                                    <option value="" selected>&#11206;</option>
                                    <option value="MB">MB</option>
                                    <option value="GB">GB</option>
                                </select>
                            </div>
                        </div>
                            {{-- chi-section3 --}}
                        
                    </div>
                    {{-- First section-child --}}

                    {{-- Secound section-child --}}
                    <div class="col-md-12 row d-none" id="sec-2">

                        {{-- chi-section1 --}}
                        <div class="col-md-4 d-flex align-items-center chi-section1">
                            <span class="col-md-3">Upload</span>
                            <span class="col-md-3">User</span>
                            <div class="col-md-6">
                                <select name="sel-user-upload2" id="sel-user-upload2" class="form-control">
                                    <option value="" selected disabled>Select user</option>
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
                                <input type="date" id="dat-user-upload2" class="form-control"/>
                            </div>
                        </div>
                            {{-- chi-section2 --}}

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
                                <input type="date" id="dat-done-user-upload2" class="form-control"/>
                            </div>
                            <div class="col-md-5 d-flex align-items-center">
                                <span class="col-md-4 px-1">Size</span>
                                <input type="number" id="siz-user-upload2" style="width: 75px" class="form-control" placeholder="Size"/>
                                <select name="sel-size-upload2" id="sel-size-upload2" class="form-control" style="width: 50px">
                                    <option value="" selected>&#11206;</option>
                                    <option value="MB">MB</option>
                                    <option value="GB">GB</option>
                                </select>
                            </div>
                        </div>
                            {{-- chi-section3 --}}
                        
                    </div>
                    {{-- Secound section-child --}}
                    
                    {{-- Thured section-child --}}
                    <div class="col-md-12 row d-none" id="sec-3">

                        {{-- chi-section1 --}}
                        <div class="col-md-4 d-flex align-items-center chi-section1">
                            <span class="col-md-3">Assign</span>
                            <span class="col-md-3">User</span>
                            <div class="col-md-6">
                                <select name="sel-user-assign3" id="sel-user-assign3" class="form-control">
                                    <option value="" selected disabled>Select user</option>
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
                                <input type="date" id="dat-user-assign3" class="form-control"/>
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
                                <input type="date" id="dat-done-user-assign3" class="form-control"/>
                            </div>
                            <div class="col-md-5 d-flex align-items-center">
                                <span class="col-md-4 px-1">Size</span>
                                <input type="number" id="siz-user-assign3" style="width: 75px" class="form-control" placeholder="Size"/>
                                <select name="sel-size-assign3" id="sel-size-assign3" class="form-control" style="width: 50px">
                                    <option value="" selected>&#11206;</option>
                                    <option value="MB">MB</option>
                                    <option value="GB">GB</option>
                                </select>
                            </div>
                        </div>
                            {{-- chi-section3 --}}
                        
                    </div>
                    {{-- Thured section-child --}}

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
@endsection
