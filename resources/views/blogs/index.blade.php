<x-layout>
    <x-slot:heading>
        Blogs Posts
    </x-slot:heading>
    <h1>Read our Best Articals here:</h1>
    {{-- {{dd($jobs)}} --}}
    <div class="space-y-4">
        @foreach ($blogs as $blog)
            <a href="/blogs/{{ $blog['id'] }}" class="block px-4 py-6 border border-gray-200 rounded-lg">
                <div class="font-bold text-sm">{{$blog->author->name}}</div>
                <div>{{$blog['title']}}</div>
            </a>
        @endforeach
        <div>
            {{ $blogs->links() }}
        </div>
    </div>
</x-layout>