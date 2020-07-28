<?= form_open('account/login_action'); ?>
<div class="input-group mb-3">
	<input type="text" class="form-control" placeholder="Username" name="username">
	<div class="input-group-append">
		<div class="input-group-text">
			<span class="fas fa-envelope"></span>
		</div>
	</div>
</div>
<div class="input-group mb-3">
	<input type="password" class="form-control" placeholder="Password" name="password">
	<div class="input-group-append">
		<div class="input-group-text">
			<span class="fas fa-lock"></span>
		</div>
	</div>
	<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
</div>
<div class="row">
	<!-- /.col -->
	<div class="col-12">
		<button type="submit" class="btn btn-primary btn-block">Sign In</button>
	</div>
	<!-- /.col -->
</div>
<?= form_close(); ?>
