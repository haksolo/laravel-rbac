@extends('layouts.app')

@section('content')
<div class='container'>
  <div class='float-right'>
    <a href="{{ route('subjects.create', $roleBinding) }}" class='btn btn-primary'>Create</a>
  </div>
  <h1><a href="{{ route('role-bindings.show', $roleBinding) }}">{{ $roleBinding->name }}</a> subjects</h1>
  @include('rbac::role-bindings.subjects.list')
</div>
@endsection
