<?= $this->extend('home\tamplate\base') ?>

<?= $this->section('content') ?>

<!-- Main Content-->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <!-- Post preview-->
            <?php
            #jika $posts kosong maka tampilkan pesan
            if (empty($posts)) {
                echo '<div class="alert alert-info text-center" role="alert">
                Post Kosong
                </div>';
            }
            foreach ($posts as $post) :

            ?>
            <div class="post-preview">
                <a href="/post/<?= $post->slug ?>">
                    <h2 class="post-title"><?= $post->judul ?></h2>

                    <span class="post-subtitle"><?= substr(strval($post->teks), 0, 20) . "..." ?></span>
                </a>
                <p class="post-meta">
                    Posted by
                    <span><?= $post->username ?></span>
                    <?= $post->date ?>
                </p>
            </div>
            <!-- Divider-->
            <hr class="my-4" />
            <?php endforeach;
            ?>

        </div>
    </div>
</div>
<?= $this->endSection() ?>