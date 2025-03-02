<x-layout>
  <h1>Create Job Page</h1>

  <form method="POST" action="/login">
    @csrf

    <label for="name">Name</label>
    <input id="name" name="name" type="text">
    <label for="password">Password</label>
    <input id="password" name="password" type="password">
    
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