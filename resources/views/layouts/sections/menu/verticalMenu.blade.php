@php
$configData = Helper::appClasses();
@endphp



<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

<!-- ! Hide app brand if navbar-full -->
@if(!isset($navbarFull))

<style>

img.logo-light
{
height: 160px;
padding-right: 2.25rem;
padding-left: 0;  
}
.dark-style .menu .app-brand.demo a img.logo-light
{
display:none;
}


.light-style .menu .app-brand.demo a img.logo-dark
{
display:none;
}

</style>

<div class="app-brand demo">
<a href="{{url('/')}}" class="app-brand-link">
<img class="logo-light"  src="{{asset('assets/img/elmanhag.png')}}">
<img class="logo-dark"  src="{{asset('assets/img/logo-for-dark.png')}}">





<!--<span class="app-brand-logo demo">-->
<!--  @include('_partials.macros')-->
<!--</span>-->
<!--<span class="app-brand-text demo menu-text fw-bold ms-2">{{config('variables.templateName')}}</span>-->
</a>

<a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
<i class="bx menu-toggle-icon d-none d-xl-block fs-4 align-middle"></i>
<i class="bx bx-x d-block d-xl-none bx-sm align-middle"></i>
</a>
</div>
@endif
{{-- @php
$agency = DB::table('travel_agency')->where('id',auth()->id())->first();
@endphp --}}
<!-- ! Hide menu divider if navbar-full -->
@if(!isset($navbarFull))
<div class="menu-divider mt-0 ">
</div>
@endif

