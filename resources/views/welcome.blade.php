<x-layout>
    <section>
        <x-section-heading>Featured Jobs</x-section-heading>

        <div class="grid lg:grid-cols-3 gap-8 mt-5">
            <x-job-card />
            <x-job-card />
            <x-job-card />
        </div>
    </section>

    <section class="mt-8">
        <x-section-heading>Tags</x-section-heading>

        <div class="mt-6 space-x-1">
            <x-tag>Tag</x-tag>
            <x-tag>Tag</x-tag>
            <x-tag>Tag</x-tag>
            <x-tag>Tag</x-tag>
            <x-tag>Tag</x-tag>
        </div>
    </section>

    <section class="mt-8">
        <x-section-heading>Recent Jobs</x-section-heading>

        <div class="mt-6 space-y-6">
            <x-job-card-wide />
            <x-job-card-wide />
            <x-job-card-wide />
        </div>

    </section>
</x-layout>
