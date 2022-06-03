<?= $this->extend('home\tamplate\base') ?>

<?= $this->section('content') ?>
<!-- Main Content-->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col">
            <form action="/editpost" method="POST">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Judul</label>
                    <input type="text" class="form-control" name="judul" placeholder="Judul"
                        value="<?= $post['judul'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Isi</label>
                    <textarea class="form-control" name="teks" rows="3" required><?= $post['teks'] ?></textarea>
                    <input type="hidden" value="<?= $post['ID'] ?>" name="id">
                    <input type="hidden" value="<?= $post['IDPOST'] ?>" name="idpost">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Status : </label>
                    <input type="radio" name="status" id="status1" value=0
                        <?php if ($post['post_status'] == 0) echo 'checked' ?> required>
                    <label for="status1">Pending</label>
                    <input type="radio" name="status" id="status2" value=1
                        <?php if ($post['post_status'] == 1) echo 'checked' ?> required>
                    <label for="status2">Posting</label>
                </div>
                <button type="submit" class="btn btn-primary mt-1">Submit</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>