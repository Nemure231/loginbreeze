<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600 text-justify">
            {{ __('Lupa kata sandi? Tidak masalah. Cukup berikan kami alamat e-mail Anda dan kami akan mengirim e-mail berupa link penggantian kata sandi, yang bisa Anda gunakan untuk mengganti kata sandi.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
       

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('E-mail')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" autofocus />
                <x-pesan-validasi-satuan name="email"/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Kirim') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
