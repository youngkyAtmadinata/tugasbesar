<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Tampil Produk</title>

    <link href="bootstrap.min.css" rel="stylesheet">
</head>

<body>
<?php
$con    = new mysqli("localhost","root", "", "ajax");
$result = $con->query("select * from product");
?>

<h3>Data Produk</h3>
<hr>
<table class="table table-bordered table-stripped">
    <thead>
        <th>#</th>
        <th>Nama</th>
        <th>Merk</th>
        <th>Harga</th>
        <th>Option</th>
    </thead>
    <?php
    $i      = 1;
    while($record = $result->fetch_array()){
    ?>

    <tr>
        <td><?php echo "$i";?></td>
        <td><?=$record['name']?></td>
        <td><?=$record['price']?></td>
        <td><?=$record['brand']?></td>
        <td>
            <button id="editButton" value="<?=$record['id']?>" class="btn btn-warning">Edit</button>
            <button id="deleteButton" value="<?=$record['id']?>" class="btn btn-danger">Hapus</button>
        </td>
    </tr>
    <?php
        $i++;
    }
    ?>   
</table>
</body>
</html>