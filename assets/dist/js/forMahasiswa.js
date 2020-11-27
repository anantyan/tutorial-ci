var base_url = window.location;

$(() => {
	/* let data = {
		"m2m:cin": {
			"rn": "cin_VsG3KJbMTKKQBPqH",
			"ty": 4,
			"ri": "/antares-cse/cin-VsG3KJbMTKKQBPqH",
			"pi": "/antares-cse/cnt-sXKFT5DOSCGLXwnV",
			"ct": "20201123T202158",
			"lt": "20201123T202158",
			"st": 0,
			"cnf": "text/plain:0",
			"cs": 126,
			"con": "{\"temperature\":27,\"humidity\":79,\"wind_speed\":8.708709,\"rain_level\":0.572246,\"latitude\":\"-6.8718189\",\"longitude\":\"107.5872477\"}"
		}
	}
	data['m2m:cin']['con'] = JSON.parse(data['m2m:cin']['con'])
	alert(data['m2m:cin']); // ini hanya example data */

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

	$('#btn_add_mahasiswa').on('click', function () {
		base_url.href = $(this).data('params');
	}); // on click single without body

	$('body').on('click', '#btn_detail_mahasiswa', function () {
		base_url.href = $(this).data('params');
	}); // on click multiple with body

	$('body').on('click', '#btn_update_mahasiswa', function () {
		base_url.href = $(this).data('params');
	}); // on click multiple with body

	$('body').on('click', '#btn_delete_mahasiswa', function () {
		var tanya = confirm('Anda yakin ingin menghapus..?');
		if (tanya == true) {
			base_url.href = $(this).data('params');
		} else {
			return false;
		}
	}); // on click multiple with body

	$('body').on('click', '#btn_detail_foto_mahasiswa', function () {
		$.ajax({
			type: "get",
			url: $(this).data('params'),
			dataType: "json",
			encode: true,
			success: function (data) {
				if (data.record.photo == null) {
					$(".modal_detail_mahasiswa img").attr("src", "404 Not Found");
					$(".modal_detail_mahasiswa img").attr("alt", data.record.nama);
				} else {
					$(".modal_detail_mahasiswa img").attr("src", data.record.photo.name);
					$(".modal_detail_mahasiswa img").attr("alt", data.record.nama);
				}
			}
		}).fail(function (data) {
			console.log(data);
		});
	}); // on click multiple with body
});
