<?= $this->extend('home\tamplate\base') ?>

<?= $this->section('content') ?>

<!-- Main Content-->
<div class="container px-4 px-lg-5">
    <div class="row justify-content-center">
        <div class="col col-xl-7">
            <!-- Post Content-->
            <article class="mb-4">
                <div class="container">
                    <div class="row  justify-content-center">
                        <p class="post-meta">
                            Posted by
                            <span><strong><?= $post->username ?></strong> </span> pada
                            <?= $post->date ?>
                        </p>
                        <div class="col">
                            <p> <?= $post->teks ?></p>

                        </div>
                    </div>
                </div>
            </article>

        </div>
    </div>
</div>
<?= $this->endSection() ?>