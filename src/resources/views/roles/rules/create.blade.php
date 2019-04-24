@extends('layouts.app')

@section('content')
<div class='container'>
  <form action="{{ route('rules.store', $role) }}" method='POST'>
    @csrf
    <div class='form-group'>
      <label for='resources'>Resources</label>
      <input name='resources' type='text' value="{{ old('resources') }}" class="form-control{{ $errors->has('resources') ? ' is-invalid' : '' }}" />
      @error('resources')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    <div class='form-group'>
      <label for='verbs'>Verbs</label>
      <input name='verbs' type='text' value="{{ old('verbs') }}" class="form-control{{ $errors->has('verbs') ? ' is-invalid' : '' }}" />
      @error('verbs')
      <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    <button type='submit' class='btn btn-primary'><span>Submit</span></button>
  </form>
</div>
@endsection
