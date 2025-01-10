
<h2>
    {{ $job->title }}
</h2>

<p>
    A new job has been posted on Website:
</p>

<p>
    <a href="{{ url('/jobs/' . $job->id) }}">View the job listing</a>
</p>
