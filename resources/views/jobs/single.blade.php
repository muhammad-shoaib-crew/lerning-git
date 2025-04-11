<x-layout>
    <x-slot:heading>
        {{ $job['title'] }}
    </x-slot:heading>
    <h1>{{ $job['title'] }}</h1>
    Salary for this job is {{ $job['salary'] }} per month.

    <p class="mt-4">
        <x-button href="/jobs/{{ $job['id'] }}/edit">Edit</x-button>
    </p>
</x-layout>