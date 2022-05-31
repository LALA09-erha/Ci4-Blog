<?= $this->extend('login\tamplate\base') ?>

<?= $this->section('content') ?>

<div class="card-body">
    <h4 class="card-title"><?= $title ?></h4>
    <form method="POST" class="my-login-validation">
        <?= csrf_field() ?>
        <div class="form-group">
            <label for="email">Alamat Email</label>
            <input id="email" type="email" class="form-control" name="email" value="" required autofocus>
            <div class="invalid-feedback">
                Email is invalid
            </div>
        </div>

        <div class="form-group">
            <label for="password">Password

            </label>
            <input id="password" type="password" class="form-control" name="password" required data-eye>
            <div class="invalid-feedback">
                Password is required
            </div>
        </div>
        <?php
        if (session()->getFlashdata('pesan')) {
        ?>
        <div class="alert alert-info text-center" role="alert">
            <?= session()->getFlashdata('pesan') ?>
        </div>
        <?php
        }
        ?>
        <div class="form-group m-0">
            <button type="submit" class="btn btn-primary btn-block">
                Masuk
            </button>
        </div>
        <div class="mt-4 text-center">
            Belum Punya Akun? <a href="/regist">Buat</a>
        </div>
    </form>
</div>
<?= $this->endSection() ?>