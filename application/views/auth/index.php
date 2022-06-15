<body class="" style="background-color:#1a237e;">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block">
                                <img src="<?= base_url(); ?>assets/login/bg_pppomn.jpg" width="100%" alt="">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Silahkan Login</h1>
                                    </div>

                                    <?php if(!empty($this->session->flashdata('login') )) : ?>
        
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <?=  $this->session->flashdata('login'); ?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        
                                    <?php endif ; ?>

                                    <form class="user" method='post'>
                                        <div class="form-group">
                                            <input name='nip' autocomplete="off" autofocus  type="text" class="form-control form-control-user" placeholder="NIP / NIK">
                                            <small id="usernameHelp" class="form-text text-danger"><?= form_error('nip'); ?></small>
                                        </div>
                                        <div class="form-group">
                                            <input name='password' type="password" class="form-control form-control-user" placeholder="Kata Sandi">
                                            <small id="usernameHelp" class="form-text text-danger"><?= form_error('password'); ?></small>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block"  style="background-color:#1a237e;">
                                            Login
                                        </button>
                                    </form>
                                    <br>
                                    <!-- <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div> -->
                                    <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>