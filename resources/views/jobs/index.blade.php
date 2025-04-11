<x-layout>
    <x-slot:heading>
        Available Jobs
    </x-slot:heading>
    <h1>Be a part of our team. Current Jobs Opening:</h1>
    {{-- {{dd($jobs)}} --}}
    <div class="space-y-4">
        @foreach ($jobs as $job)
            <a href="/jobs/{{ $job['id'] }}" class="block border border-gray-200 px-4 py-6 rounded-lg">
                <div class="font-bold text-sm">{{ $job->employer->name }}</div>
                <div>{{$job['title']}}</div>
            </a>
        @endforeach
    </div>
    <div>
        {{ $jobs->links() }}
    </div>
</x-layout>