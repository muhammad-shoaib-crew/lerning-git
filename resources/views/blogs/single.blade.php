<x-layout>
    <x-slot:heading>
        Blogs
    </x-slot:heading>
    <h1>{{ $blog['title'] }}</h1>
    <p>Author: {{$author}}</p>
    <p> {{ $blog['content'] }} </p>
</x-layout>