<div class="menu-inner-shadow"></div>
@section('adminMinue')
@isset($admin)
              <ul class="menu-inner py-1">
                <li class="menu-item ">
                  <a href="{{route('dashboard-analytics')}}" class="menu-link">

                    <i class=" menu-icon tf-icons bx bx-home-circle">

                    </i>

                    <div>Dashboards <span style="color: #21b93b;"></span></div>
                  </a>
                </li>




              

                <li class="menu-item ">
                  <a href="" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-user"></i>
                    <div>Education</div>
                  </a>

                  <ul class="menu-sub">
                    <li class="menu-item">
                      <a href="{{route('subjects')}}" class="menu-link">
                  
                        <div>Subjects</div>
                      </a>
                    </li>
                    <li class="menu-item ">
                      <a href="{{route('categories')}}" class="menu-link">
                        <div>Categories</div>
                      </a>
              


                <li class="menu-item ">
                  <a href="" class="menu-link menu-toggle">
                    <i class=" tf-icons bx bx-user"></i>
                    <div>Bundle</div>
                  </a>

                  <ul class="menu-sub">
                    <a href="{{route('bundle_show')}}" class="menu-link">
                      <div>All Bundles</div>
                    </a>
                    <li class="menu-item ">
                      <a href="{{route('bundle')}}" class="menu-link ">
                        <div>Add Bundle</div>
                      </a>
                    </li>
                  </ul>

                </li>
              
                  </ul>

                </li>




                <li class="menu-item ">
                  
                  <a href="" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-user"></i>
                    <div>User</div>
                  </a>

                  <ul class="menu-sub">
                
                  
                    <li class="menu-item ">

                      <a href="" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-user"></i>
                        <div>Teacher</div>
                      </a>
            
                      <ul class="menu-sub">
                        <a href="{{route('teacher_show')}}" class="menu-link">
                          <div>All Teacher</div>
                        </a>
                        <li class="menu-item ">
                          <a href="{{route('teacher')}}" class="menu-link ">
                            <div>Add Teacher</div>
                          </a>
                        </li>
                      </ul>
            
                    </li>

                    

                      
            
                      
                      
                    
                  
                    <li class="menu-item ">

                      <a href="" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-user"></i>
                        <div>Follow Up</div>
                      </a>
                    
                      <ul class="menu-sub">
                      <a href="{{ route('LeaderFollows') }}" class="menu-link">
                        <div>Follow up add</div>
                      </a>
                    
                      <a href="{{ route('Follows') }}" class="menu-link ">
                        <div>Follow up list </div>
                      </a>
                      
                      <a href="{{ route('AddFollow') }}" class="menu-link">
                        <div>Follow leader up</div>
                      </a>
                      <a href="{{ route('add_follow_leader') }}" class="menu-link">
                        <div>Follow leader up add</div>
                      </a>
                      </ul>
                    </li>
                  
                  <li class="menu-item ">

                    <a href="" class="menu-link menu-toggle">
                      <i class="menu-icon tf-icons bx bx-user"></i>
                      <div>User Admin</div>
                    </a>
                  
                    <ul class="menu-sub">
                    <a href="{{ route('User_Admin_Add') }}" class="menu-link">
                      <div>User Admin add</div>
                    </a>
                  
                    <a href="{{ route('User_Admin') }}" class="menu-link ">
                      <div>User Admin list </div>
                    </a>
                     
                    </ul>
                  </li>
              
                

                  <li class="menu-item ">
                    <a href="" class="menu-link menu-toggle">
                      <i class="menu-icon tf-icons bx bx-user"></i>
                      <div>Admins</div>
                    </a>
                  
                      <ul class="menu-sub">
                          <li class="menu-item ">
                            <a href="" class="menu-link">
                              <i class=""></i>
                              <div>Admins List</div>
                            </a>
                          </li>
                          <li class="menu-item ">
                            <a href="" class="menu-link">
                              <i class=""></i>
                              <div>Admin Roles</div>
                            </a>
                          </li>
                      </ul>
                  </li>
                  <li class="menu-item ">
                    <a href="#" class="menu-link ">
                      <div>Video Editor</div>
                    </a>
                  </li>
                </ul>

                </li>



                <li class="menu-item ">
                  
                  <a href="" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-user"></i>
                    <div>Settings</div>
                  </a>

                  <ul class="menu-sub">
                
                  <li class="menu-item ">
                    
                    <a href="{{ route('country') }}" class="menu-link ">
                      <div>Countries </div>
                    </a>
                  </li>
                  <li class="menu-item ">

                    <a href="{{ route('city') }}" class="menu-link ">
                      <div>Cities</div>
                    </a>
                  </li>
                </ul>

                </li>
                <li class="menu-item ">
                  
                  <a href="" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-user"></i>
                    <div>Operation</div>
                  </a>

        <ul class="menu-sub">

            
          <li class="menu-item ">
            <a href="" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-user"></i>
              <div>Sign UP</div>
            </a>

            <ul class="menu-sub">
                <a href="{{ route('signUp') }}" class="menu-link ">
                  <div>Add Sign UP </div>
                </a>
              <a href="{{ route('signUpPending') }}" class="menu-link">
                <div>Sign sUP Pending </div>
              </a>
              <a href="{{ route('signUpApprovedShow') }}" class="menu-link">
                <div>Sign UP Approved </div>
              </a>
              <a href="{{ route('signUpRejectedShow') }}" class="menu-link">
                <div>Sign UP Rejected </div>
              </a>
            </ul>

          </li>
        </ul>


              

              
        <li class="menu-item ">
                  
                  <a href="" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-user"></i>
                    <div>Material</div>
                  </a>

                  <ul class="menu-sub">

                  
                      
                    <li class="menu-item ">
                        <a href="{{route('lesson')}}" class="menu-link">
                          <div> Lesson </div>
                        </a>
            
                        <a href="{{route('VideoEditorAdd')}}" class="menu-link">
                          <div> Video Editor Add </div>
                        </a>
                        <a href="{{route('VideoEditorList')}}" class="menu-link">
                          <div> Video Editor List </div>
                        </a>
                      
            
                    </li>
                </ul>
              
                <li class="menu-item ">
                  
                  <a href="" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-user"></i>
                    <div>Financial</div>
                  </a>

                  <ul class="menu-sub">

                  
                      
                    <li class="menu-item ">
                      <a href="" class="menu-link menu-toggle">
                        <i class="menu-icon  tf-icons bx bx-user"></i>
                        <div>payouts</div>
                      </a>
            
                      <ul class="menu-sub">
                        <a href="{{route('teacher_show')}}" class="menu-link">
                          <div> Bending payouts </div>
                        </a>
                        <a href="{{route('teacher_show')}}" class="menu-link">
                          <div> Rejected payouts </div>
                        </a>
                      
                      
                      </ul>
            
                    </li>
                </ul>


              

              
              
              
          


              
                {{-- <li class="menu-item ">
                  <a href="" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bxs-group"></i>
                    <div>Categories</div>
                  </a>

                  <ul class="menu-sub">
                    <li class="menu-item ">
                      <a href="{{route('categories')}}" class="menu-link">
                        <i class=""></i>
                        <div>Category</div>
                      </a>
                    </li>
                    <li class="menu-item ">
                      <a href="" class="menu-link">
                        <i class=""></i>
                        <div>Subcategory</div>
                      </a>
                    </li>
                  </ul>
                </li> --}}

                {{-- <li class="menu-item ">
                  <a href="" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-user"></i>
                    <div>Users</div>
                  </a> --}}

                  {{-- <li class="menu-item ">
                    <a href="" class="menu-link menu-toggle">
                      <i class="menu-icon tf-icons bx bxs-group"></i>
                      <div>Subjects</div>
                    </a>

                    <ul class="menu-sub">
                      <li class="menu-item ">
                        <a href="" class="menu-link">
                          <i class=""></i>
                          <div>Subject</div>
                        </a>
                      </li>
                      <li class="menu-item ">
                        <a href="" class="menu-link">
                          <i class=""></i>
                          <div>Content</div>
                        </a>
                      </li>
                    </ul>
                  </li> --}}

              
                </li>




                <li class="menu-item ">
                  
                  <a href="" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-user"></i>
                    <div>Bookings</div>
                  </a>

                  <ul class="menu-sub">
                    <li class="menu-item ">
                      <a href="" class="menu-link menu-toggle">
                        <i class=""></i>
                        <div>All Bookings</div>
                      </a>
                        <ul class="menu-sub">
                              <li class="menu-item ">
                              <a href="" class="menu-link">
                                <i class=""></i>
                                <div>Upcoming</div>
                              </a>
                            </li>
                            <li class="menu-item ">
                              <a href="" class="menu-link">
                                <i class=""></i>
                                <div>Past</div>
                              </a>
                            </li>
                        </ul>
                    </li>
                  </ul>

                  <ul class="menu-sub">
                    <li class="menu-item ">
                      <a href="" class="menu-link menu-toggle">
                        <i class=""></i>
                        <div>New Bookings</div>
                      </a>
                        <ul class="menu-sub">
                            <li class="menu-item ">
                              <a href="" class="menu-link">
                                <i class=""></i>
                                <div>Manual Booking</div>
                              </a>
                            </li>
                            <li class="menu-item ">
                              <a href="" class="menu-link">
                                <i class=""></i>
                                <div>Booking Engine</div>
                              </a>
                            </li>


                        </ul>
                    </li>
                  </ul>

                  <ul class="menu-sub">
                    
                    <li class="menu-item ">
                      <a href="" class="menu-link">
                        <i class=""></i>
                        <div>Operations</div>
                      </a>
                    </li>
                  </ul>
                  

                <li class="menu-item ">

                  <a href="" class="menu-link">

                    <i class="menu-icon tf-icons bx bx-import"></i>
                    <div>Requests</div>
                  </a>
                </li>

                  <li class="menu-item ">
                  <a href="" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-import"></i>
                    <div>Requests</div>
                  </a>

                  <ul class="menu-sub">
                    <li class="menu-item ">
                      <a href="" class="menu-link">
                        <i class=""></i>
                        <div>Request List</div>
                      </a>
                    </li>
                    <li class="menu-item ">
                      <a href="" class="menu-link">
                        <i class=""></i>
                        <div>New Request</div>
                      </a>
                    </li>
                    <li class="menu-item ">
                      <a href="" class="menu-link">
                        <i class=""></i>
                        <div>Work Station</div>
                      </a>
                    </li>
                  </ul>
                </li>



                {{-- @if($agency->name == 'admin')
                <li class="menu-item ">
                  <a href="{{ route('b2b_confirmation') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-report"></i>
                    <div><span style="color: #1fb13f;">B2B Confirmation</span></div>
                  </a>
                </li>

                <li class="menu-item ">
                  <a href="" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-import"></i>
                    <div><span style="color: #1fb13f;">Payments</span></div>
                  </a>

                  <ul class="menu-sub">
                    <li class="menu-item ">
                      <a href="{{route('pending_payments')}}" class="menu-link">
                        <i class=""></i>
                        <div>Pending</div>
                      </a>
                    </li>
                    <li class="menu-item ">
                      <a href="{{route('paid_payments')}}" class="menu-link">
                        <i class=""></i>
                        <div>Paid</div>
                      </a>
                    </li>
                    <li class="menu-item ">
                      <a href="{{ route('rejected_payments') }}" class="menu-link">
                        <i class=""></i>
                        <div>Rejected</div>
                      </a>
                    </li>
                  </ul>
                </li>

                @endif --}}


                {{-- <li class="menu-item ">
                  <a href="" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-window-open"></i>
                    <div>Tasks</div>
                  </a>
                </li>
                <li class="menu-item ">
                  <a href="" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-spreadsheet"></i>
                    <div>Inventory</div>
                  </a>

                  <ul class="menu-sub">
                    <li class="menu-item ">
                      <a href="" class="menu-link menu-toggle">
                        <i class=""></i>
                        <div>Rooms</div>
                      </a> --}}

                      {{-- <ul class="menu-sub"> --}}
                        {{-- <li class="menu-item ">
                          <a href="{{ route('hotels') }}" class="menu-link">
                            <i class=""></i>
                            <div>Hotels</div>
                          </a>
                        </li> --}}
                        {{-- <li class="menu-item ">
                          <a href="{{ route('rooms') }}" class="menu-link">
                            <i class=""></i>
                            <div>Rooms</div>
                          </a>
                        </li>
                        <li class="menu-item ">
                          <a href="" class="menu-link">
                            <i class=""></i>
                            <div>Reviews</div>
                          </a>
                        </li>
                        <li class="menu-item ">
                          <a href="{{ route('settings') }}" class="menu-link">
                            <i class=""></i>
                            <div>Settings</div>
                          </a>
                        </li>
                      </ul>
                    </li> --}}


                    {{-- <li class="menu-item ">
                      <a href="" class="menu-link menu-toggle">
                        <i class=""></i>
                        <div>Tours</div>
                      </a>

                    <ul class="menu-sub">
                        <li class="menu-item ">
                          <a href="{{ route('tours') }}" class="menu-link">
                            <i class=""></i>
                            <div>Tours List</div>
                          </a>
                        </li> --}}
                        <!--<li class="menu-item ">-->
                        <!--  <a href="" class="menu-link">-->
                        <!--    <i class=""></i>-->
                        <!--    <div>Attributes</div>-->
                        <!--  </a>-->
                        <!--</li>-->
                        {{-- <li class="menu-item ">
                          <a href="{{ route('terms') }}" class="menu-link">
                            <i class=""></i>
                            <div>Terms</div>
                          </a>
                        </li>
                        <li class="menu-item ">
                          <a href="{{ route('tours_settings') }}" class="menu-link">
                            <i class=""></i>
                            <div>Tour Type</div>
                          </a>
                        </li>
                      </ul>
                    </li> --}}



                    <!--<li class="menu-item ">-->
                    <!--  <a href="" class="menu-link">-->
                    <!--    <i class=""></i>-->
                    <!--    <div>Tours</div>-->
                    <!--  </a>-->
                    <!--</li>-->


                    {{-- <li class="menu-item ">
                      <a href="" class="menu-link menu-toggle">
                        <i class=""></i>
                        <div>Buses</div>
                      </a>

                    <ul class="menu-sub">
                        <li class="menu-item ">
                          <a href="{{ route('busses') }}" class="menu-link">
                            <i class=""></i>
                            <div>All Busses</div>
                          </a>
                        </li>
                        <li class="menu-item ">
                          <a href="{{ route('add_busses') }}" class="menu-link">
                            <i class=""></i>
                            <div>Add Busses</div>
                          </a>
                        </li>
                        <li class="menu-item ">
                          <a href="{{ route('all_trips') }}" class="menu-link">
                            <i class=""></i>
                            <div>All Trips</div>
                          </a>
                        </li>
                        <li class="menu-item ">
                          <a href="{{ route('add_trips') }}" class="menu-link">
                            <i class=""></i>
                            <div>Add Trips</div>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li class="menu-item ">
                      <a href="{{route('flights')}}" class="menu-link">
                        <i class=""></i>
                        <div>Flights</div>
                      </a>
                    </li>
                    <li class="menu-item ">
                      <a href="" class="menu-link">
                        <i class=""></i>
                        <div>Cars</div>
                      </a>
                    </li>
                    <li class="menu-item ">
                      <a href="" class="menu-link">
                        <i class=""></i>
                        <div>Locations</div>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="menu-item ">
                  <a href="" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bxs-group"></i>
                    <div>HRM</div>
                  </a>

                  <ul class="menu-sub">
                    <li class="menu-item ">
                      <a href="{{ route('departments') }}" class="menu-link">
                        <i class=""></i>
                        <div>Departments</div>
                      </a>
                    </li>
                    <li class="menu-item ">
                      <a href="{{ route('employees') }}" class="menu-link">
                        <i class=""></i>
                        <div>Employees</div>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="menu-item ">
                  <a href="" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-bank"></i>
                    <div>Accounting</div>
                  </a>
                </li>
                <li class="menu-item ">
                  <a href="{{ route('invoice') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-bank"></i>
                    <div>Invoices</div>
                  </a>
                </li>
                <li class="menu-item ">
                  <a href="" class="menu-link">
                    <i class="menu-icon tf-icons bx bxs-report"></i>
                    <div>Reports</div>
                  </a>
                </li>
                <li class="menu-item ">
                  <a href="" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-cog"></i>
                    <div>Settings</div>
                  </a>
                    <ul class="menu-sub">
                        <li class="menu-item ">
                          <a href="{{ route('services') }}" class="menu-link">
                            <i class=""></i>
                            <div>Lead Services</div>
                          </a>
                        </li>
                        <li class="menu-item ">
                          <a href="{{ route('source') }}" class="menu-link">
                            <i class=""></i>
                            <div>Lead Source</div>
                          </a>
                        </li>
                        <li class="menu-item ">
                          <a href="{{ route('nationalitiesGroup') }}" class="menu-link">
                            <i class=""></i>
                            <div>Nationality Group</div>
                          </a>
                        </li>
                        <li class="menu-item ">
                          <a href="{{ route('all_taxes') }}" class="menu-link">
                            <i class=""></i>
                            <div>All Taxes</div>
                          </a>
                        </li>
                        <li class="menu-item ">
                          <a href="{{ route('add_tax') }}" class="menu-link">
                            <i class=""></i>
                            <div>Add Tax</div>
                          </a>
                        </li>


                        <li class="menu-item ">
                          <a href="{{ route('languages') }}" class="menu-link">
                            <i class=""></i>
                            <div>Languages</div>
                          </a>
                        </li>
                        <li class="menu-item ">
                          <a href="{{ route('currencies') }}" class="menu-link">
                            <i class=""></i>
                            <div>Currencies</div>
                          </a>
                        </li>
                        <li class="menu-item ">
                          <a href="{{ route('payment_method') }}" class="menu-link">
                            <i class=""></i>
                            <div>Payment methods</div>
                          </a>
                        </li>
                        <li class="menu-item ">
                          <a href="{{ route('markup_control') }}" class="menu-link">
                            <i class=""></i>
                            <div>Markups control</div>
                          </a>
                        </li>
                        <li class="menu-item ">
                          <a href="{{ route('financiales') }}" class="menu-link">
                            <i class=""></i>
                            <div>Financial Account</div>
                          </a>
                        </li>
                        <li class="menu-item ">
                          <a href="{{ route('tickets') }}" class="menu-link">
                            <i class=""></i>
                            <div>Tickets</div>
                          </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item ">
                  <a href="" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-world"></i>
                    <div>Website</div>
                  </a>

                </li>
                <li class="menu-item ">
                  <a href="" class="menu-link">
                    <i class="menu-icon tf-icons bx bxl-android"></i>
                    <div>App</div>
                  </a>

                </li>
                <li class="menu-item ">
                  <a href="" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-revision"></i>
                    <div>Reviews</div>
                  </a>

                </li>
                <li class="menu-item ">
                  <a href="" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bxs-user-account"></i>
                    <div>My Account</div>
                  </a>
                  <ul class="menu-sub">
                        <li class="menu-item ">
                      <a href="" class="menu-link  menu-toggle">
                        <i class=" menu-icon tf-icons bx bx-support"></i>
                        <div>Support</div>
                      </a>
                      <ul class="menu-sub">
                        <li class="menu-item ">
                          <a href="{{route('video_tutorials')}}" class="menu-link">
                            <i class=""></i>
                            <div>Video Tutorials</div>
                          </a>
                        </li>
                        <li class="menu-item ">
                          <a href="{{route('documentations')}}" class="menu-link">
                            <i class=""></i>
                            <div>Documentations</div>
                          </a>
                        </li>
                        <li class="menu-item ">
                          <a href="" class="menu-link menu-toggle">
                            <i class=""></i>
                            <div>Tickets</div>
                          </a>

                          <ul class="menu-sub">
                              <li class="menu-item ">
                                  <a href="{{ route('tickets') }}" class="menu-link">
                                    <i class=""></i>
                                    <div>Open Tickets</div>
                                  </a>
                                </li>
                                <li class="menu-item ">
                                  <a href="{{ route('closed_tickets') }}" class="menu-link">
                                    <i class=""></i>
                                    <div>Closed Tickets</div>
                                  </a>
                                </li>
                          </ul>
                        </li>
                        <!--<li class="menu-item ">-->
                        <!--  <a href="{{route('documentations')}}" class="menu-link">-->
                        <!--    <i class=""></i>-->
                        <!--    <div>Contacts</div>-->
                        <!--  </a>-->
                        <!--</li>-->
                      </ul>
                    </li>
                  </ul>
                </li> --}}





          </ul>

