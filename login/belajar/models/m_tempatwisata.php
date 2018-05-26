<?php
class TempatWisata {
	
	private $mysqli;
	
	function __construct($conn){
		$this->mysqli = $conn;
	}
	
	public function tampil($id = null){
		$db = $this->mysqli->conn;
		$sql = "SELECT * FROM tb_wisata";
		if($id != null) {
			$sql .= " WHERE id_tempat_wisata = $id";
		}
		$query = $db->query($sql) or die ($db->error);
		return $query;
	}
	
	public function tambah($judul, $harga_tiket, $jam_buka, $id_admin, $tanggal_upload){
		$db = $this->mysqli->conn;
		$db->query("INSERT INTO tb_wisata VALUES ('','$judul','$harga_tiket','$jam_buka','$id_admin','$tanggal_upload')") or die ($db->error);
	}
}
?>