
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
  const dataTable = new simpleDatatables.DataTable("#tabel-submenu", {
    searchable: true,
    fixedHeight: true,

  });


});


/////////////

ready(function () {



  /////////Modal open
  document.getElementById('tombol-tambah').addEventListener('click', function () {
    new bootstrap.Modal(document.getElementById('modal-tambah')).show();

  });



  var tombolEdit = document.getElementsByClassName('tombol-edit');
  Array.prototype.forEach.call(tombolEdit, function (element) {
    element.addEventListener('click', function () {
      new bootstrap.Modal(document.getElementById('modal-edit')).show();

      var e1ModalEdit = document.getElementById('modal-edit');
      e1ModalEdit.addEventListener('shown.bs.modal', function (e) {

        document.getElementById('e-menu-id').value = element.dataset.menu_id;
        document.getElementById('e-nama-submenu').value = element.dataset.nama_submenu;
        document.getElementById('e-url-submenu').value = element.dataset.url_submenu;
        document.getElementById('form-edit').setAttribute("action", "/menu/submenu/" + element.dataset.id_submenu);

        var status = element.dataset.status_submenu;

        if (status == 1) {
          document.getElementById('e-status-submenu').checked = true;
          document.getElementById('e-status-submenu').value = 1;
        } else {
          document.getElementById('e-status-submenu').checked = false;
          document.getElementById('e-status-submenu').value = 2;
        }

         ///fungsi menyimpan data terakhir di local browser
         var id_submenu = element.dataset.id_submenu;
         var menu_id = element.dataset.menu_id;
 
         localStorage.setItem("simpan_id_submenu", id_submenu);
         localStorage.setItem("simpan_menu_id", menu_id);
         localStorage.setItem("simpan_status_submenu", status);

      });
    });



  });

  ///////////Event checkbox model edit///////////////

  document.getElementById('e-status-submenu').addEventListener('click', function () {

    var cekCheckBoxModalEdit = this.checked;

    if (cekCheckBoxModalEdit == true) {
      document.getElementById('e-status-submenu').value = 1;
    }
    if (cekCheckBoxModalEdit == false) {
      document.getElementById('e-status-submenu').value = 2;
    }

  });




  /////////////////////Modal Hapus/////////////////////////////

  var tombolHapus = document.getElementsByClassName('tombol-hapus');
  Array.prototype.forEach.call(tombolHapus, function (element) {
    element.addEventListener('click', function () {
      new bootstrap.Modal(document.getElementById('modal-hapus')).show();

      var e1ModalHapus = document.getElementById('modal-hapus');
      e1ModalHapus.addEventListener('shown.bs.modal', function (e) {

        document.getElementById('form-hapus').setAttribute("action", "/menu/submenu/" + element.dataset.id_submenu);

      });
    });
  });


  var tambah = document.getElementById('pesan-validasi-submenu').innerHTML;
  var edit = document.getElementById('pesan-validasi-edit-submenu').innerHTML;

  ///logika 1: jika pada pesan validasi hanya tampil '0    ' maka munculkan sesuai jenis modal

  if (tambah != 0) {
    new bootstrap.Modal(document.getElementById('modal-tambah')).show();
  }

  if (edit != 0) {
    new bootstrap.Modal(document.getElementById('modal-edit')).show();
  }


  var modalEdit = document.getElementById('modal-edit');
  //fungsi mengambil file yang tersimpan di local browser
  var ambilIdMenu = localStorage.getItem("simpan_id_submenu");
  var ambilMenuId = localStorage.getItem("simpan_menu_id");
  var ambilStatusSubmenu = localStorage.getItem("simpan_status_submenu");
  ///event jika: modal pada logika  1 aktif maka ubah atribut action dengan menggambil id_barang di penyimpanan local
  modalEdit.addEventListener('shown.bs.modal', function (event) {

    document.getElementById('form-edit').setAttribute("action", "/menu/submenu/" + ambilIdMenu);
    document.getElementById('e-menu-id').value = ambilMenuId;


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
