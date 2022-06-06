<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matakuliah</title>
    <script>
    function hapusMatakuliah(pesan) {
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
            Daftar Matakuliah
        </h3>
        <table border="2" class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>SKS</th>
                    <th>Kode</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $nomor = 1;
                foreach ($matakuliah as $mt) {
                ?>
                <tr>
                    <td><?= $nomor ?></td>
                    <td><?= $mt->nama ?></td>
                    <td><?= $mt->sks ?></td>
                    <td><?= $mt->kode ?></td>
                    <td>
                        <a href="<?php echo base_url("index.php/matakuliah/edit/$mt->id") ?>"
                            class="btn btn-success btn-large active">Edit</a>
                        &nbsp;
                        <a href="<?php echo base_url("index.php/matakuliah/delete/$mt->id") ?>"
                            class="btn btn-danger btn-large active"
                            onclick=" return hapusMatakuliah('Anda yakin menghapus Mata Kuliah bernama <?php echo $mt->nama ?> ?')">Delete</a>
                    </td>
                </tr>
                <?php
                    $nomor++;
                }
                ?>
            </tbody>
        </table>
        <a href="<?php echo base_url("index.php/matakuliah/form") ?>"
            class="btn btn-primary btn-large active">Tambah</a>
    </div>
</body>

</html>