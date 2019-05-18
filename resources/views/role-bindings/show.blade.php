@extends('layouts.app')

@section('content')
<div class='container'>
  <div class='float-right'>
    <a href="{{ route('role-bindings.edit', $roleBinding) }}" class='btn btn-secondary'>Edit</a>
    <a href="{{ route('subjects.index', $roleBinding) }}" class='btn btn-primary'>Subjects</a>
  </div>
  <h1>{{ $roleBinding->name }}</h1>
  <div class='card'>
    <div class='card-header'>Subjects</div>
    <div class='card-body'>
      @include('rbac::role-bindings.subjects.list')
    </div>
  </div>
</div>
@endsection
