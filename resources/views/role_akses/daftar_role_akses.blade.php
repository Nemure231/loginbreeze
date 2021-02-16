<x-app-layout>


  <x-slot name="title">
    {{-- config app.name berguna untuk mengambil nama aplikasi dari config/env --}}
    {{config('app.name')}} - Daftar Role Akses
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
              {{session('pesan_role')}}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
                  <th scope="row">{{$loop->iteration }}</th>
                  <td>{{$rm['nama_menu']}}</td>
                  <td>
                    <div class="form-check">
                      {{-- <form method="post" action="/role/role_akses">
                        @csrf
                        @method('put') --}}
                      <input class="form-check-input" id="pencet" type="checkbox" value="" id="flexCheckDefault"
                      {{check_akses($id_role['id_role'], $rm['id_menu']) }}
                      data-role="{{ $id_role['id_role'] }}"
                      data-menu="{{ $rm['id_menu'] }}">
                      {{-- </form> --}}

                      {{-- <input type="hidden" name= value="{{ $id_role['id_role'] }}"> --}}



                      <label class="form-check-label" for="flexCheckDefault">
                        Aktif?
                      </label>
                    </div>

                    



                      {{-- <div class="control-label"></div>
                      <label class="custom-switch">
                        <span class="custom-switch-description mr-2">Tidak aktif</span>
                        <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input">
                      
          
                        <span class="custom-switch-indicator"></span>
                        <span class="custom-switch-description">Aktif</span>
                      </label>
                    </div> --}}

                    
                    

                  </td>

                </tr>
                @endforeach
              </tbody>
            </table>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>

            <script>

            
            ///////////////AJAX NON JQUERY TIDAK BERHASIL KARENA VALUR MENU_ID DAN ROLENYA KOSONG ???? ANEH!//////////
            // var val = document.getElementById('token').getAttribute('content');
            // // alert(val);
            // var hi = document.getElementsByClassName('form-check-input');
            // Array.prototype.forEach.call(hi, function (element) {
            //   element.addEventListener('click', function () {
            //     const menuId = element.dataset.menu;
            //     const roleId = element.dataset.role;
            //       // console.log("menu_id="+menuId+"&"+"role_id="+roleId);
                
            //    const params =  {
            //         menu_id: element.dataset.menu,
            //         role_id: element.dataset.role
            //       }
            //     var request = new XMLHttpRequest();
            //     request.open('PUT', '/role/role_akses/ajax', true);
            //     request.setRequestHeader('X-CSRF-TOKEN', 'application/json';val);
            //     request.send(JSON.stringify(params));
            //   });

            // });

              ///sementara pakai ajax jquery dulu///////
              $('.form-check-input').on('click', function () {

                const menuId = $(this).data('menu');
                const roleId = $(this).data('role');

                $.ajax({
                  url: "/role/role_akses/ajax",
                  type: 'put',
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                  data: {
                    menu_id: menuId,
                    role_id: roleId
                  },
                  success: function () {
                    //Swal.fire('Berhasil', 'Akses berhasil diubah!', 'success');
                    document.location.href = "" + roleId;
                    // location.reload();
                    // return false;
                  }

                });

              });


            </script>

          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>