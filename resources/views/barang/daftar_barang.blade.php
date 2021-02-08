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
            <button type="button" class="btn btn-primary mb-4" id="tombolTambah">
              Tambah Barang
            </button>

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
                  <td class="px-4 py-4">{{$db['nama_barang']}}</td>
                  <td class="px-4 py-4">{{$db['merek_id']}}</td>
                  <td class="px-4 py-4">{{$db['satuan_id']}}</td>
                  <td class="px-4 py-4">{{$db['harga_barang']}}</td>
                  <td class="px-4 py-4">


                    <button type="button" class="btn btn-warning tombolEdit" data-nama_barang="{{$db['nama_barang']}}"
                      data-merek_id="{{$db['merek_id']}}" data-satuan_id="{{$db['satuan_id']}}"
                      data-harga_barang="{{$db['harga_barang']}}" data-id_barang="{{$db['id_barang']}}">
                      Edit
                    </button>
                    <button type="button" class="btn btn-danger tombolHapus" data-id_barang="{{$db['id_barang']}}">
                      Hapus
                    </button>

                  </td>

                </tr>
                @endforeach
              </tbody>
            </table>



            {{-- Modal Tambah --}}


            <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form method="post" action="">
                      @csrf
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nama_barang" placeholder="Nama Barang">
                            <label>Nama Barang</label>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="harga_barang" placeholder="Harga Barang">
                            <label>Harga Barang</label>
                          </div>
                        </div>

                        <div class="col-lg-6">
                          <div class="form-floating mb-3">
                            <select class="form-select" id="satuan_id" aria-label="Floating label select example">
                              <option selected value=""></option>

                              @foreach ($satuan as $s)

                              <option value="{{$s['id_satuan']}}">{{$s['nama_satuan']}}</option>

                              @endforeach
                            </select>
                            <label for="floatingSelect">Pilih Satuan</label>
                          </div>
                        </div>

                        <div class="col-lg-6">
                          <div class="form-floating mb-3">
                            <select class="form-select" id="merek_id" aria-label="Floating label select example">
                              <option selected value=""></option>
                              @foreach ($merek as $m)

                              <option value="{{$m['id_merek']}}">{{$m['nama_merek']}}</option>

                              @endforeach
                            </select>
                            <label for="floatingSelect">Pilih Merek</label>
                          </div>
                        </div>



                      </div>


                    </form>

                  </div>
                  <div class="modal-footer">
                    
                    <button type="button" class="btn btn-primary">Simpan</button>
                  </div>
                </div>
              </div>
            </div>






            <!-- Modal Edit-->

            <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body" id="modalBodyEdit">

                    <form method="post" id="form_edit">
                      @method('put')
                      @csrf
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="e_nama_barang" placeholder="Nama Barang">
                            <label>Nama Barang</label>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="e_harga_barang" placeholder="Harga Barang">
                            <label>Harga Barang</label>
                          </div>
                        </div>

                        <div class="col-lg-6">
                          <div class="form-floating mb-3">
                            <select class="form-select" id="e_satuan_id" aria-label="Floating label select example">
                              <option selected value=""></option>

                              @foreach ($satuan as $s)

                              <option value="{{$s['id_satuan']}}">{{$s['nama_satuan']}}</option>

                              @endforeach
                            </select>
                            <label for="floatingSelect">Pilih Satuan</label>
                          </div>
                        </div>

                        <div class="col-lg-6">
                          <div class="form-floating mb-3">
                            <select class="form-select" id="e_merek_id" aria-label="Floating label select example">
                              <option selected value=""></option>
                              @foreach ($merek as $m)

                              <option value="{{$m['id_merek']}}">{{$m['nama_merek']}}</option>

                              @endforeach
                            </select>
                            <label for="floatingSelect">Pilih Merek</label>
                          </div>
                        </div>



                      </div>


                    </form>




                  </div>
                  <div class="modal-footer">

                    <button type="button" class="btn btn-primary">Simpan</button>
                  </div>
                </div>
              </div>
            </div>





            <div class="modal fade" id="modalHapus" tabindex="-1" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body" id="coba4">
                    Yakin ingin menghapus?
                  </div>
                  <div class="modal-footer">
                    <form method="post" id="form_hapus">
                      @method('delete')
                      @csrf
                      <button type="submit" class="btn btn-danger">Ya, hapus</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>


            <script src="{{ asset('js/custom_js/daftar_barang.js') }}" defer></script>















          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>