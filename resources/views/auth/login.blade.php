<x-layout>
    <x-slot:heading>
        Log In
    </x-slot:heading>
    <form method="POST" action="/login">
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
                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form.form-field>
                        <x-form.form-lable for="email">Email</x-form.form-lable>
                        <div class="mt-2">
                            <x-form.form-input name="email" id="email" type="email" />
                            <x-form.form-error name="email" />
                        </div>
                    </x-form.form-field>
                    <x-form.form-field>
                        <x-form.form-lable for="password">Password</x-form.form-lable>
                        <div class="mt-2">
                            <x-form.form-input name="password" id="password" type="password" />
                            <x-form.form-error name="password" />
                        </div>
                    </x-form.form-field>
                    
                </div>
            </div>

        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
            <x-form.from-button>Log In</x-form.from-button>
        </div>
    </form>

</x-layout>
