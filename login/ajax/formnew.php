<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Produk Baru</title>

    <link href="bootstrap.min.css" rel="stylesheet">
</head>

<body>
<h3>Form Produk</h3>
<hr>
<form action="simpan.php" method="POST">
    <div class="form-group">
        <label for="">Nama</label>
        <div><input type="text" class="form-control" id="name" name="name"></div>
    </div>

    <div class="form-group">
        <label for="">Merk</label>
        <div><input type="text" class="form-control" id="brand" name="brand"></div>
    </div>

    <div class="form-group">
        <label for="">Harga</label>
        <div><input type="text" class="form-control" id="price" name="price"></div>
    </div>

    <div class="form-group">
        <a class="btn btn-primary" id="simpanButton" href="#">Simpan</a>
    </div>
</form>
</body>
</html>