<x-app-layout>


  <x-slot name="title">
    {{-- config app.name berguna untuk mengambil nama aplikasi dari config/env --}}
    {{config('app.name')}} - Daftar Merek
  </x-slot>

  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Daftar Merek') }}
    </h2>
  </x-slot>
  
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <div class="overflow-x-auto mt-6">
            <button type="button" class="btn btn-primary mb-4" id="tombol-tambah">
              Tambah Merek
            </button>

            @if (session('pesan_merek'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{session('pesan_merek')}}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif


            <table class="table" id="tabel-merek">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama Merek</th>
                  <th scope="col">Opsi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($merek as $m)


                <tr>
                  <th scope="row">{{$loop->iteration }}</th>
                  <td>{{$m['nama_merek']}}</td>
                  <td>


                    <button type="button" class="btn btn-warning tombol-edit" data-nama_merek="{{$m['nama_merek']}}"
                      data-id_merek="{{$m['id_merek']}}">
                      Edit
                    </button>
                    <button type="button" class="btn btn-danger tombol-hapus" data-id_merek="{{$m['id_merek']}}">
                      Hapus
                    </button>

                  </td>

                </tr>
                @endforeach
              </tbody>
            </table>


         
            
            
            
            <div class="invisible" id="pesan-validasi-merek">0 @error('nama_merek'){{$message}}@enderror 
              {{-- @error('route_merek'){{$message}}@enderror --}}
            </div>

            <div class="invisible" id="pesan-validasi-edit-merek">0 @error('e_nama_merek'){{$message}}@enderror  
              {{-- @error('e_route_merek'){{$message}}@enderror --}}
            </div>


           



          


            {{-- Modal Tambah --}}


            <div class="modal fade" id="modal-tambah" tabindex="-1" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Satuan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form method="post" action="{{url('/merek')}}">
                    @csrf
                  <div class="modal-body">
                   
                      <div class="row">
                        <div class="col-lg-12 mb-3">
                          <label>Nama Merek</label>
                            <input type="text" value="{{old('nama_merek')}}" class="form-control @error('nama_merek') is-invalid @enderror" id="nama-merek" name="nama_merek">
                            <div class="invalid-feedback">
                             
                              @error('nama_merek')
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






            <!-- Modal Edit-->

            <div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form method="post" id="form-edit">
                    @method('put')
                    @csrf
                  <div class="modal-body">

                    
                      <div class="row">
                        <div class="col-lg-12 mb-3">
                          <label>Nama Menu</label>
                            <input type="text" name="e_nama_merek" value="{{old('e_nama_merek')}}" class="hapus-validasi-border form-control @error('e_nama_merek') is-invalid @enderror" id="e-nama-merek">
                            <div class="invalid-feedback" id="hapus-validasi">
                             
                              @error('e_nama_merek')
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





            <div class="modal fade" id="modal-hapus" tabindex="-1" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    Yakin ingin menghapus?
                  </div>
                  <div class="modal-footer">
                    <form method="post" id="form-hapus">
                      @method('delete')
                      @csrf
                      <button type="submit" class="btn btn-danger">Ya, hapus</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>


            <script src="{{ asset('js/custom_js/daftar_merek.js') }}" defer></script>















          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>