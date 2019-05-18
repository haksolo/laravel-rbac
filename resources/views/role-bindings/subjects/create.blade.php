@extends('layouts.app')

@section('content')
<div class='container'>
  <form action="{{ route('subjects.store', $roleBinding) }}" method='POST'>
    @csrf

    <div class='form-group'>
      <label for='subject_kind'>Kind</label>
      <select id='subject_kind' name='subject_kind' class='custom-select'>
        <option value='user' {{ old('subject_kind') == 'user' ? 'selected' : '' }}>User</option>
      </select>
      @error('subject_kind')
      <div class='invalid-feedback'>{{ $message }}</div>
      @enderror
    </div>
    <div class='form-group'>
      <label for='subject_id'>Kind</label>
      <select id='subject_id' name='subject_id' class='custom-select'>
        @foreach ($subjects as $option)
        <option value='{{ $option->id }}' {{ old('subject_id') == $option->id ? 'selected' : '' }}>{{ $option->name }}</option>
        @endforeach
      </select>
      @error('subject_id')
      <div class='invalid-feedback'>{{ $message }}</div>
      @enderror
    </div>
    <button type='submit' class='btn btn-primary'><span>Submit</span></button>
  </form>
</div>
@endsection
