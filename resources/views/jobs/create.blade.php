<x-layout>
  <h1>Create Job Page</h1>

  <form method="POST" action="/jobs">
    @csrf
    <label for="title">Title</label>
    <input id="title" name="title" type="text">
    <label for="salary">Salary</label>
    <input id="salary" name="salary" type="number" step="any">
    <label for="description">Description</label>
    <textarea id="description" name="description" type="text"></textarea>
    <button type="submit">Create</button>
  </form>

  @if($errors->any())
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  @endif
</x-layout>