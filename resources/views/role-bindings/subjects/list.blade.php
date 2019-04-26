<table class='table table-bordered'>
  <thead>
    <tr>
      <th>Kind</th>
      <th>Subject</th>
      <th width='10'></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($roleBinding->subjects as $subject)
    <tr>
      <td>{{ $subject->subject_kind }}</td>
      <td>{{ $subject->subject }}</td>
      <td class='text-nowrap'>
        <form action="{{ route('subjects.destroy', [$roleBinding, $subject]) }}" method='POST'>
          @csrf
          @method('DELETE')
          <a href="{{ route('subjects.edit', [$roleBinding, $subject]) }}" class='btn btn-primary btn-sm'>Edit</a>
          <button type='submit' class='btn btn-danger btn-sm'><span>Delete</span></button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
