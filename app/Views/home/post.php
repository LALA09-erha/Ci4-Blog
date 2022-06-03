<?= $this->extend('home\tamplate\base') ?>

<?= $this->section('content') ?>
<!-- Main Content-->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col">
            <a class="btn btn-primary" href="/tambahpost">Tulis Postingan</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Judul</th>
                        <th scope="col">Penulis</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    #jika $posts kosong maka tampilkan pesan
                    if (empty($posts)) {
                        echo '<div class="alert alert-info text-center" role="alert">
                            Post Kosong
                            </div>';
                    }
                    foreach ($posts as $post) :
                    ?>
                    <tr>

                        <th scope="row"><a href="/post/<?php echo $post->slug ?>"><?php echo $post->judul ?></a></th>
                        <td><?= $post->username; ?></td>
                        <?php
                            if ($post->post_status == 0) {
                                echo '<td>Pending</td>';
                            } else {
                                echo '<td>Posting</td>';
                            }
                            ?>

                        <td>
                            <a class="btn btn-info" href="/edit/<?= $post->slug ?>">Edit</a>
                            <a class="btn btn-warning" onclick="return confirm('YAKIN?')"
                                href="/hapus/<?= $post->IDPOST ?>">Hapus</a>
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