@if ($errors->any())
@foreach ($errors->all() as $error )
    <div class="alert alert-danger text-center" role="alert">
        {{$error}}
      </div>
@endforeach
@endif
