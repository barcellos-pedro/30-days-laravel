<h1>{{ $job->title }}</h1>

<p>Congrats! Your job is now live on our website.</p>

<p>
    <a href="{{ url('/jobs/' . $job->id) }}" target="_blank">
        View Your Job Listing
    </a>
</p>