@endisset
@isset($followUp)
<ul class="menu-inner py-1">
  <li class="menu-item ">
    <a href="{{route('follow_up')}}" class="menu-link">

      <i class=" menu-icon tf-icons bx bx-home-circle">

      </i>

      <div>Dashboards <span style="color: #21b93b;"></span></div>
    </a>
  </li>






  <li class="menu-item ">
    <a href="" class="menu-link menu-toggle">
      <i class="menu-icon tf-icons bx bx-user"></i>
      <div>Education</div>
    </a>

    <ul class="menu-sub">
      <li class="menu-item">
        <a href="{{route('subjects')}}" class="menu-link">
    
          <div>Subjects</div>
        </a>
      </li>
      <li class="menu-item ">
        <a href="{{route('categories')}}" class="menu-link">
          <div>Categories</div>
        </a>



  <li class="menu-item ">
    <a href="" class="menu-link menu-toggle">
      <i class=" tf-icons bx bx-user"></i>
      <div>Bundle</div>
    </a>

    <ul class="menu-sub">
      <a href="{{route('bundle_show')}}" class="menu-link">
        <div>All Bundles</div>
      </a>
      <li class="menu-item ">
        <a href="{{route('bundle')}}" class="menu-link ">
          <div>Add Bundle</div>
        </a>
      </li>
    </ul>

  </li>

    </ul>

  </li>







            

