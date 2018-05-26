<?php
require_once('../config/+koneksi.php');
require_once('../models/database.php');
include "../models/m_tempatwisata.php";
$connection = new Database($host, $user, $pass, $database);
$wisata = new TempatWisata($connection);

$id_wisata= $_POST['id_wisata'];
$judul = $connection->conn->real_escape_string($_POST['judul']);
$harga_tiket = $connection->conn->real_escape_string($_POST['harga_tiket']);
$jam_buka = $connection->conn->real_escape_string($_POST['jam_buka']);
$id_admin = $connection->conn->real_escape_string($_POST['id_admin']);
$tanggal_upload = $connection->conn->real_escape_string($_POST['tanggal_upload']);	
							
$wisata->edit("UPDATE tb_wisata SET judul ='$judul'
									harga_tiket='$harga_tiket'
									jam_buka='$jam_buka'
									id_admin='$id_admin'
									tanggal_upload='$tanggal_upload'
									WHERE id_wisata = '$id_wisata'
									");
echo "<script>window.location'?page=tempatwisata';</script>"					
?>