@extends('layouts.app')

@section('content')
<div class='container'>
  <div class='float-right'>
    <a href="{{ route('role-bindings.create') }}" class='btn btn-primary'>Create</a>
  </div>
  <h1>Role Bindings</h1>
  <table class='table table-bordered'>
    <thead>
      <tr>
        <th>Namespace</th>
        <th>Name</th>
        <th>Role</th>
        <th>Subjects</th>
        <th width='10'></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($roleBindings as $roleBinding)
      <tr>
        <td>{{ $roleBinding->namespace }}</td>
        <td><a href="{{ route('role-bindings.show', $roleBinding) }}">{{ $roleBinding->name }}</a></td>
        <td><a href="{{ route('roles.show', $roleBinding->role) }}">{{ $roleBinding->role }}</a></td>
        <td><a href="{{ route('subjects.index', $roleBinding) }}">{{ $roleBinding->subjects }}</a></td>
        <td class='text-nowrap'>
          <form action="{{ route('role-bindings.destroy', $roleBinding) }}" method='POST'>
            @csrf
            @method('DELETE')
            <a href="{{ route('role-bindings.edit', $roleBinding) }}" class='btn btn-primary btn-sm'>Edit</a>
            <button type='submit' class='btn btn-danger btn-sm'><span>Delete</span></button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
