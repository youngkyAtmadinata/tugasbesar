<?php
$id     = $_GET['id'];
$con    = new mysqli("localhost","root", "", "ajax");
$sql    = "DELETE FROM product WHERE id=$id";
$result = $con->query($sql);
echo "Data berhasil dihapus";
?>