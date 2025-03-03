<p>
    Your Job Listing '{{ $job->title }}' is now live.
</p>

<a href="{{ url('/jobs/' . $job->id) }}">
    View your Job Listing
</a>