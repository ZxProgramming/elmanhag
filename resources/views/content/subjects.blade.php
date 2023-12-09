        @extends('layouts/layoutMaster')
        @php
        $admin='Minue';
        $Full='Minue';
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js" integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <!-- Users List Table -->
        <div class="card">
        @if(session()->has('msg'))
        @php
        echo session()->get('msg');
        @endphp
        @endif
        @include('success')
        <div class="card-header border-bottom">
        <h5 class="card-title">Subjects</h5>

        {{-- <button type="reset" class="btn btn-primary btn-block glow users-list-clear mb-0" style="float:left;" data-bs-toggle="modal" data-bs-target="#filter_modal">Filter</button> --}}
            <button type="reset" class="btn btn-primary btn-block glow users-list-clear mb-0" style="float:right;" data-bs-toggle="modal" data-bs-target="#animationModal"><i class="bx bx-plus me-0 me-lg-2"></i>Add New
                Subject</button>
        </div>
        <div class="card-datatable table-responsive" style="overflow-x: visible">
        <table class="datatables-users border-top table" id="cm-list">
        <thead>
        <tr>
            <th>#</th>
            <th>Subject</th>
            <th>Category</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($subjects as $subject)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$subject->name}}</td>
                @php
                $category=DB::table('categories')->where('id',$subject->category_id)->get();
                @endphp
                        @foreach($category as $categories)
                        <td>{{ $categories->category }}</td>
                        @endforeach
                        <td>{{$subject->price}} EGP</td>
                <td>
                    <div class="dropdown">
                        <a href="javascript:;" class="btn dropdown-toggle hide-arrow text-body p-0" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-start" style="">
                            {{-- <div class="dropdown-divider"></div> --}}
                            <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#EditLead{{ $subject->id }}">Edit</a>
                            <a href="{{ route('content',['id'=>$subject->id]) }}" class="dropdown-item" >Content</a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('deleteSubject',['id'=>$subject->id]) }}" class="dropdown-item delete-record text-danger">Delete</a>
                            {{-- <button type="submit"class="btn btn-danger">Delete</button> --}}
                        </div>
                    </div>
                </td>
            </tr>
        
        @endforeach
            </tbody>
        </table>
        </div>

        <!-- Modal -->
    <div class="modal fade animate__animated animate__jackInTheBox" id="animationModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content" style="overflow-y: scroll">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel5">Add Subject</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" id="leads_form" action="{{ route('addSubject') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                            <label for="nameAnimation" class="form-label">Subject</label>
                            <input type="text" name="name" id="name" class="form-control lead_input" required placeholder="Enter Category">
                        </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label">Category</label>
                                <select name="category_id" class="form-control">
                                <option value="">Select Category</option>
                                @php
                                    $categories=DB::table('categories')->get();
                                @endphp
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->category}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                            <label for="nameAnimation" class="form-label">Price</label>
                            <input type="number" name="price" id="name" class="form-control lead_input" required placeholder="Enter Price">
                        </div>
                        </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="add_lead_btn">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
</div>

        <!--Buttons-->




        {{-- Model Edet  --}}
        <div class="modal fade animate__animated animate__jackInTheBox" id="buttons_modal" tabindex="-1" aria-hidden="true">
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
                            {{-- Model Add Lesson --}}
                            <div class="modal fade animate__animated animate__jackInTheBox" id="EditLead{{ $subject->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                    <div class="modal-content" style="overflow-y: scroll">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel5">Edit Subject</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="POST" action=" {{route('editSubject',['id'=>$subject->id])}} " enctype="multipart/form-data">
                                            @csrf
                                            {{-- <input type="hidden" name="lead_id" value="{{$lead->id}}"> --}}
                                            <div class="modal-body">
                                            <div class="row">
                                                <div class="col mb-3">
                                                <label for="nameAnimation" class="form-label">Subject</label>
                                                <input type="text" name="name" id="name" class="form-control lead_input" required placeholder="Enter Category" value="{{$subject->name}}">
                                            </div>
                                            </div>
                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label class="form-label">Category</label>
                                                    <select name="category_id" class="form-control">
                                                    <option value="">Select Category</option>
                                                    @php
                                                        $categories=DB::table('categories')->get();
                                                    @endphp
                                                    @foreach ($categories as $category)
                                                    <option value="{{$category->id}}" {{  $category->id ==  $subject->category_id ? 'selected' : '' }}>{{$category->category}}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col mb-3">
                                                <label for="nameAnimation" class="form-label">Price</label>
                                                <input type="number" name="price" id="name" class="form-control lead_input" required placeholder="Enter Price" value="{{$subject->price}}">
                                            </div>
                                            </div>
                        
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary" id="add_lead_btn">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- Model Add Lesson --}}

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


