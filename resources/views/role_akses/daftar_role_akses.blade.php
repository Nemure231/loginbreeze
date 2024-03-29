<x-app-layout>


    <x-slot name="title">
        {{-- config app.name berguna untuk mengambil nama aplikasi dari config/env --}}
        {{ config('app.name') }} - Daftar Role Akses
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Role Akses') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="overflow-x-auto mt-6">


                        @if (session('pesan_role'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('pesan_role') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif


                        <table class="table" id="tabel-role">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Menu</th>
                                    <th scope="col">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($role_n_menu as $rm)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $rm['nama_menu'] }}</td>
                                        <td>
                                            <div class="form-check">
                                                <input id="token_akses_menu" type="hidden" name="_token"
                                                    value="{{ csrf_token() }}" />
                                                @method('put')
                                                <input class="form-check-input" id="pencet" type="checkbox" value=""
                                                    id="flexCheckDefault"
                                                    {{ check_akses($id_role['id_role'], $rm['id_menu']) }}
                                                    data-role="{{ $id_role['id_role'] }}"
                                                    data-menu="{{ $rm['id_menu'] }}">




                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Aktif?
                                                </label>
                                            </div>








                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <script>
                            ///////////////AJAX NON JQUERY TIDAK BERHASIL KARENA VALUE MENU_ID DAN ROLENYA KOSONG ???? ANEH!//////////
                            var val = document.getElementById('token').getAttribute('content');
                            var token = document.getElementById('token_akses_menu').value;
                            var hi = document.getElementsByClassName('form-check-input');
                            Array.prototype.forEach.call(hi, function(element) {
                                element.addEventListener('click', function() {
                                    const menuId = element.dataset.menu;
                                    const roleId = element.dataset.role;

                                    const params = {
                                        menu_id: menuId,
                                        role_id: roleId
                                    }
                                    var request = new XMLHttpRequest();
                                    request.open('PUT', 'ajax', true);
                                    request.setRequestHeader('X-CSRF-TOKEN', token);
                                    request.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
                                    request.send(JSON.stringify(params));
                                    location.reload();
                                });

                            });
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
