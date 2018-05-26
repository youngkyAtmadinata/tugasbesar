<?php
$name  = $_POST['name'];
$brand = $_POST['brand'];
$price = $_POST['price'];

$con = new mysqli("localhost","root", "", "ajax");
$sql = "INSERT INTO product(name, brand, price) values('$name','$brand','$price')";
$result = $con->query($sql);

if(!$result)
    echo "Error $sql";
else
    echo "Produk Berhasil disimpan";
?>