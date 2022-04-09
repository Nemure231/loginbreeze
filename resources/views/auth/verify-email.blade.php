<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600 text-justify">
            {{ __('Terima kasih sudah mendaftar! Sebelum masuk ke aplikasi, Anda harus mem-verifikasi e-mail dengan cara menekan link verifikasi yang sudah kami kirim lewat e-mail yang Anda daftarkan saat melakukan registrasi.')}}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600 text-justify">
                {{ __('Pesan verifikasi yang baru telah dikirim kembali, silakan periksa e-mail Anda.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-button>
                        {{ __('Kirim ulang verifikasi e-mail') }}
                    </x-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Keluar') }}
                </button>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout>
