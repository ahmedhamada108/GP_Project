@if ($errors->any())
@foreach ($errors->all() as $error)
    <div class="alert alert-error" role="alert">
        {{ $error }}
    </div>
@endforeach
@endif

