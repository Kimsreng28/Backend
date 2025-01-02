<x-layout>
    <x-slot:heading>
        Jobs List
    </x-slot:heading>


    @foreach ($job as $job)
    <li>
        <a href="/jobs/{{ $job['id']}}">
        <strong class="underline">{{ $job['title']}} </strong>: Pays {{ $job['salary']}} per month.
        </a>
    </li>
    @endforeach
</x-layout>
