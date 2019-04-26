@extends('layouts.app')

@section('content')
<div class='container'>
  <form action="{{ route('subjects.update', [$roleBinding, $subject]) }}" method='POST'>
    @csrf
    @method('PATCH')
    <div class='form-group'>
      <label for='subject_kind'>Kind</label>
      <select id='subject_kind' name='subject_kind' class="custom-select{{ $errors->has('subject_kind') ? ' is-invalid' : '' }}">
        <option value='user' {{ old('subject_kind', $subject->subject_kind) == 'user' ? 'selected' : '' }}>User</option>
      </select>
      @error('subject_kind')
      <div class='invalid-feedback'>{{ $message }}</div>
      @enderror
    </div>
    <div class='form-group'>
      <label for='subject_id'>ID</label>
      <select id='subject_id' name='subject_id' class="custom-select{{ $errors->has('subject_id') ? ' is-invalid' : '' }}">
        @foreach ($subjects as $option)
        <option value='{{ $option->id }}' {{ old('subject_id', $subject->subject_id) == $option->id ? 'selected' : '' }}>{{ $option->name }}</option>
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
