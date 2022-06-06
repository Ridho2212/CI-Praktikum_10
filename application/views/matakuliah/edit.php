<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Matakuliah</title>
</head>

<body>
    <div class="container">
        <h2 class="text-center"> Form Input Matakuliah</h2>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <?php echo form_open("matakuliah/save") ?>
        <div class="form-group row">
            <label for="nama" class="col-4 col-form-label">Nama</label>
            <div class="col-8">
                <input id="nama" name="nama" placeholder="Masukkan Nama Matakuliah" type="text"
                    value="<?php echo $obj_matakuliah->nama ?>" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label for="sks" class="col-4 col-form-label">SKS</label>
            <div class="col-8">
                <input id="sks" name="sks" placeholder="Masukkan SKS" type="text"
                    value="<?php echo $obj_matakuliah->sks ?>" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label for="kode" class="col-4 col-form-label">Kode</label>
            <div class="col-8">
                <input id="kode" name="kode" placeholder="Masukkan Kode Matakuliah" type="text"
                    value="<?php echo $obj_matakuliah->sks ?>" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-4 col-8">
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        <?php echo form_close() ?>
    </div>
</body>

</html>