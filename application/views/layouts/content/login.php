<?php $this->load->view('layouts/header/login'); ?>
<div class="login-box">
    <div class="login-logo">
        <a href="<?= base_url(); ?>"><b>Tutorial CI</b> Apps</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg"><?= $title; ?></p>
            <?php $this->load->view('account/login'); ?>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<?php $this->load->view('layouts/footer/login'); ?>