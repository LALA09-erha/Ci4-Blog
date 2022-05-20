<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> <?php echo $title ?> </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
    </nav>
    <div class="container">
        <button type="button" class="btn btn-primary mt-4">Tambah Data</button>
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-2">
                    <table class="table table-bordered border-primary">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Mahasiswa</th>
                                <th scope="col">Email Mahasiswa</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($mhs as $m) : ?>
                            <tr>
                                <td scope="col"><?= $no ?></td>
                                <td scope="col"><?= $m['nama_153'] ?></td>
                                <td scope="col"><?= $m['email_153'] ?></td>
                                <td>
                                    <a href="<?= base_url() ?>/mhs/edit/<?= $m['id_153'] ?>"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <a href="<?= base_url() ?>/mhs/hapus/<?= $m['id_153'] ?>"
                                        class="btn btn-danger btn-sm">Hapus</a>
                                </td>
                            </tr>
                            <?php
                                $no++;
                            endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>