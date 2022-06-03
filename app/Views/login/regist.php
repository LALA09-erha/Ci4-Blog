<?= $this->extend('login\tamplate\base') ?>

<?= $this->section('content') ?>

<div class="card-body">
    <h4 class="card-title"><?= $title ?></h4>
    <form method="POST" class="my-login-validation" action="/daftaruser">
        <?= csrf_field() ?>
        <div class="form-group">
            <label for="email">Alamat Email</label>
            <input id="email" type="email" class="form-control" name="email" required autofocus>
            <div class="invalid-feedback">
                Email is invalid
            </div>

        </div>
        <div class="form-group">
            <label for="nama">Username</label>
            <input id="nama" type="text" class="form-control" name="nama" required>
            <div class="invalid-feedback">
                Username is invalid
            </div>
        </div>
        <div>
            <label for="nama">Daftar Sebagai : </label>
            <input type="radio" id="role1" name="role" value="Pembaca" required>
            <label for="role1">Pembaca</label>

            <input type="radio" id="role2" name="role" value="Penulis">
            <label for="role2">Penulis</label>

        </div>

        <div class="form-group">
            <label for="password">Password
            </label>
            <input id="password" type="password" class="form-control" name="password" required data-eye required>
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
                Daftar
            </button>
        </div>
        <div class="mt-4 text-center">
            Sudah Punya Akun? <a href="/login">Masuk</a>
        </div>
    </form>
</div>
<?= $this->endSection() ?>