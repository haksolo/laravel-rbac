@extends('layouts.app')

@section('content')
<div class='container'>
  <form action="{{ route('roles.store') }}" method='POST'>
    @csrf
    <div class='form-group'>
      <label for='namespace'>Namespace</label>
      <input id='namespace' name='namespace' type='text' value="{{ old('namespace') }}" class="form-control{{ $errors->has('namespace') ? ' is-invalid' : '' }}" />
      @error('namespace')
      <div class='invalid-feedback'>{{ $message }}</div>
      @enderror
    </div>
    <div class='form-group'>
      <label for='name'>Name</label>
      <input id='name' name='name' type='text' value="{{ old('name') }}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" />
      @error('name')
      <div class='invalid-feedback'>{{ $message }}</div>
      @enderror
    </div>
    <button type='submit' class='btn btn-primary'><span>Submit</span></button>
  </form>
</div>
@endsection
