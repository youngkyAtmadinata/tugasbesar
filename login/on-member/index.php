<?php
session_start();

if ( !isset($_SESSION['user_login']) || 
    ( isset($_SESSION['user_login']) && $_SESSION['user_login'] != 'member' ) ) {

	header('location:./../login.php');
	exit();
}
?>
<center>
<h2>Hallo Member <?=$_SESSION['nama'];?> Apakabar ?</h2>

<a href="./../logout.php">Keluar</a>
</center>