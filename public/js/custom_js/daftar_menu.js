// new TomSelect("#satuan_id",{
// 	create: true,
// 	sortField: {
// 		field: "text",
// 		direction: "asc"
// 	}
// });

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
  const dataTable = new simpleDatatables.DataTable("#tabel-menu", {
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

        document.getElementById('e-nama-menu').value = element.dataset.nama_menu;
        document.getElementById('form-edit').setAttribute("action", "/menu/" + element.dataset.id_menu);
        ///fungsi menyimpan data terakhir di local browser
        var id_menu = element.dataset.id_menu;
       
        localStorage.setItem("simpan_id_menu", id_menu);
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

        document.getElementById('form-hapus').setAttribute("action", "/menu/" + element.dataset.id_menu);

      });
    });
  });

  
  var tambah = document.getElementById('pesan-validasi-menu').innerHTML;
  var edit = document.getElementById('pesan-validasi-edit-menu').innerHTML;

  ///logika 1: jika pada pesan validasi hanya tampil '0    ' maka munculkan sesuai jenis modal

  if (tambah != 0) {
    new bootstrap.Modal(document.getElementById('modal-tambah')).show();
  }

  if (edit != 0) {
    new bootstrap.Modal(document.getElementById('modal-edit')).show();
  }


  var modalEdit = document.getElementById('modal-edit');
   //fungsi mengambil file yang tersimpan di local browser
  var id_menu = localStorage.getItem("simpan_id_menu");
  // var satuan = localStorage.getItem("simpan_satuan_id");
  // var merek = localStorage.getItem("simpan_merek_id");

  ///event jika: modal pada logika  1 aktif maka ubah atribut action dengan menggambil id_barang di penyimpanan local
  modalEdit.addEventListener('shown.bs.modal', function (event) {

    document.getElementById('form-edit').setAttribute("action", "/menu/" + id_menu);

    //document.getElementById('e_satuan_id').value = satuan;
    // document.getElementById('e_merek_id').value = merek;


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






// //////////////////////MODAL TAILWIND///////////////////////////////

// /////modal tambah/
// var open_edit_modal = document.querySelectorAll('.modal-edit-open')
//     for (var i = 0; i < open_edit_modal.length; i++) {
//       open_edit_modal[i].addEventListener('click', function(event){
//     	event.preventDefault()
//     	toggleModal()
//       })
//     }

//     const overlay = document.querySelector('.modal-overlay')
//     overlay.addEventListener('click', toggleModal)

//     var close_edit_modal = document.querySelectorAll('.modal-edit-close')
//     for (var i = 0; i < close_edit_modal.length; i++) {
//       close_edit_modal[i].addEventListener('click', toggleModal)
//     }
// //////modal edit
// var open_edit_modal = document.querySelectorAll('.modal-edit-open')
//     for (var i = 0; i < open_edit_modal.length; i++) {
//       open_edit_modal[i].addEventListener('click', function(event){
//     	event.preventDefault()
//     	toggleModal()
//       })
//     }

//     const overlay = document.querySelector('.modal-overlay')
//     overlay.addEventListener('click', toggleModal)

//     var close_edit_modal = document.querySelectorAll('.modal-edit-close')
//     for (var i = 0; i < close_edit_modal.length; i++) {
//       close_edit_modal[i].addEventListener('click', toggleModal)
//     }


//     //////////////////////seting
//     document.onkeydown = function(evt) {
//       evt = evt || window.event
//       var isEscape = false
//       if ("key" in evt) {
//     	isEscape = (evt.key === "Escape" || evt.key === "Esc")
//       } else {
//     	isEscape = (evt.keyCode === 27)
//       }
//       if (isEscape && document.body.classList.contains('modal-active')) {
//     	toggleModal()
//       }
//     };





//     function toggleModal () {
//       const body = document.querySelector('body')
//       const modal = document.querySelector('.modal')
//       modal.classList.toggle('opacity-0')
//       modal.classList.toggle('pointer-events-none')
//       body.classList.toggle('modal-active')
//     }

