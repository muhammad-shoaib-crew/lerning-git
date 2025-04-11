<x-layout>
    <x-slot:heading>
        Edit Job - {{ $job->title }}
    </x-slot:heading>
    <form method="POST" action="/jobs/{{ $job->id }}">
        @csrf
        {{-- We set method as POST because our browser only understand GET and POST Request, couldn't understand PATCH or Delete Methods --}}
        {{-- Here is how we are going to tell our framework how to take this request as PATCH Request --}}
        @method('PATCH')

        {{-- Show all validation errors here --}}
        {{-- @if ($errors->any())
            <ul class='mb-5'>
                @foreach ($errors->all() as $error)
                    <li class="text-red-400">
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        @endif --}}

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base/7 font-semibold text-gray-900">Edit Job</h2>
                <p class="mt-1 text-sm/6 text-gray-600">Fill the information below to edit job</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>
                        <div class="mt-2">
                            <div
                                class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <input type="text" name="title" id="title"
                                    class="block min-w-0 grow rounded py-1.5 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                                    placeholder="Shift leader" value="{{ $job->title }}">
                            </div>
                            @error('title')
                                <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                        <label for="salary" class="block text-sm/6 font-medium text-gray-900">Salary</label>
                        <div class="mt-2">
                            <div
                                class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                <input type="text" name="salary" id="salary"
                                    class="block min-w-0 rounded grow py-1.5 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                                    placeholder="$10,000" value="{{ $job->salary }}">
                            </div>
                            @error('salary')
                                <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="mt-6 flex items-center justify-between gap-x-6">
            <div>
                <button form="delete-job-form" class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-red-500">Delete</button>
            </div>
            <div class='flex items-center justify-end gap-x-6'>
                <a href="/jobs/{{ $job->id }}" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
                <button type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Update</button>
            </div>
        </div>
    </form>
    <form method="POST" action="/jobs/{{ $job->id }}" id="delete-job-form" class="hidden">
        @csrf
        @method('DELETE')
    </form>

</x-layout>
