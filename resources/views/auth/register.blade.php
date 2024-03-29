<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        {{-- <x-auth-validation-errors class="mb-4" :errors="$errors" /> --}}

        <form method="POST" action="{{ route('register') }}" novalidate>
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Nama')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                <x-pesan-validasi-satuan name="name"/>
            
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('E-mail')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                <x-pesan-validasi-satuan name="email"/>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Kata Sandi')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
                <x-pesan-validasi-satuan name="password"/>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Konfirmasi Kata Sandi')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
                <x-pesan-validasi-satuan name="name_confirmation"/>
            </div>

            <div class="block mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ url('login') }}">
                    {{ __('Sudah punya akun?') }}
                </a>
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-button class="ml-4">
                    {{ __('Daftar') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
