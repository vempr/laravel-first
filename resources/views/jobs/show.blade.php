<x-layout>
  <h1>Job: {{ $job->title }}</h1>
  <p>Salary: {{ $job->salary }}$ per annum.</p>
  <p>Description: {{ $job->description }}</p>

  <a href="/jobs/{{ $job->id }}/edit">Edit Job Listing</a>
</x-layout>