








 @extends('layouts/layoutMaster')
            @php
                $followUp='FollowUp';
                $menuHorizontal='FollowUp';
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

 @section('content')

 
 <div class="content-wrapper">
    <!-- Content -->
    Welcome  : {{ auth()->user()->name }}
            
    Welcome to The First Page About Follow Up

    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row g-4 mb-4">
        <div class="col-sm-6 col-xl-3">

        <div class="card">
            <a href="{{ route('listSignUp') }}">
            <div class="card-body">
            <div class="d-flex align-items-start justify-content-between">
                <div class="content-left">
                <span>Signups</span>
                <div class="d-flex align-items-end mt-2">
                    <h4 class="mb-0 me-2">
                        
                                {{ count($signUps) }}
                    </h4>
                    {{-- <small class="text-success">(+29%)</small> --}}
                </div>
                </div>
                <span class="badge bg-label-primary rounded p-2">
                <i class="bx bx-user bx-sm"></i>
                </span>
            </div>
            </div>
        </a>
        </div>


        </div>
        <div class="col-sm-6 col-xl-3">
        <div class="card">
            <div class="card-body">
            <div class="d-flex align-items-start justify-content-between">
                <div class="content-left">
                <span>Paid</span>
                <div class="d-flex align-items-end mt-2">
                    <h4 class="mb-0 me-2">
                            {{count( $signUpsPaid) }}
                    </h4>
                    {{-- <small class="text-success">(+18%)</small> --}}
                </div>
                {{-- <small>Last week analytics </small> --}}
                </div>
                <span class="badge bg-label-danger rounded p-2">
                    <i class="fa-solid fa-coins"></i>
                </span>
            </div>
            </div>
        </div>
        </div>

        <div class="col-sm-6 col-xl-3">
        <div class="card">
            <div class="card-body">
            <div class="d-flex align-items-start justify-content-between">
                <div class="content-left">
                <span>Free</span>
                <div class="d-flex align-items-end mt-2">
                    <h4 class="mb-0 me-2">{{count( $signUpsFree) }}</h4>
                    
                </div>
                </div>
                <span class="badge bg-label-success rounded p-2">
                <i class="bx bx-group bx-sm"></i>
                </span>
            </div>
            </div>
        </div>
        </div>


        <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                        <span>Pendings</span>
                        <div class="d-flex align-items-end mt-2">
                            <h4 class="mb-0 me-2">{{count( $signUpsWaiting) }}</h4>
                            <small class="text-success">(+42%)</small>
                        </div>
                        </div>
                        <span class="badge bg-label-warning rounded p-2">
                        <i class="bx bx-user-voice bx-sm"></i>
                        </span>
                    </div>
                    </div>
                </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            
                <div class="card">
                    <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                        <span>Balance</span>
                        <div class="d-flex align-items-end mt-2">
                            <h4 class="mb-0 me-2">{{ $balance }}</h4>
                        </div>
                        </div>
                        <span class="badge bg-label-warning rounded p-2">
                        <i class="bx bx-user-voice bx-sm"></i>
                        </span>
                    </div>
                    </div>
                </div>
        </div>

        <div class="col-sm-6 col-xl-3">

            
                <div class="card">
                    <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                        <span>Total earned </span>
                        <div class="d-flex align-items-end mt-2">
                            <h4 class="mb-0 me-2">10</h4>
                        </div>
                        </div>
                        <span class="badge bg-label-warning rounded p-2">
                        <i class="bx bx-user-voice bx-sm"></i>
                        </span>
                    </div>
                    </div>
                </div>
        </div>
    </div>
    <!-- Users List Table -->
    <div class="card">
        <div class="card-header border-bottom">
        <h5 class="card-title">Search Filter</h5>
        <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">
            <div class="col-md-4 user_role"></div>
            <div class="col-md-4 user_plan"></div>
            <div class="col-md-4 user_status"></div>
        </div>
        </div>
        <div class="card-datatable table-responsive">
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer"><div class="row mx-2"><div class="col-md-2"><div class="me-3"><div class="dataTables_length" id="DataTables_Table_0_length"><label><select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-select"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select></label></div></div></div><div class="col-md-10"><div class="dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0"><div id="DataTables_Table_0_filter" class="dataTables_filter"><label><input type="search" class="form-control" placeholder="Search.." aria-controls="DataTables_Table_0"></label></div><div class="dt-buttons btn-group flex-wrap"> <div class="btn-group"><button class="btn btn-secondary buttons-collection dropdown-toggle btn-label-secondary mx-3" tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="dialog" aria-expanded="false"><span><i class="bx bx-upload me-1"></i>Export</span><span class="dt-down-arrow"></span></button></div> <button class="btn btn-secondary add-new btn-primary" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser"><span><i class="bx bx-plus me-0 me-lg-2"></i><span class="d-none d-lg-inline-block">Add New User</span></span></button> </div></div></div></div><table class="datatables-users table border-top dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
            <thead>
            <tr>
                <th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1" style="width: 55.1562px; display: none;" aria-label="">
                </th>
                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 142.016px;" aria-label="User: activate to sort column ascending">
                    Bundle Name
                </th>
                <th class="sorting sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 139.719px;" aria-label="Role: activate to sort column descending" aria-sort="ascending">
                    Categoy
                </th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 142.359px;" aria-label="Plan: activate to sort column ascending">
                        Type
                    </th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 187.578px;" aria-label="Billing: activate to sort column ascending">
                        purchase_date
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 174.734px;" aria-label="Status: activate to sort column ascending">Status</th>
                    <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 184.438px;" aria-label="Actions">Time Approved</th></tr>
            </thead>
            <tbody>
                    @if(isset($signup))
                    <tr>
                    @foreach($signup  as $item)
                  
                    <td  >
                     {{ $item->name }}
                    </td>
                    <td  >
                     {{ $item->category }}
                    </td>
                    <td  >
                     {{ $item->type }}
                    </td>
                    <td  >
                     {{ $item->purchase_date }}
                    </td>
                
                    <td  >
                     {{ $item->signup_status }}
                    </td>
                   @if( isset($item->status_date))
                   <td  >
                    {{ $item->status_date }}
                   </td>
                   @else
                   <td  >
                    This Not Approved
                   </td>
                   @endif
               
                </tr>
                    @endforeach
                @endif
               
                
    </tbody>
        </table>
        <div class="row mx-2">
            <div class="col-sm-12 col-md-6">
                <div class="dataTables_info text-center" id="DataTables_Table_0_info" role="status" aria-live="polite">
                   {{$signup->links()}}
                </div></div><div class="col-sm-12 col-md-6">
                    <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                        <ul class="pagination">
                            <li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous">
                                <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="previous" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item next disabled" id="DataTables_Table_0_next"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="next" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
        </div>
        <!-- Offcanvas to add new user -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser" aria-labelledby="offcanvasAddUserLabel">
        <div class="offcanvas-header border-bottom">
            <h6 id="offcanvasAddUserLabel" class="offcanvas-title">Add User</h6>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body mx-0 flex-grow-0">
            <form class="add-new-user pt-0 fv-plugins-bootstrap5 fv-plugins-framework" id="addNewUserForm" onsubmit="return false" novalidate="novalidate">
            <div class="mb-3 fv-plugins-icon-container">
                <label class="form-label" for="add-user-fullname">Full Name</label>
                <input type="text" class="form-control" id="add-user-fullname" placeholder="John Doe" name="userFullname" aria-label="John Doe">
            <div class="fv-plugins-message-container invalid-feedback"></div></div>
            <div class="mb-3 fv-plugins-icon-container">
                <label class="form-label" for="add-user-email">Email</label>
                <input type="text" id="add-user-email" class="form-control" placeholder="john.doe@example.com" aria-label="john.doe@example.com" name="userEmail">
            <div class="fv-plugins-message-container invalid-feedback"></div></div>
            <div class="mb-3">
                <label class="form-label" for="add-user-contact">Contact</label>
                <input type="text" id="add-user-contact" class="form-control phone-mask" placeholder="+1 (609) 988-44-11" aria-label="john.doe@example.com" name="userContact">
            </div>
            <div class="mb-3">
                <label class="form-label" for="add-user-company">Company</label>
                <input type="text" id="add-user-company" class="form-control" placeholder="Web Developer" aria-label="jdoe1" name="companyName">
            </div>
            <div class="mb-3">
                <label class="form-label" for="country">Country</label>
                <div class="position-relative"><select id="country" class="select2 form-select select2-hidden-accessible" data-select2-id="country" tabindex="-1" aria-hidden="true">
                <option value="" data-select2-id="2">Select</option>
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
                </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="1" style="width: 352px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-country-container"><span class="select2-selection__rendered" id="select2-country-container" role="textbox" aria-readonly="true"><span class="select2-selection__placeholder">Select Country</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="user-role">User Role</label>
                <select id="user-role" class="form-select">
                <option value="subscriber">Subscriber</option>
                <option value="editor">Editor</option>
                <option value="maintainer">Maintainer</option>
                <option value="author">Author</option>
                <option value="admin">Admin</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="form-label" for="user-plan">Select Plan</label>
                <select id="user-plan" class="form-select">
                <option value="basic">Basic</option>
                <option value="enterprise">Enterprise</option>
                <option value="company">Company</option>
                <option value="team">Team</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
            <input type="hidden"></form>
        </div>
        </div>
    </div>
    </div>
    <!-- / Content -->

    <!-- Footer -->
    <footer class="content-footer footer bg-footer-theme">
    <div class="container-fluid d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
        <div class="mb-2 mb-md-0">
        ©
        <script>
            document.write(new Date().getFullYear());
        </script>2023
        , made with ❤️ by
        <a href="https://pixinvent.com" target="_blank" class="footer-link fw-semibold">PIXINVENT</a>
        </div>
        <div>
        <a href="https://themeforest.net/licenses/standard" class="footer-link me-4" target="_blank">License</a>
        <a href="https://1.envato.market/pixinvent_portfolio" target="_blank" class="footer-link me-4">More Themes</a>

        <a href="https://demos.pixinvent.com/frest-html-admin-template/documentation/" target="_blank" class="footer-link me-4">Documentation</a>

        <a href="https://pixinvent.ticksy.com/" target="_blank" class="footer-link d-none d-sm-inline-block">Support</a>
        </div>
    </div>
    </footer>
    <!-- / Footer -->

    <div class="content-backdrop fade"></div>
</div>
 @endsection


