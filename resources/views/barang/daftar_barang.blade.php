<x-app-layout>


  <x-slot name="title">
    {{-- config app.name berguna untuk mengambil nama aplikasi dari config/env --}}
    {{config('app.name')}} - Daftar Barang
  </x-slot>

  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Daftar Barang') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <div class="overflow-x-auto mt-6">

            <table class="table-auto border-collapse w-full">
              <thead>
                <tr class="rounded-lg text-sm font-medium text-gray-700 text-left" style="font-size: 0.9674rem">
                  <th class="px-4 py-2 bg-gray-200 " style="background-color:#f8f8f8">Nama Barang</th>
                  <th class="px-4 py-2 " style="background-color:#f8f8f8">Merek</th>
                  <th class="px-4 py-2 " style="background-color:#f8f8f8">Satuan</th>
                  <th class="px-4 py-2 " style="background-color: #f8f8f8">Harga</th>
                  <th class="px-4 py-2 " style="background-color: #f8f8f8">Opsi</th>
                </tr>
              </thead>
              <tbody class="text-sm font-normal text-gray-700">
                @foreach ($barang as $db)
                    
                
                <tr class="hover:bg-gray-100 border-b border-gray-200 py-10">
                  <td class="px-4 py-4">{{$db->nama_barang}}</td>
                  <td class="px-4 py-4">{{$db->merek_id}}</td>
                  <td class="px-4 py-4">{{$db->satuan_id}}</td>
                  <td class="px-4 py-4">{{$db->harga_barang}}</td>
                  <td class="px-4 py-4">
                    {{-- data-bs-toggle="modal" data-bs-target="#modalEdit" 
                    
                    data-bs-toggle="modal" data-bs-target="#modalHapus"
                    
                    --}}
                    <button type="button"  id="tombolEdit" class="btn btn-warning" > 
                      Edit
                    </button>
                    <button type="button" id="tombolHapus" class="btn btn-danger">
                      Hapus
                    </button>
                  </td>

                </tr>
                @endforeach
              </tbody>
            </table>
            

           <!-- Modal Edit-->
            <div class="modal fade" id="modalEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body" id="coba3">
                    ...
                  </div>
                  <div class="modal-footer">
          
                    <button type="button" class="btn btn-primary">Simpan</button>
                  </div>
                </div>
              </div>
            </div>


            <!-- Modal Hapus-->
            <div class="modal fade" id="modalHapus" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Hapus Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    ...
                  </div>
                  <div class="modal-footer">
          
                    <button type="button" class="btn btn-primary">Simpan</button>
                  </div>
                </div>
              </div>
            </div>



            <script>
              
              document.getElementById('tombolEdit').addEventListener("click", function(e){

                var tampilModalEdit = new bootstrap.Modal(document.getElementById('modalEdit'));

                tampilModalEdit.show();

              });

                  var e1ModalEdit = document.getElementById('modalEdit');
                  e1ModalEdit.addEventListener('shown.bs.modal', function (e) {

                    document.getElementById('coba3').innerHTML = "Johnny Bravo";
                  });

             
                  /////////////////////Modal Hapus/////////////////////////////

                  document.getElementById('tombolHapus').addEventListener("click", function(e){

                  var tampilModalHapus = new bootstrap.Modal(document.getElementById('modalHapus'));

                  tampilModalHapus.show();

                  });


                  var e1ModalHapus = document.getElementById('modalHapus');

                
                    e1ModalHapus.addEventListener('shown.bs.modal', function (e) {

                    document.getElementById('coba3').innerHTML = "Johnny Silverhand";
                    });
                  

            </script>

            
            
            
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>