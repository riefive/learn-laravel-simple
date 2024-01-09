<x-guest-layout>
    <div class="flex flex-col gap-2 py-5">
        @if(session('message'))
            {{ session('message') }}
        @endif
        <x-alert-custom type="error" class="my-4">
            <x-slot:title>
                Server Error
            </x-slot>
            <strong>Whoops!</strong> Something went wrong!
            <x-slot:footer class="text-sm">
                Footer
            </x-slot>
        </x-alert-custom>
    </div>
    <div class="border-b border-gray-200 mt-4 mb-4"></div>
    <form method="POST" action="{{ route('demo-testing') }}">
        @csrf
        <div>
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div class="flex items-center justify-center mt-4">
            <x-primary-button class="ms-4">
                {{ __('Sending') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
