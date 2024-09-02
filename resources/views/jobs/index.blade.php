<x-layout>
    <x-slot:heading>Jobs Listings</x-slot:heading>

    @if($jobs->isNotEmpty())
        <div class="space-y-4">
            @foreach($jobs as $job)
                <a href="/jobs/{{ $job['id'] }}" class="block px-4 py-6 border border-gray-300 rounded-lg">
                    <p class="font-bold text-blue-500 text-sm">{{ $job->employer->name }}</p>
                    <strong>{{ $job['title'] }}</strong>: Pays {{ $job['salary'] }} per year.
                </a>
            @endforeach

            <!-- Pagination -->
            <div>{{ $jobs->links() }}</div>
        </div>
    @else
        <p class="text-xl">No jobs available.</p>
    @endif
</x-layout>
