<x-app-layout>


  <x-slot name="title">
    {{-- config app.name berguna untuk mengambil nama aplikasi dari config/env --}}
    {{config('app.name')}} - Daftar Role
  </x-slot>

  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Daftar Role') }}
    </h2>
  </x-slot>
  
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <div class="overflow-x-auto mt-6">
            <button type="button" class="btn btn-primary mb-4" id="tombol-tambah">
              Tambah Role
            </button>

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
                  <th scope="col">Nama Role</th>
                  <th scope="col">Opsi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($role as $r)


                <tr>
                  <th scope="row">{{$loop->iteration }}</th>
                  <td>{{$r['nama_role']}}</td>
                  <td>


                    <button type="button" class="btn btn-warning tombol-edit" data-nama_role="{{$r['nama_role']}}"
                      data-id_role="{{$r['id_role']}}">
                      Edit
                    </button>
                    <button type="button" class="btn btn-danger tombol-hapus" data-id_role="{{$r['id_role']}}">
                      Hapus
                    </button>

                    <a href="{{url('/role/role_akses')}}/{{$r['id_role']}}" class="btn btn-danger tombol-primary" data-id_role="{{$r['id_role']}}">
                      Akses
                    </a>

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
            
            
            
            <div class="invisible" id="pesan-validasi-role">0 @error('nama_role'){{$message}}@enderror</div>

            <div class="invisible" id="pesan-validasi-edit-role">0 @error('e_nama_role'){{$message}}@enderror</div>


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


            <div class="modal fade" id="modal-tambah" tabindex="-1" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form method="post" action="{{url('/role')}}">
                    @csrf
                  <div class="modal-body">
                   
                      <div class="row">
                        <div class="col-lg-12 mb-3">
                          <label>Nama Role</label>
                            <input type="text" value="{{old('nama_role')}}" class="form-control @error('nama_role') is-invalid @enderror" id="nama-role" name="nama_role">
                            <div class="invalid-feedback">
                             
                              @error('nama_role')
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
                    <h5 class="modal-title" id="exampleModalLabel">Edit Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form method="post" id="form-edit">
                    @method('put')
                    @csrf
                  <div class="modal-body">

                    
                      <div class="row">
                        <div class="col-lg-12 mb-3">
                          <label>Nama Role</label>
                            <input type="text" name="e_nama_role" value="{{old('e_nama_role')}}" class="hapus-validasi-border form-control @error('e_nama_role') is-invalid @enderror" id="e-nama-role">
                            <div class="invalid-feedback" id="hapus-validasi">
                             
                              @error('e_nama_role')
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
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Role</h5>
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


            <script src="{{ asset('js/custom_js/daftar_role.js') }}" defer></script>















          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>