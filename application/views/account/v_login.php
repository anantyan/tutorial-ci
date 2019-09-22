  <div class="login-logo">
    <a href="<?php echo base_url(); ?>"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form id="v-login-account">
      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="Masukan Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <div id="error-login-username" class="text-danger"></div>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Masukan Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <div id="error-login-password" class="text-danger"></div>
      </div>
      <div class="row">
        <div class="col-xs-6">
          <button type="button" onclick="window.location.href='<?php echo base_url(); ?>account/register'" class="btn btn-default btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <button type="submit" id="btn-login-account" class="btn btn-primary btn-block btn-flat">Login</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->