<x-layout>
  <h1>Edit Job Page</h1>

  <form method="POST" action="/jobs/{{ $job->id }}">
    @csrf
    @method('PATCH')

    <label for="title">Title</label>
    <input id="title" name="title" type="text" value="{{ $job->title }}">
    <label for="salary">Salary</label>
    <input id="salary" name="salary" type="number" step="any" value="{{ $job->salary }}">
    <label for="description">Description</label>
    <textarea id="description" name="description" type="text">{{ $job->description }}</textarea>
    <button form="delete-form">Delete</button>
    <a href="/jobs/{{ $job->id }}">Cancel</a>
    <button type="submit">Update</button>
  </form>

  @if($errors->any())
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  @endif

  <form method="POST" action="/jobs/{{ $job->id }}" class="hidden" id="delete-form">
    @csrf
    @method('DELETE')
  </form>
</x-layout>