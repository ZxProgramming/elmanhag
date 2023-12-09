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
  <ul class="menu-inner py-1">
        <li class="menu-item ">
          <a href="{{route('Teachers')}}" class="menu-link">

            <i class=" menu-icon tf-icons bx bx-home-circle">

            </i>

            <div>Dashboards <span style="color: #21b93b;"></span></div>
          </a>

          <!--<ul class="menu-sub">-->
          <!--  <li class="menu-item ">-->
          <!--    <a href="{{route('dashboard-analytics')}}" class="menu-link">-->

          <!--      <i class=""></i>-->

          <!--      <div>Analytics</div>-->
          <!--    </a>-->

          <!--  </li>-->
          <!--</ul>-->



        </li>




       

        <li class="menu-item ">
          <a href="{{route('TSubjects')}}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-user"></i>
            <div>Subjects</div>
          </a>
        </li>

        <li class="menu-item ">
          <a href="{{route('TMaterials')}}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-user"></i>
            <div>Materials</div>
          </a>
        </li>

        <li class="menu-item ">
          <a href="{{route('TSignups')}}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-user"></i>
            <div>Signups</div>
          </a>
        </li>

        <li class="menu-item ">
          <a href="{{route('TProfile')}}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-user"></i>
            <div>Profile</div>
          </a>
        </li>



        <li class="menu-item ">
          <a href="" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-user"></i>
            <div>Finance</div>
          </a>

          <ul class="menu-sub">
        
           
            <li class="menu-item "> 
    
                <a href="{{route('TTransaction')}}" class="menu-link">
                  <div>Transaction</div>
                </a>
                <li class="menu-item ">
                  <a href="{{route('TPayout')}}" class="menu-link ">
                    <div>Payout</div>
                  </a>
                </li>
    
            </li>
          </ul>
        </li>

<li class="menu-item ">
  <a href="{{route('login.destroy')}}" class="menu-link">
    <i class="menu-icon tf-icons bx bx-user"></i>
    <div>Logout</div>
  </a>
</li>



  </ul>

</aside>

