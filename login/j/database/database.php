<?php
	$s = $_GET["q"];
	
	$conn = new mysqli("localhost","root","","1641180000");
	$query = "SELECT * FROM 1641180000_pengguna WHERE username = '".$s."'";
	$res = $conn->query($query);
	
	if ($res->num_rows > 0) {
		while($row = $res->fetch_assoc()) {
			echo "Username: " . $row["username"]. " <br/>
			Nama: " . $row["nama"]. "<br/> Privilege: ". $row["privilege"]. "<br/>";
		}
	} else {
		echo "Data tidak ditemukan.";
	}
	$conn->close();
?>