@props(['job'])
<x-panel class="flex gap-x-6">
    <div>
        <x-employer-logo :employer="$job->employer" />
    </div>

    <div class="flex-1 flex flex-col">
        <a href="#" class="text-sm self-start text-gray-400">{{ $job->employer->name }}</a>
        <h3 class="text-xl mt-3 font-bold group-hover:text-blue-800 transition-colors duration-300">{{ $job->title }}
        </h3>
        <p class="text-sm text-gray-400 mt-auto">{{ $job->salary }}</p>

    </div>

    <div class="space-x-1">
        @foreach ($job->tags as $tag)
            <x-tag :$tag />
        @endforeach
    </div>
</x-panel>
