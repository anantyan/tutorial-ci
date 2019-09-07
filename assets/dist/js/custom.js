$(()=>{
  $('#v-insert-mahasiswa').submit(function(event){
    event.preventDefault();
    var formData = $(this).serialize();
    var uri = window.location;
    $.ajax({
      type: "post",
      url: uri.protocol+"//"+uri.host+"/tutorial-ci/mahasiswa/insert_action",
      data: formData,
      dataType: "json",
      encode: true,
      beforeSend: function(){
        $('#btn-insert-mahasiswa').attr("disabled","");
        $('#btn-insert-mahasiswa').html("Loading...");
      },
      success: function(data){
        if(data.error == 1){
          $('#error-insert-nim').html(data.nim);
          $('#error-insert-nama').html(data.nama);
          $('#error-insert-jurusan').html(data.jurusan);
          $('#error-insert-alamat').html(data.alamat);
          $('#btn-insert-mahasiswa').removeAttr("disabled");
          $('#btn-insert-mahasiswa').html("Simpan");
        }else{
          if(data.error == 0){
            alert(data.status);
            $('#error-insert-nim').html('');
            $('#error-insert-nama').html('');
            $('#error-insert-jurusan').html('');
            $('#error-insert-alamat').html('');
            $('#btn-insert-mahasiswa').removeAttr("disabled");
            $('#btn-insert-mahasiswa').html("Simpan");
          }
        }
      }
    }).fail(function(data){
      console.log(data);
    });
  });

  $('body').on('click', '#btn-delete-mahasiswa', function(event){
    event.preventDefault();
    if(confirm('Apakah anda ingin hapus data!')){
      var uri = window.location;
      //console.log(uri.protocol+"//"+uri.host+"/mahasiswa/delete/"+$(this).attr('delete-mahasiswa'));
      $.ajax({
        type: "post",
        url: uri.protocol+"//"+uri.host+"/tutorial-ci/mahasiswa/delete/"+$(this).attr('delete-mahasiswa'),
        dataType: "json",
        encode: true,
        beforeSend: function(){
          $('#btn-delete-mahasiswa').attr('disabled', '');
          $('#btn-delete-mahasiswa').attr('Loading...');
        },
        success: function(data){
          if(data.error == 1){
            alert(data.id);
            $('#btn-delete-mahasiswa').removeAttr("disabled");
            $('#btn-delete-mahasiswa').html("Hapus");
          }else{
            if(data.error == 0){
              alert(data.status);
              $('#btn-delete-mahasiswa').removeAttr("disabled");
              $('#btn-delete-mahasiswa').html("Hapus");
              uri.reload();
            }
          }
        }
      }).fail(function(data){
        console.log(data);
      });
    }
  });

  $('#v-update-mahasiswa').submit(function(event){
    event.preventDefault();
    var formData = $(this).serialize();
    var uri = window.location;
    $.ajax({
      type: "post",
      url: uri.protocol+"//"+uri.host+"/tutorial-ci/mahasiswa/update_action/",
      data: formData,
      dataType: "json",
      encode: true,
      beforeSend: function(){
        $('#btn-update-mahasiswa').attr("disabled","");
        $('#btn-update-mahasiswa').html("Loading...");
      },
      success: function(data){
        if(data.error == 1){
          $('#error-update-nim').html(data.nim);
          $('#error-update-nama').html(data.nama);
          $('#error-update-jurusan').html(data.jurusan);
          $('#error-update-alamat').html(data.alamat);
          $('#error-update-email').html(data.email);
          $('#error-update-no_telp').html(data.no_telp);
          $('#btn-update-mahasiswa').removeAttr("disabled");
          $('#btn-update-mahasiswa').html("Simpan");
        }else{
          if(data.error == 2){
            alert(data.status);
            $('#btn-update-mahasiswa').removeAttr("disabled");
            $('#btn-update-mahasiswa').html("Simpan");
          }else{
            if(data.error == 0){
              alert(data.status);
              $('#error-update-nim').html('');
              $('#error-update-nama').html('');
              $('#error-update-jurusan').html('');
              $('#error-update-alamat').html('');
              $('#error-update-email').html('');
              $('#error-update-no_telp').html('');
              $('#btn-update-mahasiswa').removeAttr("disabled");
              $('#btn-update-mahasiswa').html("Simpan");
            }
          }
        }
      }
    }).fail(function(data){
      console.log(data);
    });
  });

  // $('#v-photo-mahasiswa').submit(function(event){
  //   event.preventDefault();
  //   var uri = window.location;
  //   var dataForm  = new FormData(),
  //   dataPhoto = $('#photo').prop('files')[0],
  //   dataId = $('input[name=id]').val();

  //   dataForm.append('photo', dataPhoto);
  //   dataForm.aapend('id', dataId);

  //   var formData = {
  //     dataPhoto,
  //     'id'    : $('input[name=id]').val()
  //   };

  //   console.log(formData);
    
  //   $.ajax({
  //     type: "post",
  //     url: uri.protocol+"//"+uri.host+"/tutorial-ci/mahasiswa/upload_photo/",
  //     data: dataForm,
  //     contentType: false,
  //     processData: false,
  //     dataType: "json",
  //     encode: true,
  //     beforeSend: function(){
  //       $("#btn-photo-mahasiswa").attr("disabled","");
  //       $("#btn-photo-mahasiswa").html("Loading...");
  //     },
  //     success: function(data){
  //       if(data.error == 2){
  //         $('#error-update-photo').html(data.status);
  //         $("#btn-photo-mahasiswa").removeAttr("disabled");
  //         $("#btn-photo-mahasiswa").html("Simpan data");
  //       }else{
  //         if(data.error == 1){
  //           alert(data.status);
  //           $("#btn-photo-mahasiswa").removeAttr("disabled");
  //           $("#btn-photo-mahasiswa").html("Simpan data");
  //         }else{
  //           alert(data.status);
  //           $('#error-update-photo').html('');
  //           $("#btn-photo-mahasiswa").removeAttr("disabled");
  //           $("#btn-photo-mahasiswa").html("Simpan data");
  //           uri.reload();
  //         }
  //       }
  //     }
  //   }).fail(function(data){
  //     console.log(data);
  //   });
  // });
});