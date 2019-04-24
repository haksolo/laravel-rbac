@extends('layouts.app')

@section('content')
<div class='container'>
  <a href="{{ route('rules.create', $role) }}" class='btn btn-primary float-right'>Create</a>
  <h1><a href="{{ route('roles.show', $role) }}">{{ $role->name }}</a> rules</h1>
  @include('rbac::roles.rules.list')
</div>
@endsection
