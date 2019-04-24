@extends('layouts.app')

@section('content')
<div class='container'>
  <form action="{{ route('role-bindings.update', $roleBinding) }}" method='POST'>
    @csrf
    @method('PATCH')
    <div class='form-group'>
      <label for='namespace'>Namespace</label>
      <input id='namespace' name='namespace' type='text' value="{{ old('namespace', $roleBinding->namespace) }}" class="form-control{{ $errors->has('namespace') ? ' is-invalid' : '' }}" />
      @error('namespace')
      <div class='invalid-feedback'>{{ $message }}</div>
      @enderror
    </div>
    <div class='form-group'>
      <label for='name'>Name</label>
      <input id='name' name='name' type='text' value="{{ old('name', $roleBinding->name) }}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" />
      @error('name')
      <div class='invalid-feedback'>{{ $message }}</div>
      @enderror
    </div>
    <div class='form-group'>
      <label for='role_kind'>Role Kind</label>
      <select id='role_kind' name='role_kind' class="custom-select{{ $errors->has('role_kind') ? ' is-invalid' : '' }}">
        <option value='role' {{ old('role_kind', $roleBinding->role_kind) == 'role' ? 'selected' : '' }}>Role</option>
      </select>
      @error('role_kind')
      <div class='invalid-feedback'>{{ $message }}</div>
      @enderror
    </div>
    <div class='form-group'>
      <label for='role_name'>Role Name</label>
      <select id='role_name' name='role_name' class="custom-select{{ $errors->has('role_name') ? ' is-invalid' : '' }}">
        @foreach ($roles as $option)
        <option value='{{ $option->name }}' {{ old('role_name', $roleBinding->role_name) == $option->name ? 'selected' : '' }}>{{ $option->name }}</option>
        @endforeach
      </select>
      @error('role_name')
      <div class='invalid-feedback'>{{ $message }}</div>
      @enderror
    </div>
    <button type='submit' class='btn btn-primary'><span>Submit</span></button>
  </form>
</div>
@endsection
