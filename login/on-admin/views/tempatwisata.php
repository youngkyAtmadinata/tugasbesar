<?php
include "models/m_tempatwisata.php";
$wisata = new TempatWisata($connection);

if(@$_GET['act'] == '') {
?>

<div class="row">
          <div class="col-lg-12">
            <h1>Daftar Tempat Wisata</h1>
            <ol class="breadcrumb">
              <li><a href="index.html"><i class="icon-dashboard"></i> Dashboard</a></li>
            </ol>
          </div>
        </div>
		
		<div class="row">
			<div class="col-lg-12">
				
				<div class="table-responsive">
					
					<table class="table table-bordered table-hover table-striped">
					<tr>
						<th>No.</th>
						<th>Judul</th>
						<th>Harga Tiket</th>
						<th>Jam Buka</th>
						<th>Id Admin</th>
						<th>Tanggal Upload</th>
						<th>Opsi</th>
					</tr>
					<?php
					$no = 1;
					$tampil = $wisata->tampil();
					while($data = $tampil->fetch_object()) {
					?>
					<tr>
						<td align="center"><?php echo $no++."."; ?></td>
						<td><?php echo $data->judul; ?></td>
						<td><?php echo $data->harga_tiket; ?></td>
						<td><?php echo $data->jam_buka; ?></td>
						<td><?php echo $data->id_admin; ?></td>
						<td><?php echo $data->tanggal_upload; ?></td>
						<td align="center">
							<a id="edit_wisata" data-toggle="modal" data-target="#edit" 
							data-id="<?php echo $data->id_wisata; ?>"
							data-judul="<?php echo $data->judul; ?>"
							data-harga="<?php echo $data->harga_tiket; ?>"
							data-jam="<?php echo $data->jam_buka; ?>"
							data-admin="<?php echo $data->id_admin; ?>"
							data-tanggal="<?php echo $data->tanggal_upload; ?>
							">
							<button class="btn btn-info btn-xs"><i class="fa fa-edit"></i>Ubah</button>
							<a href="?page=tempatwisata&act=del&id=<?php echo $data->id_wisata ?>" onclick="return confirm('Yakin Akan Menghapus Data ini ?')">
							<button class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>Hapus</button>
						</a>
						</td>
						</tr>
					<?php 
					} ?>
					</table>
					
				</div>
					
					<button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambah">Tambah Data</button>
					
					<div id="tambah" class="modal fade" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Tambah Data</h4>
					</div>
					<form action="" method="post" >
						<div class="modal-body" enctype="multipart/form-data">
							
							<div class="form-group">
								<label class="control-label" for="judul">Judul</label>
								<input type="text" name="judul" class="form-control" id="judul" required>
							</div>
							
							<div class="form-group">
								<label class="control-label" for="harga_tiket">Harga Tiket</label>
								<input type="number" name="harga_tiket" class="form-control" id="harga_tiket" required>
							</div>
							
							<div class="form-group">
								<label class="control-label" for="jam_buka">Jam Buka</label>
								<input type="text" name="jam_buka" class="form-control" id="jam_buka" required>
							</div>
							
							<div class="form-group">
								<label class="control-label" for="id_admin">Id Admin</label>
								<input type="text" name="id_admin" class="form-control" id="id_admin" required>
							</div>
							
							<div class="form-group">
								<label class="control-label" for="tanggal_upload">Tanggal Upload</label>
								<input type="text" name="tanggal_upload" class="form-control" id="tanggal_upload" required>
							</div>
							
						</div>
							<div class="modal-footer">
								<button type="reset" class="btn btn-danger">Reset</button>
								<input type="submit" class="btn btn-success" name="tambah" value="Simpan">
							</div>
					</form>
					
					<?php
						if(@$_POST['tambah']){
							$judul = $connection->conn->real_escape_string($_POST['judul']);
							$harga_tiket = $connection->conn->real_escape_string($_POST['harga_tiket']);
							$jam_buka = $connection->conn->real_escape_string($_POST['jam_buka']);
							$id_admin = $connection->conn->real_escape_string($_POST['id_admin']);
							$tanggal_upload = $connection->conn->real_escape_string($_POST['tanggal_upload']);		
							
							$wisata->tambah($judul, $harga_tiket, $jam_buka, $id_admin, $tanggal_upload);
							header("location: ?page=tempatwisata");
						}
						
					?>
					
				</div>
			</div>
		</div>
		
		<div id="edit" class="modal fade" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Edit Data</h4>
					</div>
					<form id="form" enctype="multipart/form-data">
						<div class="modal-body" id="modal-edit">
							
							<div class="form-group">
								<label class="control-label" for="judul">Judul</label>
								<input type="hidden" name="id_wisata" id="id_wisata">
								<input type="text" name="judul" class="form-control" id="judul" required>
							</div>
							
							<div class="form-group">
								<label class="control-label" for="harga_tiket">Harga Tiket</label>
								<input type="number" name="harga_tiket" class="form-control" id="harga_tiket" required>
							</div>
							
							<div class="form-group">
								<label class="control-label" for="jam_buka">Jam Buka</label>
								<input type="text" name="jam_buka" class="form-control" id="jam_buka">
							</div>
							
							<div class="form-group">
								<label class="control-label" for="id_admin">Id Admin</label>
								<input type="text" name="id_admin" class="form-control" id="id_admin">
							</div>
							
							<div class="form-group">
								<label class="control-label" for="tanggal_upload">Tanggal Upload</label>
								<input type="text" name="tanggal_upload" class="form-control" id="tanggal_upload" required>
							</div>
							
						</div>
							<div class="modal-footer">
								<input type="submit" class="btn btn-success" name="edit" value="Simpan">
							</div>
					</form>
					
				</div>
			</div>
		</div>
		<script src="assets/js/jquery-1.10.2.js"></script>
		<script type="text/javascript">
		$(document).on("click", "#edit_wisata", function(){
			var idwisata = $(this).data('id_wisata'); 
			var jdl = $(this).data('judul');
			var hrg = $(this).data('harga');
			var jm = $(this).data('jam');
			var adm = $(this).data('admin');
			var tgl = $(this).data('tanggal');
			$("#modal-edit #id_wisata").val(idwisata);
			$("#modal-edit #judul").val(jdl);
			$("#modal-edit #harga_tiket").val(hrg);
			$("#modal-edit #jam_buka").val(jm);
			$("#modal-edit #adm").val(id_admin);
			$("#modal-edit #tanggal_upload").val(tgl);
		})
		$(document).ready(function(e){
			$("#form").on("submit", (function(e){
				e.preventDefault();
				$.ajax({
					url : 'models/proses_edit_wisata.php',
					type : 'POST',
					data : new FormData(this),
					contentType : false,
					cache : false,
					processData : false,
					success : function(msg){
						$('.table').html(msg);
					}
				})
			}))
		})
		</script>
	</div>
</div>
<?php
}else if(@$_GET['act'] == 'del'){
	echo "proses menghapus untuk id : " .$_GET['id'];
	
	$wisata->hapus($_GET['id']);
	header("location: ?page=tempatwisata");
}
?>