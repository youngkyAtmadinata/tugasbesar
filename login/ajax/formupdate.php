<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Ubah Data</title>

    <link href="bootstrap.min.css" rel="stylesheet">
</head>

<body>
<?php

$id     = $_GET['id'];
$con    = new mysqli("localhost", "root", "", "ajax");
$result = $con->query("SELECT * FROM product WHERE id=".$id);
extract($result->fetch_assoc());
?>

<h3>Form Update Produk</h3>
<hr>
<form action="update.php?id=<?=$id?>" method="POST">
	<div class="form-group">
        <label for="">Nama Tempat</label>
        <div><input type="text" class="form-control" id="nama" name="nama" value="<?=$nama?>"></div>
    </div>

    <div class="form-group">
        <label for="">Harga Tiket</label>
        <div><input type="text" class="form-control" id="harga" name="harga" value="<?=$harga?>"></div>
    </div>

    <div class="form-group">
        <label for="">Admin</label>
        <div><input type="text" class="form-control" id="admin" name="admin" value="<?=$admin?>"></div>
    </div>
	
	<div class="form-group">
        <label for="">Tanggal</label>
        <div><input type="text" class="form-control" id="tanggal" name="tanggal" value="<?=$tanggal?>"></div>
    </div>

    <div class="form-group">
        <a class="btn btn-primary" id="simpanUpdate" href="#">Simpan</a>
    </div>
</form>
</body>
</html>