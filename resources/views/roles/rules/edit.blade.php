@extends('layouts.app')

@section('content')
<div class='container'>
  <form action="{{ route('rules.update', [$role, $rule]) }}" method='POST'>
    @csrf
    @method('PATCH')
    <div class='form-group'>
      <label for='resources'>Resources</label>
      <input name='resources' type='text' value='{{ join(", ", $rule->resources ?: []) }}' class='form-control' />
    </div>
    <div class='form-group'>
      <label for='verbs'>Verbs</label>
      <input name='verbs' type='text' value='{{ join(", ", $rule->verbs ?: []) }}' class='form-control' />
    </div>
    <button type='submit' class='btn btn-primary'><span>Submit</span></button>
  </form>
</div>
@endsection
