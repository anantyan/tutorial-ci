$(()=>{
  $('#v-login-account').submit(function(event){
    event.preventDefault();
    var uri = window.location;
    var formData = $(this).serialize();
    $.ajax({
      type: "post",
      url: uri.protocol+"//"+uri.host+"/tutorial-ci/account/login_action",
      data: formData,
      dataType: "json",
      encode: true,
      beforeSend: function(){
        $('#btn-login-account').attr("disabled","");
        $('#btn-login-account').html("Loading...");
      },
      success: function(data){
        if(data.error == 1){
          $('#error-login-username').html(data.username);
          $('#error-login-password').html(data.password);
          $('#btn-login-account').removeAttr("disabled");
          $('#btn-login-account').html("Login");
        }else{
          if(data.error == 2){
            alert(data.status);
            $('#error-login-username').html('');
            $('#error-login-password').html('');
            $('#btn-login-account').removeAttr("disabled");
            $('#btn-login-account').html("Login");
          }else{
            if(data.error == 0){
              $('#error-login-username').html('');
              $('#error-login-password').html('');
              $('#btn-login-account').removeAttr("disabled");
              $('#btn-login-account').html("Login");
              uri.href = uri.href;
            }
          }
        }
      }
    }).fail(function(data){
      console.log(data);
    });
  });
});