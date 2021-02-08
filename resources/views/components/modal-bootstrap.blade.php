{{-- Modal Tambah --}}


<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
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
              <div class="form-floating">
                <input type="text" class="form-control" id="harga_barang" placeholder="Harga Barang">
                <label>Harga Barang</label>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-floating">
                <select class="form-select" id="satuan_id" aria-label="Floating label select example">
                  <option selected value=""></option>
                  {{$slot}}
                 
                  @foreach ($satuan as $s)

                  <option value="{{$s['id_satuan']}}">{{$s['nama_satuan']}}</option>
                      
                  @endforeach
                </select>
                <label for="floatingSelect">Pilih Satuan</label>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-floating">
                <select class="form-select" id="merek_id" aria-label="Floating label select example">
                  <option selected></option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
                <label for="floatingSelect">Pilih Merek</label>
              </div>
            </div>



          </div>


        </form>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
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

        <form method="post" action="">
          @csrf
          <div class="row">
            <div class="col-lg-6">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="e_nama_barang" placeholder="Nama Barang">
                <label>Nama Barang</label>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-floating">
                <input type="text" class="form-control" id="e_harga_barang" placeholder="Harga Barang">
                <label>Harga Barang</label>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-floating">
                <select class="form-select" id="e_satuan_id" aria-label="Floating label select example">
                  <option selected></option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
                <label for="floatingSelect">Pilih Satuan</label>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-floating">
                <select class="form-select" id="e_merek_id" aria-label="Floating label select example">
                  <option selected></option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
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
       




            <div class="modal fade" id="modalHapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body" id="coba4">
                    ...
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
              </div>
            </div>


            <script src="{{ asset('js/custom_js/daftar_barang.js') }}" defer></script>