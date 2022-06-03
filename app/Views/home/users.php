<?= $this->extend('home\tamplate\base') ?>

<?= $this->section('content') ?>
<!-- Main Content-->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    #jika $posts kosong maka tampilkan pesan
                    if (empty($users)) {
                        echo '<div class="alert alert-info text-center" role="alert">
                            Users Kosong
                            </div>';
                    }
                    foreach ($users as $user) :
                    ?>
                    <tr>

                        <th scope="row"><?php echo $user['username'] ?></th>
                        <td><?= $user['email']; ?></td>
                        <td><?= $user['role']; ?></td>
                        <td>
                            <a class="btn btn-info" href="/update/<?= $user['ID'] ?>">Edit</a>
                            <a class="btn btn-warning" onclick="return confirm('YAKIN?')"
                                href="/delete/<?= $user['ID'] ?>">Hapus</a>
                        </td>

                    </tr>
                    <?php endforeach;
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>