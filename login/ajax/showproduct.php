<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Tampil Data</title>

    <link href="bootstrap.min.css" rel="stylesheet">
</head>

<body>
<?php
$con    = new mysqli("localhost","root", "", "ajax");
$result = $con->query("select * from product");
?>

<h3>Data Tempat Wisata</h3>
<hr>
<table class="table table-bordered table-stripped">
    <thead>

        <th>Nama Tempat</th>
        <th>Harga Tiket</th>
        <th>Admin</th>
        <th>Tanggal</th>
    </thead>
    <?php
    $i      = 1;
    while($record = $result->fetch_array()){
    ?>

    <tr>
        <td><?php echo "$i";?></td>
        <td><?=$record['nama']?></td>
        <td><?=$record['harga']?></td>
        <td><?=$record['admin']?></td>
		<td><?=$record['tanggal']?></td>
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