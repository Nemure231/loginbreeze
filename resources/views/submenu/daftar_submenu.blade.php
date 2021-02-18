<x-app-layout>


  <x-slot name="title">
    {{-- config app.name berguna untuk mengambil nama aplikasi dari config/env --}}
    {{config('app.name')}} - Daftar Submenu
  </x-slot>

  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Daftar Submenu') }}
    </h2>
  </x-slot>
  
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <div class="overflow-x-auto mt-6">
            <button type="button" class="btn btn-primary mb-4" id="tombol-tambah">
              Tambah Submenu
            </button>

            @if (session('pesan_submenu'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{session('pesan_submenu')}}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif


            <table class="table" id="tabel-submenu">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Menu</th>
                  {{-- <th scope="col">Route</th> --}}
                  <th scope="col">Link</th>
                  <th scope="col">Opsi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($submenu as $sm)


                <tr>
                  <th scope="row">{{$loop->iteration }}</th>
                  <td>{{$sm['nama_submenu']}}</td>
                  <td>{{$sm['nama_menu']}}</td>
                  {{-- <td>{{$sm['route_submenu']}}</td> --}}
                  <td>{{$sm['url_submenu']}}</td>
                  <td>


                    <button type="button" class="btn btn-warning tombol-edit" data-nama_submenu="{{$sm['nama_submenu']}}"
                      data-id_submenu="{{$sm['id_submenu']}}"
                      {{-- data-route_submenu="{{$sm['route_submenu']}}" --}}
                      data-url_submenu="{{$sm['url_submenu']}}"
                      data-menu_id="{{$sm['menu_id']}}"
                      
              
                      >
                      Edit
                    </button>
                    <button type="button" class="btn btn-danger tombol-hapus" 
                    data-id_submenu="{{$sm['id_submenu']}}">
                      Hapus
                    </button>

                  </td>

                </tr>
                @endforeach
              </tbody>
            </table>
            
            
            
            <div class="invisible" id="pesan-validasi-submenu">0
              @error('nama_submenu'){{$message}}@enderror
              @error('menu_id'){{$message}}@enderror
              {{-- @error('route_submenu'){{$message}}@enderror --}}
              @error('url_submenu'){{$message}}@enderror
            
            </div>


            <div class="invisible" id="pesan-validasi-edit-submenu">0
              @error('e_nama_submenu'){{$message}}@enderror
              @error('e_menu_id'){{$message}}@enderror
              {{-- @error('e_route_submenu'){{$message}}@enderror --}}
              @error('e_url_submenu'){{$message}}@enderror
            
            </div>

            {{-- Modal Tambah --}}


            <div class="modal fade" id="modal-tambah" tabindex="-1" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Submenu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form method="post" action="{{url('/menu/submenu')}}">
                    @csrf
                  <div class="modal-body">
                   
                      <div class="row">
                        <div class="col-lg-12 mb-3">
                          <label>Nama</label>
                            <input type="text" value="{{old('nama_submenu')}}" class="form-control @error('nama_submenu') is-invalid @enderror" id="nama-submenu" name="nama_submenu">
                            <div class="invalid-feedback">
                             
                              @error('nama_submenu')
                            {{ $message }}
                              @enderror
                             
                            
                            </div>
                          
                       
                         
                        </div>
                        <div class="col-lg-6 mb-3">
                          <label>Menu</label>
                            <select class="form-select @error('menu_id') is-invalid @enderror" id="menu-id"
                              name="menu_id" aria-label="Floating label select example">
                              <option selected value="">--Pilih--</option>

                              @foreach($menu as $m)
                              <option value={{$m['id_menu']}} {{(old('merek_id')==$m['id_menu']?'selected':'')}}>
                                {{$m['nama_menu']}}</option>
                              @endforeach

                            </select>
                            <div class="invalid-feedback">
                             
                              @error('menu_id')
                            {{ $message }}
                              @enderror
                             
                            
                            </div>
                        </div>

{{-- 
                        <div class="col-lg-6 mb-3">
                          <label>Route</label>
                            <input type="text" value="{{old('route_submenu')}}" class="form-control @error('route_submenu') is-invalid @enderror" id="route-submenu" name="route_submenu">
                            <div class="invalid-feedback">
                             
                              @error('route_submenu')
                            {{ $message }}
                              @enderror
                             
                            
                            </div>
                          
                       
                         
                        </div> --}}


                        <div class="col-lg-12 mb-3">
                          <label>Url</label>
                            <input type="text" value="{{old('url_submenu')}}" class="form-control @error('url_submenu') is-invalid @enderror" id="url-submenu" name="url_submenu">
                            <div class="invalid-feedback">
                             
                              @error('url_submenu')
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
                    <h5 class="modal-title" id="exampleModalLabel">Edit Submenu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form method="post" id="form-edit">
                    @method('put')
                    @csrf
                  <div class="modal-body">

                    
                      <div class="row">
                        <div class="col-lg-12 mb-3">
                          <label>Nama</label>
                            <input type="text" name="e_nama_submenu" value="{{old('e_nama_submenu')}}" class="hapus-validasi-border form-control @error('e_nama_submenu') is-invalid @enderror" id="e-nama-submenu">
                            <div class="invalid-feedback" id="hapus-validasi">
                             
                              @error('e_nama_submenu')
                            {{ $message }}
                              @enderror
                             
                             
                            </div>
                          
                        </div>

                        <div class="col-lg-6 mb-3">
                          <label>Menu</label>
                            <select class="form-select @error('e_menu_id') is-invalid @enderror hapus-validasi-border" id="e-menu-id"
                              name="e_menu_id" aria-label="Floating label select example">
                              <option selected value="">--Pilih--</option>

                              @foreach($menu as $m)
                              <option value={{$m['id_menu']}} {{(old('menu_id')==$m['id_menu']?'selected':'')}}>
                                {{$m['nama_menu']}}</option>
                              @endforeach

                            </select>
                        </div>

                        {{-- <div class="col-lg-6 mb-3">
                          <label>Route</label>
                            <input type="text" name="e_route_submenu" value="{{old('e_route_submenu')}}" class="hapus-validasi-border form-control @error('e_route_submenu') is-invalid @enderror" id="e-route-submenu">
                            <div class="invalid-feedback" id="hapus-validasi">
                             
                              @error('e_route_submenu')
                            {{ $message }}
                              @enderror
                             
                             
                            </div>
                          
                        </div> --}}

                        <div class="col-lg-12 mb-3">
                          <label>Url</label>
                            <input type="text" name="e_url_submenu" value="{{old('e_url_submenu')}}" class="hapus-validasi-border form-control @error('e_url_submenu') is-invalid @enderror" id="e-url-submenu">
                            <div class="invalid-feedback" id="hapus-validasi">
                             
                              @error('e_url_submenu')
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
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Submenu</h5>
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


            <script src="{{ asset('js/custom_js/daftar_submenu.js') }}" defer></script>















          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>