$(() => {
    $('#tbl_mahasiswa').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
    }); // for datatables

    bsCustomFileInput.init(); // for input file button

    $('#input_jurusan').select2({
        theme: 'bootstrap4'
    }); // select2 bs4
});

function delete_mahasiswa(params) {
    var tanya = confirm('Anda yakin ingin menghapus..?');
    if (tanya == true) {window.location.href = ''+params+'';} else {return false;}
}