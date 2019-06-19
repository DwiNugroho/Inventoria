<div class="wrapper-login">
    <div class="wrapper-login2">
        <div class="kiri">
            <center>
                <h1 class="animated fadeInDown">Hello!</h1>
                <p class="animated fadeInUp">Selamat Datang di Website Inventoria, pastikan anda tetap terhubung dengan kami! Karena yang anda butuhkan ada disini.</p>
            </center>
        </div>
        <div class="kanan">
            <div class="logo ml-3 mt-2">
                <h4> <i class="fa fa-tasks mr-2"></i> INVENTORIA</h4>
            </div>
            <div class="login">
                <center>
                    <h1>Sign In to Inventoria</h1>
                    <div class="line"></div>
                    <form class="mt-4 mb-2" action="" method="post">
                        <div class="form-group">
                            <input name="username" type="text" placeHolder="Enter Username" autocomplete="off" required>
                        </div>
                        <div class="form-group mb-4">
                            <input name="password" type="password" placeHolder="Password" required>
                        </div>
                        <button name="submit" type="submit" class="btn mt-2">Masuk</button>
                    </form>
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-primary alert-dismissible fade show col-lg-6" role="alert">
                            <?= validation_errors(); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif ?>
                    <?php if ($this->session->flashdata('gagalLogin')) : ?>
                        <div class="alert alert-warning alert-dismissible fade show col-lg-6" role="alert">
                            <?= $this->session->flashdata('gagalLogin') ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif ?>

                </center>
            </div>


        </div>
    </div>
</div>