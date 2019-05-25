@extends('material::layouts.admin')

@section('content')
<div class='container'>
  <form action="{{ route('admin.roles.update', $role) }}" method='POST'>
    @method('PATCH')
    @csrf

    <x-form-group error="{{ $errors->first('namespace') }}">
      <m-text-field label='Namespace' name='namespace' value="{{ old('namespace', $role->namespace) }}"></m-text-field>
    </x-form-group>

    <x-form-group error="{{ $errors->first('name') }}">
      <m-text-field label='Name' name='name' value="{{ old('name', $role->name) }}"></m-text-field>
    </x-form-group>

    {{-- {{ $role->rules }} --}}
    <m-button type='submit' raised>Submit</m-button>
  </form>
</div>
@endsection
