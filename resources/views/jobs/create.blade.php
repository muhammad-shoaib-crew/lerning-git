<x-layout>
    <x-slot:heading>
        Create Job
    </x-slot:heading>
    <form method="POST" action="/jobs">
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
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base/7 font-semibold text-gray-900">Create a new job</h2>
                <p class="mt-1 text-sm/6 text-gray-600">Fill the information below to publish job</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form.form-field>
                        <x-form.form-lable for="title">Title</x-form.form-lable>
                        <div class="mt-2">
                            <x-form.form-input name="title" id="title" placeholder="Shift leader" />
                            <x-form.form-error name="title" />
                        </div>
                    </x-form.form-field>
                    <x-form.form-field>
                        <x-form.form-lable for="salary">Salary</x-form.form-lable>
                        <div class="mt-2">
                            <x-form.form-input name="salary" id="salary" placeholder="$10,000" />
                            <x-form.form-error name="salary" />
                        </div>
                    </x-form.form-field>
                </div>
            </div>

        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
            <x-form.from-button>Save</x-form.from-button>
        </div>
    </form>

</x-layout>
