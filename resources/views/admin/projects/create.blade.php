@extends("layouts.admin")

@section('currentPage')
{{ __('New project') }}
@endsection

@section("content")

@if(session("message"))
<div class="alert alert-danger" role="alert">
  <strong>{{ session("message") }}</strong>
</div>
@endif

@if($errors->any())
@foreach($errors->all() as $error)
<div class="alert alert-danger" role="alert">
  <strong>{{$error}}</strong>
</div>
@endforeach
@endif

<form action="{{ route('admin.projects.store') }}" method="post">
  @csrf
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Project name">
    @error('name')
    <small class="text-danger">Please, fill the field correctly</small>
    @enderror
  </div>
  <button type="submit" class="btn fw-bold">Insert project</button>
  <button type="reset" class="btn fw-bold mx-3">Reset fields</button>
</form>

@endsection
