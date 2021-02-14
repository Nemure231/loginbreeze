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

            <div class="row">
              <div class="col-lg-8 col-md-6 col-sm-6">

                <button type="button" class="btn btn-primary" id="tombolTambah">
                  Tambah Barang
                </button>
              </div>




              <div class="col-lg-4 col-md-6 col-sm-6">

                <div class="d-grid gap-2 d-sm-flex justify-content-end">
                  <a href="{{url('barang/export')}}" class="btn btn-success">
                    Export Excel
                  </a>
                </div>



                <form method="post" action="{{url('barang/import')}}" enctype="multipart/form-data">
                  @csrf
                  

                  <div class="input-group mb-3 mt-3">
                    <input type="file" name="excel_barang" class="form-control"
                      placeholder="Recipient's username" aria-label="Recipient's username"
                      aria-describedby="button-addon2">
                                              <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Import Excel</button>
                       
              
                  </div>
                  <div class="text-danger">

                    @error('excel_barang')
                    {{ $message }}
                    @enderror


                  </div>
                



                </form>
                {{-- <div class="d-grid gap-2 d-md-flex justify-content-md-end"> --}}



              </div>

            </div>

            @if (session('pesan_barang'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{session('pesan_barang')}}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif


            <table class="table" id="tabel-barang">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama Barang</th>
                  <th scope="col">Merek</th>
                  <th scope="col">Satuan</th>
                  <th scope="col">Harga</th>
                  <th scope="col">Opsi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($barang as $db)


                <tr>
                  <th scope="row">{{$loop->iteration }}</th>
                  <td>{{$db['nama_barang']}}</td>
                  <td>{{$db['nama_merek']}}</td>
                  <td>{{$db['nama_satuan']}}</td>
                  <td>{{$db['harga_barang']}}</td>
                  <td>


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


            {{-- @if ($errors->any())
            <div class="invisible">
              <ul>
                @foreach ($errors->all() as $error)
                <li id="pesan_validasi_barang">{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif --}}



            <div class="invisible" id="pesan_validasi_barang">0 @error('harga_barang'){{$message}}@enderror
              @error('nama_barang'){{$message}}@enderror @error('satuan_id'){{$message}}@enderror
              @error('merek_id'){{$message}}@enderror</div>

            <div class="invisible" id="pesan_validasi_edit_barang">0 @error('e_harga_barang'){{$message}}@enderror
              @error('e_nama_barang'){{$message}}@enderror @error('e_satuan_id'){{$message}}@enderror
              @error('e_merek_id'){{$message}}@enderror</div>


            {{-- @if ($errors->any())
            <div class="invisible">
              <ul>
                @foreach ($errors->all() as $error)
                <li id="pesan_validasi_edit_barang">{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif --}}






            {{-- Modal Tambah --}}


            <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form method="post" action="{{url('/barang')}}">
                    @csrf
                    <div class="modal-body">

                      <div class="row">
                        <div class="col-lg-6 mb-3">
                          <label>Nama Barang</label>
                          <input type="text" value="{{old('nama_barang')}}"
                            class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang"
                            name="nama_barang">
                            <x-pesan-validasi-satuan name="nama_barang"/>



                        </div>
                        <div class="col-lg-6 mb-3">
                          <label>Harga Barang</label>
                          <input type="text" value="{{old('harga_barang')}}"
                            class="form-control @error('harga_barang') is-invalid @enderror" id="harga_barang"
                            name="harga_barang">
                            <x-pesan-validasi-satuan name="harga_barang"/>



                        </div>

                        <div class="col-lg-6 mb-3">
                          <label>Satuan</label>
                          <select class="form-select @error('satuan_id') is-invalid @enderror" id="satuan_id"
                            name="satuan_id" aria-label="Floating label select example">
                            <option selected value="">--Pilih--</option>

                            @foreach($satuan as $s)
                            <option value={{$s['id_satuan']}} {{(old('satuan_id')==$s['id_satuan']?'selected':'')}}>
                              {{$s['nama_satuan']}}</option>
                            @endforeach
                          </select>
                          <x-pesan-validasi-satuan name="satuan_id"/>




                        </div>

                        <div class="col-lg-6 mb-3">
                          <label>Merek</label>
                          <select class="form-select @error('merek_id') is-invalid @enderror" id="merek_id"
                            name="merek_id" aria-label="Floating label select example">
                            <option selected value="">--Pilih--</option>

                            @foreach($merek as $m)
                            <option value={{$m['id_merek']}} {{(old('merek_id')==$m['id_merek']?'selected':'')}}>
                              {{$m['nama_merek']}}</option>
                            @endforeach

                          </select>

                          <x-pesan-validasi-satuan name="merek_id"/>


                        </div>



                      </div>




                    </div>
                    <div class="modal-footer">

                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>






            <!-- Modal Edit-->

            <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form method="post" id="form_edit">
                    @method('put')
                    @csrf
                    <div class="modal-body" id="modalBodyEdit">


                      <div class="row">
                        <div class="col-lg-6 mb-3">
                          <label>Nama Barang</label>
                          <input type="text" name="e_nama_barang" value="{{old('e_nama_barang')}}"
                            class="hapus-validasi-border form-control @error('e_nama_barang') is-invalid @enderror"
                            id="e_nama_barang">
                          <div class="invalid-feedback" id="hapus-validasi">

                            @error('e_nama_barang')
                            {{ $message }}
                            @enderror


                          </div>

                        </div>
                        <div class="col-lg-6 mb-3">
                          <label>Harga Barang</label>
                          <input type="text" name="e_harga_barang" value="{{old('e_harga_barang')}}"
                            class="hapus-validasi-border form-control @error('e_harga_barang') is-invalid @enderror"
                            id="e_harga_barang">
                          <div class="invalid-feedback" id="hapus-validasi">

                            @error('e_harga_barang')
                            {{ $message }}
                            @enderror


                          </div>

                        </div>

                        <div class="col-lg-6 mb-3">
                          <label>Satuan</label>
                          <select name="e_satuan_id"
                            class="hapus-validasi-border form-select @error('e_satuan_id') is-invalid @enderror"
                            id="e_satuan_id" aria-label="Floating label select example">
                            <option selected value="">--Pilih--</option>

                            {{-- @foreach ($satuan as $s)

                            <option value="{{$s['id_satuan']}}">{{$s['nama_satuan']}}</option>

                            @endforeach --}}
                            @foreach($satuan as $s)
                            <option value={{$s['id_satuan']}} {{(old('e_satuan_id')==$s['id_satuan']?'selected':'')}}>
                              {{$s['nama_satuan']}}</option>
                            @endforeach
                          </select>
                          <div class="invalid-feedback" id="hapus-validasi">

                            @error('e_satuan_id')
                            {{ $message }}
                            @enderror


                          </div>


                        </div>

                        <div class="col-lg-6 mb-3">
                          <label>Merek</label>
                          <select name="e_merek_id"
                            class="hapus-validasi-border form-select @error('e_merek_id') is-invalid @enderror"
                            id="e_merek_id" aria-label="Floating label select example">
                            <option selected value="">--Pilih--</option>
                            {{-- @foreach ($merek as $m)

                            <option value="{{$m['id_merek']}}">{{$m['nama_merek']}}</option>

                            @endforeach --}}

                            @foreach($merek as $m)
                            <option value={{$m['id_merek']}} {{(old('e_merek_id')==$m['id_merek']?'selected':'')}}>
                              {{$m['nama_merek']}}</option>
                            @endforeach
                          </select>
                          <div class="invalid-feedback" id="hapus-validasi">

                            @error('e_merek_id')
                            {{ $message }}
                            @enderror


                          </div>


                        </div>



                      </div>







                    </div>
                    <div class="modal-footer">

                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>





            <div class="modal fade" id="modalHapus" tabindex="-1" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Barang</h5>
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