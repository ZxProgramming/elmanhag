@push('pricing-script')
<script src="{{asset('assets/js/pages-pricing.js')}}"></script>
@endpush

<!-- Pricing Modal -->
<div class="modal fade" id="pricingModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-simple modal-pricing">
    <div class="modal-content bg-body p-2 p-md-5">
      <div class="modal-body">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <!-- Pricing Plans -->
        <div class="pricing-plans">
          <h2 class="text-center mb-3 mt-0 mt-md-4">Find the right plan for your site</h2>
          <p class="text-center"> Get started with us - it's perfect for individuals and teams. Choose a subscription plan that meets your needs. </p>
          <!--<div class="d-flex align-items-center justify-content-center flex-wrap gap-2 py-5">-->
          <!--  <label class="switch switch-primary ms-sm-5 ps-sm-5 me-0">-->
          <!--    <span class="switch-label">Monthly</span>-->
          <!--    <input type="checkbox" class="switch-input price-duration-toggler" checked />-->
          <!--    <span class="switch-toggle-slider">-->
          <!--      <span class="switch-on"></span>-->
          <!--      <span class="switch-off"></span>-->
          <!--    </span>-->
          <!--    <span class="switch-label">Annual</span>-->
          <!--  </label>-->
          <!--  <div class="mt-n5 ms-n5 ml-2 mb-2 d-none d-sm-block">-->
          <!--    <i class="bx bx-subdirectory-right bx-sm rotate-90 text-muted scaleX-n1-rtl"></i>-->
          <!--    <span class="badge badge-sm bg-label-primary rounded-pill">Get 2 months free</span>-->
          <!--  </div>-->
          <!--</div>-->
<div class="row mx-0 gy-3">
  @php
    // Retrieve all packages and durations
    $packages = DB::table('packages')->get();
    $durations = DB::table('package_durations')->get();
  @endphp
  @foreach($packages as $pkg)
  @php
                                    if($pkg->package_duration_limit1=="0.83") {
                                        $package_duration1 = "Monthly";
                                    }
                                    elseif($pkg->package_duration_limit1=="0.25"){
                                        $package_duration1 = "Quartly";
                                    }
                                    elseif($pkg->package_duration_limit1=="0.5"){
                                        $package_duration1 = "Semi-Annually";
                                    }
                                    elseif($pkg->package_duration_limit1=="1"){
                                        $package_duration1 = "Annually";
                                    }
                                    elseif($pkg->package_duration_limit1=="2"){
                                        $package_duration1 = "Bi-Annually";
                                    }
                                @endphp
    <div class="col-xl mb-lg-0 lg-4">
      <div class="card">
        <div class="card-body">
          <h5 class="text-start text-uppercase">{{ $pkg->package_name }}</h5>

          <div class="text-center position-relative mb-4 pb-1">
            <div class="mb-2 d-flex">
              @php
                $packageDurations = $durations->where('duration_package', $pkg->package_id);

              @endphp
              <h1 class="price-toggle text-primary price-yearly mb-0"></h1>
              <h1 class="price-toggle text-primary price-monthly mb-0 d-none"></h1>
              <sub class="h5 text-muted pricing-duration mt-auto mb-2">${{ $pkg->start_from }}/mo</sub>
            </div>
            <!--<small class="position-absolute start-0 m-auto price-yearly price-yearly-toggle text-muted">$/ year</small>-->
          </div>

          <hr>

          <ul class="list-unstyled pt-2 pb-1">
            
              <li class="mb-2">
                <span class="badge badge-center w-px-20 h-px-20 rounded-pill bg-primary me-2">
                  <i class="bx bx-check bx-xs"></i>
                </span>
                {!! $pkg->description !!}
              </li>
        
          </ul>
            @if($package->package_id == $pkg->package_id)
          <button type="button" class="btn btn-primary d-grid w-100" disabled>Get Started</button>
          @else
          <a href="{{ url('pages/account-settings-package/'.$pkg->package_id) }}" class="btn btn-primary d-grid w-100">Get Started</a>
          @endif
        </div>
      </div>
    </div>
  @endforeach
</div>
        </div>
        <!--/ Pricing Plans -->
      </div>
    </div>
  </div>
</div>
<!--/ Pricing Modal -->
