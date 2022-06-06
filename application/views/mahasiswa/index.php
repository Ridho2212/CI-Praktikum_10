<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahasiswa</title>
    <script>
    function hapusMahasiswa(pesan) {
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
            Daftar Mahasiswa
        </h3>
        <table border="2" class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Gender</th>
                    <th>IPK</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $nomor = 1;
                foreach ($mahasiswa as $mhs) {
                ?>
                <tr>
                    <td><?= $nomor ?></td>
                    <td><?= $mhs->nim ?></td>
                    <td><?= $mhs->nama ?></td>
                    <td><?= $mhs->gender ?></td>
                    <td><?= $mhs->ipk ?></td>
                    <td>
                        <a href="<?php echo base_url("index.php/mahasiswa/detail/$mhs->id") ?>"
                            class="btn btn-info btn-large active"> Detail </a>
                        &nbsp;
                        <a href="<?php echo base_url("index.php/mahasiswa/edit/$mhs->id") ?>"
                            class="btn btn-success btn-large active">Edit</a>
                        &nbsp;
                        <a href="<?php echo base_url("index.php/mahasiswa/delete/$mhs->id") ?>"
                            class="btn btn-danger btn-large active"
                            onclick=" return hapusMahasiswa('Anda yakin menghapus Mahasiswa bernama <?php echo $mhs->nama ?> ?')">Delete</a>
                    </td>
                </tr>
                <?php
                    $nomor++;
                }
                ?>
            </tbody>
        </table>
        <a href="<?php echo base_url("index.php/mahasiswa/form") ?>" class="btn btn-primary btn-large active">Tambah</a>
    </div>
</body>

</html>