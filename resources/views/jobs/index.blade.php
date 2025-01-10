<x-layout>
    <x-slot:heading>
        Jobs List
    </x-slot:heading>


    <ul class="space-y-4">
        @foreach ($jobs as $job)
            <a href="/jobs/{{ $job['id']}}" class="block rounded-md  px-4 py-6 border border-gray-200 ">
                <div class="font-bold text-blue-500">
                    {{ $job->employer->name }}
                </div>
                <div>
                    <strong >{{ $job['title']}} </strong>: Pays {{ $job['salary']}} per month.
                </div>
            </a>
        @endforeach

        <div>
            {{ $jobs->links() }}
        </div>
    </ul>
</x-layout>