@endisset
@isset($VideoEditorLead)
<ul class="menu-inner py-1">
  <li class="menu-item ">
    <a href="{{route('videoEditorLead')}}" class="menu-link">

      <i class=" menu-icon tf-icons bx bx-home-circle">

      </i>
      <div>Dashboards <span style="color: #21b93b;"></span></div>
    </a>
  </li>


  <li class="menu-item ">
    <a href="{{route('ve_l_profile')}}" class="menu-link">
      <i class="menu-icon tf-icons bx bx-user"></i>
      <div>Profile</div>
    </a>
  </li>





  <li class="menu-item ">
    <a href="" class="menu-link menu-toggle">
      <i class="menu-icon tf-icons bx bx-user"></i>
      <div>Education</div>
    </a>

    <ul class="menu-sub">
      <li class="menu-item">
        <a href="{{route('videoEditorLeadSubjects')}}" class="menu-link">
    
          <div>Subjects</div>
        </a>
      </li>
      <li class="menu-item ">
        <a href="{{route('categories')}}" class="menu-link">
          <div>Categories</div>
        </a>



  <li class="menu-item ">
    <a href="" class="menu-link menu-toggle">
      <i class=" tf-icons bx bx-user"></i>
      <div>Bundle</div>
    </a>

    <ul class="menu-sub">
      <a href="{{route('bundle_show')}}" class="menu-link">
        <div>All Bundles</div>
      </a>
      <li class="menu-item ">
        <a href="{{route('bundle')}}" class="menu-link ">
          <div>Add Bundle</div>
        </a>
      </li>
    </ul>

  </li>

    </ul>

  </li>







            

