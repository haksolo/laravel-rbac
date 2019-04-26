@extends('layouts.app')

@section('content')
<div class='container'>
  <div class='float-right'>
    <a href="{{ route('roles.edit', $role) }}" class='btn btn-secondary'>Edit</a>
    <a href="{{ route('rules.index', $role) }}" class='btn btn-primary'>Rules</a>
  </div>
  <h1>{{ $role->name }}</h1>
  <div class='card'>
    <div class='card-header'>Rules</div>
    <div class='card-body'>
      @include('rbac::roles.rules.list')
    </div>
  </div>
</div>
@endsection
