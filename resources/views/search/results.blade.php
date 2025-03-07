<x-layout>
    <x-page-heading>Search Results</x-page-heading>
    
    <div class="mt-6 space-y-6">
        @foreach ($jobs as $job)
            <x-job-card-wide :$job />
        @endforeach
    </div>

    <div class="mt-6">
        {{ $jobs->links() }}
    </div>
</x-layout>