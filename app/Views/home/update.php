<?= $this->extend('home\tamplate\base') ?>

<?= $this->section('content') ?>
<!-- Main Content-->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col">
            <form action="/updateuser" method="POST">
                <div class="form-group">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Username</label>
                        <input type="hidden" value="<?= $user['ID'] ?>" name="id">
                        <input type="text" class="form-control" value="<?= $user['username'] ?>" name="nama" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email</label>
                        <input type="text" class="form-control" value="<?= $user['email'] ?>" name="email" readonly>

                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Role</label>
                        <input type="text" class="form-control" value="<?= $user['role'] ?>" name="role">
                    </div>
                    <span>Role : Admin | Pembaca | Penulis</span><br>
                    <button type="submit" class="btn btn-primary mt-1">Submit</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>