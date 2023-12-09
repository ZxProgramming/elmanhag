@if (session()->has('success'))
    <div class="alert alert-success text-center" role="alert">
        {{session()->get('success')}}
    </div>
    {{-- <div class="alert alert-solid-success text-center" role="alert">
      {{session()->get('success')}}
    </div> --}}
@endif

@if (session()->has('faild'))
    <div class="alert alert-danger text-center" role="alert">
        {{session()->get('faild')}}
    </div>
   
@endif
