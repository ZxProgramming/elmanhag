
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

        <table class="datatables-users border-top table" id="cm-list">
    
    <thead>
        <tr>
            <th>#</th>
            <th>Date</th>
            <th>Type</th>
            <th>Amount</th>
        </tr>
    </thead>
    <tbody> 
        @foreach( $av_items as $item )
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$item[1]->purchase_date}}</td>
            <td>{{$item[1]->type}}</td>
            <td>{{$item[0]}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection