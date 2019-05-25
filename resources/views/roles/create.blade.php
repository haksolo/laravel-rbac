@extends('domain::domain.security')

@section('content')
<div class='container'>
  <m-card>
    <template #default>
      <form action="{{ route('admin.roles.store') }}" method='POST' class='card-content'>
        @csrf

        <x-form-group error="{{ $errors->first('namespace') }}">
          <m-text-field label='Namespace' name='namespace' value="{{ old('namespace') }}"></m-text-field>
        </x-form-group>

        <x-form-group error="{{ $errors->first('name') }}">
          <m-text-field label='Name' name='name' value="{{ old('name') }}"></m-text-field>
        </x-form-group>

        <m-button type='submit' raised>Submit</m-button>
      </form>
    </template>
  </m-card>
</div>
@endsection
