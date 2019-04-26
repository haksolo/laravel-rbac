@extends('layouts.app')

@section('content')
<div class='container'>
  <form action="{{ route('roles.update', $role) }}" method='POST'>
    @csrf
    @method('PATCH')
    <div class='form-group'>
      <label for='namespace'>Namespace</label>
      <input id='namespace' name='namespace' type='text' value="{{ old('namespace', $role->namespace) }}" class="form-control{{ $errors->has('namespace') ? ' is-invalid' : '' }}" />
      @error('namespace')
      <div class='invalid-feedback'>{{ $message }}</div>
      @enderror
    </div>
    <div class='form-group'>
      <label for='name'>Name</label>
      <input id='name' name='name' type='text' value="{{ old('name', $role->name) }}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" />
      @error('name')
      <div class='invalid-feedback'>{{ $message }}</div>
      @enderror
    </div>
    {{-- {{ $role->rules }} --}}
    <button type='submit' class='btn btn-primary'><span>Submit</span></button>
  </form>
</div>
@endsection
