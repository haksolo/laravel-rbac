@extends('domain::domain.security')

@section('content')
<div class='container'>
  <m-card>
    <template #default>
      <a href="{{ route('admin.roles.create') }}" class='btn btn-primary float-right'>Create</a>
      <h1>Roles</h1>
      <table class='table'>
        <thead>
          <tr>
            <!-- <th>Namespace</th> -->
            <th>Name</th>
            <th>Rules</th>
            <th width='10'></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($roles as $role)
          <tr>
            <!-- <td>{{ $role->namespace }}</td> -->
            <td><a href="{{ route('admin.roles.show', $role) }}">{{ $role->name }}</a></td>
            {{-- <td><a href="{{ route('rules.index', $role) }}">{{ $role->rules }}</a></td> --}}
            <td class='text-nowrap'>
              <form action="{{ route('admin.roles.destroy', $role) }}" method='POST'>
                @csrf
                @method('DELETE')
                <a href="{{ route('admin.roles.edit', $role) }}" class='btn btn-secondary btn-sm'>Edit</a>
                <button type='submit' class='btn btn-danger btn-sm'><span>Delete</span></button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </template>
  </m-card>
</div>
@endsection
