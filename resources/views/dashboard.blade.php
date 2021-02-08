<x-app-layout>

    
    <x-slot name="title">
        {{-- config app.name berguna untuk mengambil nama aplikasi dari config/env --}}
        {{config('app.name')}} - Dashboard
    </x-slot>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">


                    @if (session('pesan_login'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      {{session('pesan_login')}}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
