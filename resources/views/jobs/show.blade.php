<x-layout>
    <x-slot:heading>Job</x-slot:heading>
    <div class="flex align-center gap-3">
        <h2 class="font-bold text-lg">{{ $job['title'] }}</h2>
        <p>|</p>
        <p><strong>Employer:</strong> {{ $job->employer->name }}</p>
    </div>
    <p>This job pays {{ $job['salary'] }} per year.</p>
    <div class="mt-6">
        <x-button href="/jobs/{{ $job->id }}/edit">Edit job</x-button>
    </div>
</x-layout>
