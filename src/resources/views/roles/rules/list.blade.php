<table class='table table-bordered'>
  <thead>
    <tr>
      <th>Resources</th>
      <th>Verbs</th>
      <th width='10'></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($role->rules as $rule)
    <tr>
      <td>@json($rule->resources)</td>
      <td>@json($rule->verbs)</td>
      <td class='text-nowrap'>
        <form action="{{ route('rules.destroy', [$role, $rule]) }}" method='POST'>
          @csrf
          @method('DELETE')
          <a href="{{ route('rules.edit', [$role, $rule]) }}" class='btn btn-primary btn-sm'>Edit</a>
          <button type='submit' class='btn btn-danger btn-sm'><span>Delete</span></button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
