<?php
include "models/m_tempatwisata.php";

$wisata = new TempatWisata($connection);
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
							<button class="btn btn-info btn-xs"><i class="fa fa-edit"></i>Ubah</button>
							<button class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>Hapus</button>
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
							$judul = $_POST['judul'];
							$harga_tiket = $_POST['harga_tiket'];
							$jam_buka = $_POST['jam_buka'];
							$id_admin = $_POST['id_admin'];
							$tanggal_upload = $_POST['tanggal_upload'];	
							
							$wisata->tambah($judul, $harga_tiket, $jam_buka, $id_admin, $tanggal_upload);
						}
						
					?>
					
				</div>
			</div>
		</div>
	</div>
</div>
