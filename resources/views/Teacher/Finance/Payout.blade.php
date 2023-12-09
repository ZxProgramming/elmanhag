
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
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/payout/payout.css') }}" />
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

        <!-- Payout Page -->


        <div class="container pay-container">
            <div class="col-md-12 pay-par">
                {{-- Balance --}}
                <div class="pay-content">
                    <div class="chil-con">
                        <input type="number" name="pay-number" id="balance" value="{{$balance}}" readonly>
                        <span>EGP</span>
                    </div>
                    <div class="chile-na">
                        <span>Balance</span>
                    </div>
                </div>

                {{-- Available --}}
                <div class="pay-content">
                    <div class="chil-con">
                        <input type="number" name="pay-number" id="available" value="{{$available}}" readonly>
                        <span>EGP</span>
                    </div>
                    <div class="chile-na">
                        <span>Available</span>
                    </div>
                </div>

                {{-- Reserved --}}
                <div class="pay-content">
                    <div class="chil-con">
                        <input type="number" name="pay-number" id="reserved" value="{{$total_earned}}" readonly>
                        <span>EGP</span>
                    </div>
                    <div class="chile-na">
                        <span>Reserved</span>
                    </div>
                </div>

            </div>
            <div class="col-md-12 pay-btn">
                <input type="button" class="btn btn-secondary" id="btn-pay" data-toggle="modal" data-target="#exampleModal" value="Payout">
            </div>

            {{-- Pop-Up --}}
            
                <form action="{{route('TPayoutAdd')}}" method="POST" class="modal fade" id="exampleModal" 
                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                @csrf
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Pay Out</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" style="color: #516377">X</span>
                            </button>
                        </div> 
                        <div class="modal-body">
                            <div class="pop-con mt-2">
                                <span>Available balance to pay out</span>
                                <div class="chil-con">
                                    <input type="number" name="available" id="available" value="{{$available}}" readonly>
                                    <span>EGP</span>
                                </div>
                            </div>
                            <div class="pay-amount">
                                <div class="col-md-12 d-flex align-items-center mt-5">
                                    <span class="col-md-3" style="font-size: 1.0rem; font-weight: 600; margin-right: 10px">Amount</span>
                                    <input type="number" name="money" id="" class="form-control" style="width: 150px">
                                </div>
                                <div class="col-md-12 d-flex align-items-center mt-5">
                                    <span class="col-md-3" style="font-size: 1.0rem; font-weight: 600; margin-right: 10px">Payment Method</span>
                                    <select name="method" id="" class="form-control" style="width: 250px">
                                        <option value="" selected>Select payment</option>
                                        <option value="card">Card</option>
                                        <option value="cash">Cash</option>
                                        <option value="visa">Visa</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary btn-subm">Submit</button>
                        </div>
                    </div>
                  </div>
                </form>
            {{-- Pop-Up ////// --}}
        </div>
@endsection