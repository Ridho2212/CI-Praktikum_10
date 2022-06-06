<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dosen</title>
    <script>
    function hapusDosen(pesan) {
        if (confirm(pesan)) {
            return true;
        } else {
            return false;
        }
    }
    </script>
</head>
<?php
$username = $this->session->userdata('username');
if ($username) {
    echo "<h2 class='text-center'> Selamat datang $username  </h2> ";
}

?>

<body>
    <div class="col-md-12">
        <h3>
            Daftar Dosen
        </h3>
        <table border="2" class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIDN</th>
                    <th>Nama</th>
                    <th>Gender</th>
                    <th>Pendidikan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $nomor = 1;
                foreach ($dosen as $ds) {
                ?>
                <tr>
                    <td><?= $nomor ?></td>
                    <td><?= $ds->nidn ?></td>
                    <td><?= $ds->nama ?></td>
                    <td><?= $ds->gender ?></td>
                    <td><?= $ds->pendidikan ?></td>
                    <td>
                        <a href="<?php echo base_url("index.php/dosen/detail/$ds->id") ?>"
                            class="btn btn-info btn-large active"> Detail </a>
                        &nbsp;
                        <a href="<?php echo base_url("index.php/dosen/edit/$ds->id") ?>"
                            class="btn btn-success btn-large active">Edit</a>
                        &nbsp;
                        <a href="<?php echo base_url("index.php/dosen/delete/$ds->id") ?>"
                            class="btn btn-danger btn-large active"
                            onclick=" return hapusDosen('Anda yakin menghapus Dosen bernama <?php echo $ds->nama ?> ?')">Delete</a>
                    </td>
                </tr>
                <?php
                    $nomor++;
                }
                ?>
            </tbody>
        </table>
        <a href="<?php echo base_url("index.php/dosen/form") ?>" class="btn btn-primary btn-large active">Tambah</a>
    </div>
</body>

</html>