<x-layout>
  <h1>Register Page</h1>

  <form method="POST" action="/register">
    @csrf
    
    <label for="name">Name</label>
    <input id="name" name="name" type="text">
    <label for="email">Email</label>
    <input id="email" name="email" type="email">
    <label for="password">Password</label>
    <input id="password" name="password" type="password">
    <label for="password_confirmation">Password Confirmation</label>
    <input id="password_confirmation" name="password_confirmation" type="password">

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