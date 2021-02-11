// new TomSelect("#satuan_id",{
// 	create: true,
// 	sortField: {
// 		field: "text",
// 		direction: "asc"
// 	}
// });


function ready(fn) {
  if (document.readyState != 'loading') {
    fn();
  } else {
    document.addEventListener('DOMContentLoaded', fn);
  }
}


/////////////

ready(function () {




  document.getElementById('tombolTambah').addEventListener('click', function () {
    new bootstrap.Modal(document.getElementById('modalTambah')).show();
  });


  /////////////////EDIT///////////////////


  var tombolEdit = document.getElementsByClassName('tombolEdit');
  Array.prototype.forEach.call(tombolEdit, function (element) {
    element.addEventListener('click', function () {
      new bootstrap.Modal(document.getElementById('modalEdit')).show();

      var e1ModalEdit = document.getElementById('modalEdit');
      e1ModalEdit.addEventListener('shown.bs.modal', function (e) {

        // document.getElementById('e_nama_barang').value = element.dataset.nama_barang;
        document.getElementById('e_nama_barang').setAttribute("value", element.dataset.nama_barang);
        document.getElementById('e_harga_barang').value = element.dataset.harga_barang;
        document.getElementById('e_merek_id').value = element.dataset.merek_id;
        document.getElementById('e_satuan_id').value = element.dataset.satuan_id;
        document.getElementById('form_edit').setAttribute("action", "/barang/" + element.dataset.id_barang);

        var id_barang = element.dataset.id_barang;
        var merek_id = element.dataset.merek_id;
        var satuan_id = element.dataset.satuan_id;
        localStorage.setItem("simpan_id_barang", id_barang);
        localStorage.setItem("simpan_merek_id", merek_id);
        localStorage.setItem("simpan_satuan_id", satuan_id);


      });
    });



  });




  /////////////////////Modal Hapus/////////////////////////////

  var tombolHapus = document.getElementsByClassName('tombolHapus');
  Array.prototype.forEach.call(tombolHapus, function (element) {
    element.addEventListener('click', function () {
      new bootstrap.Modal(document.getElementById('modalHapus')).show();

      var e1ModalHapus = document.getElementById('modalHapus');
      e1ModalHapus.addEventListener('shown.bs.modal', function (e) {

        document.getElementById('form_hapus').setAttribute("action", "/barang/" + element.dataset.id_barang);

      });
    });
  });


  var tambah = document.getElementById('pesan_validasi_barang').innerHTML;
  var edit = document.getElementById('pesan_validasi_edit_barang').innerHTML;

  // tamba = (tambah.trim) ? htmlstring.trim() : tambah.replace(/^\s+/,'');
  // edi = (edit.trim) ? htmlstring.trim() : edit.replace(/^\s+/,'');

  if (tambah != '0    ') {
    new bootstrap.Modal(document.getElementById('modalTambah')).show();
  }

  if (edit != '0    ') {
    new bootstrap.Modal(document.getElementById('modalEdit')).show();
  }


  var myModalEl = document.getElementById('modalEdit');
  var id_barang = localStorage.getItem("simpan_id_barang");
  var satuan = localStorage.getItem("simpan_satuan_id");
  var merek = localStorage.getItem("simpan_merek_id");
  myModalEl.addEventListener('shown.bs.modal', function (event) {

    document.getElementById('form_edit').setAttribute("action", "/barang/" + id_barang);
    document.getElementById('e_satuan_id').value = satuan;
    document.getElementById('e_merek_id').value = merek;


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