@endisset
@isset($VideoEditor)
<ul class="menu-inner py-1">
  <li class="menu-item ">
    <a href="{{route('videoEditor')}}" class="menu-link">

      <i class=" menu-icon tf-icons bx bx-home-circle">

      </i>

      <div>Dashboards <span style="color: #21b93b;"></span></div>
    </a>
  </li>






  <li class="menu-item ">
    <a href="" class="menu-link menu-toggle">
      <i class="menu-icon tf-icons bx bx-user"></i>
      <div>Education</div>
    </a>

    <ul class="menu-sub">
      <li class="menu-item">
        <a href="{{route('subjects')}}" class="menu-link">
    
          <div>Subjects</div>
        </a>
      </li>
      <li class="menu-item ">
        <a href="{{route('categories')}}" class="menu-link">
          <div>Categories</div>
        </a>



  <li class="menu-item ">
    <a href="" class="menu-link menu-toggle">
      <i class=" tf-icons bx bx-user"></i>
      <div>Bundle</div>
    </a>

    <ul class="menu-sub">
      <a href="{{route('bundle_show')}}" class="menu-link">
        <div>All Bundles</div>
      </a>
      <li class="menu-item ">
        <a href="{{route('bundle')}}" class="menu-link ">
          <div>Add Bundle</div>
        </a>
      </li>
    </ul>

  </li>

    </ul>

  </li>







            

