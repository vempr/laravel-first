<x-layout>
  <h1>Jobs Page</h1>

  <ul>
    @foreach ($jobs as $job)
    <li>
      <a href="/jobs/{{ $job['id'] }}" class="inline-flex text-sky-600 hover:underline">
        <p>({{ $job->employer->name }})</p>
        <h2 class="font-semibold">{{ $job['title'] }}</h2>
        <p>: Pays {{ $job['salary'] }}$ per annum.</p>
      </a>
    </li>
    @endforeach
  </ul>
</x-layout>