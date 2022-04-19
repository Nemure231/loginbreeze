

///Fungsi DOM sudah siap dieksekusi via javascript murni
function ready(fn) {
  if (document.readyState != 'loading') {
    fn();
  } else {
    document.addEventListener('DOMContentLoaded', fn);
  }
}


ready(function () {
  //Memanggil fungsi datatable
  const dataTable = new simpleDatatables.DataTable("#tabel-satuan", {
    searchable: true,
    fixedHeight: true,

  });


});


/////////////

ready(function () {


  document.getElementById('tombol-tambah').addEventListener('click', function () {
    new bootstrap.Modal(document.getElementById('modal-tambah')).show();
  });


  /////////////////EDIT///////////////////


  var tombolEdit = document.getElementsByClassName('tombol-edit');
  Array.prototype.forEach.call(tombolEdit, function (element) {
    element.addEventListener('click', function () {
      new bootstrap.Modal(document.getElementById('modal-edit')).show();

      var e1ModalEdit = document.getElementById('modal-edit');
      e1ModalEdit.addEventListener('shown.bs.modal', function (e) {

        document.getElementById('e-nama-satuan').value = element.dataset.nama_satuan;
        document.getElementById('form-edit').setAttribute("action", "/satuan/" + element.dataset.id_satuan);
        ///fungsi menyimpan data terakhir di local browser
        var id_satuan = element.dataset.id_satuan;
       
        localStorage.setItem("simpan_id_satuan", id_satuan);
      });
    });

  });




  /////////////////////Modal Hapus/////////////////////////////

  var tombolHapus = document.getElementsByClassName('tombol-hapus');
  Array.prototype.forEach.call(tombolHapus, function (element) {
    element.addEventListener('click', function () {
      new bootstrap.Modal(document.getElementById('modal-hapus')).show();

      var e1ModalHapus = document.getElementById('modal-hapus');
      e1ModalHapus.addEventListener('shown.bs.modal', function (e) {

        document.getElementById('form-hapus').setAttribute("action", "/satuan/" + element.dataset.id_satuan);

      });
    });
  });

  
  var tambah = document.getElementById('pesan-validasi-satuan').innerHTML;
  var edit = document.getElementById('pesan-validasi-edit-satuan').innerHTML;

  ///logika 1: jika pada pesan validasi hanya tampil '0    ' maka munculkan sesuai jenis modal

  if (tambah != 0) {
    new bootstrap.Modal(document.getElementById('modal-tambah')).show();
  }

  if (edit != 0) {
    new bootstrap.Modal(document.getElementById('modal-edit')).show();
  }


  var modalEdit = document.getElementById('modal-edit');
   //fungsi mengambil file yang tersimpan di local browser
  var id_satuan = localStorage.getItem("simpan_id_satuan");

  ///event jika: modal pada logika  1 aktif maka ubah atribut action dengan menggambil id_barang di penyimpanan local
  modalEdit.addEventListener('shown.bs.modal', function (event) {

    document.getElementById('form-edit').setAttribute("action", "/satuan/" + id_satuan);

 


  });
  var validasiText = document.getElementById('hapus-validasi');
  var validasiBorder = document.getElementsByClassName('hapus-validasi-border');

  modalEdit.addEventListener('hidden.bs.modal', function (event) {
    //looping dibutuhkan untuk mengeksekusi semua class yang sama
    for (var i = 0; i < validasiBorder.length; i++) {
      validasiBorder[i].classList.remove("is-invalid");
    }

    validasiText.remove("invalid-feedback");


  });



});