@endisset
@isset($userAdmin)
<ul class="menu-inner py-1">
  <li class="menu-item ">
    <a href="{{route('UserAdmin')}}" class="menu-link">

      <i class=" menu-icon tf-icons bx bx-home-circle">

      </i>

      <div>Dashboards <span style="color: #21b93b;"></span></div>
    </a>
  </li>






  <li class="menu-item ">
    <a href="" class="menu-link menu-toggle">
      <i class="menu-icon tf-icons bx bx-user"></i>
      <div>Setting</div>
    </a>

    <ul class="menu-sub">
      <li class="menu-item">
        <a href="{{route('user_admin_profile')}}" class="menu-link">
    
          <div>Profile</div>
        </a>
      </li>
      <li class="menu-item ">
        {{-- <a href="{{route('categories')}}" class="menu-link">
          <div>Categories</div>
        </a> --}}



  <li class="menu-item ">
    {{-- <a href="" class="menu-link menu-toggle">
      <i class=" tf-icons bx bx-user"></i>
      <div>Bundle</div>
    </a> --}}

    <ul class="menu-sub">
      <a href="{{route('bundle_show')}}" class="menu-link">
        <div>All Bundles</div>
      </a>
      <li class="menu-item ">
        {{-- <a href="{{route('bundle')}}" class="menu-link ">
          <div>Add Bundle</div>
        </a> --}}
      </li>
    </ul>

  </li>
  

    </ul>
    <a href="{{route('login.destroy')}}" class="menu-link">
      <div>Log Out &nbsp; <i class="fa-solid fa-right-from-bracket"></i></div>
    </a>
  </li>

  





            

@endisset
@show






</aside>

