<?php
$host="localhost";
$user="root";
$password="";
$database="pelatihankominfo";

$koneksi=mysqli_connect($host,$user,$password,$database);
?>
<div id="layoutSidenav">
	<div id="layoutSidenav_content">
		<main>
			<div class="container-fluid px-4">
				<h1 class="mt-4">Daftar Pelatihan</h1>
				<ol class="breadcrumb mb-4">
					<li class="breadcrumb-item"></li>
					<li class="breadcrumb-item active">Tabel Pelatihan</li> 
				</ol>


				<!-- <button type="button" class="btn btn-success" onclick="window.location.href='?page=form';">Tambah Pelatihan</button> -->
				

					<button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#tambah">Tambah Pelatihan</button>

					<div id="tambah" class="modal fade" role="dialog">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title">Tambah Pelatihan Baru</h4>
									<button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">&times;</button>
								</div>
								<form action="views/data.php?aksi=tambah" method="post" enctype="multipart/form-data">
									<div class="modal-body">
										<div class="form-group">
											<label class="control-label" for="judul">Nama Pelatihan</label>
											<input type="text" name="judul" class="form-control" id="judul" required>
										</div>
										<div class="form-group">
											<label class="control-label" for="deskripsi">Deskripsi</label>
											<input type="text" name="deskripsi" class="form-control" id="deskripsi" required>
										</div>
										<div class="form-group">
											<label class="control-label" for="tglpel">Tanggal</label>
											<input type="date" name="tglpel" class="form-control" id="tglpel" required>
										</div>
										<div class="form-group">
											<label class="control-label" for="banner">Banner</label>
											<input type="file" name="banner" class="form-control" id="banner" required>
										</div>
										<div class="form-group">
											<label class="control-label" for="poster">Poster</label>
											<input type="file" name="poster" class="form-control" id="poster" required>
										</div>
									</div>
									<div class="modal-footer">
										<button type="reset" class="btn btn-danger">Reset</button>
										<button type="submit" name="submit" class="btn btn-success" value="Send">Send</button>
									</div>
								</form>
								
							</div>
						
					</div>

				</div>
			</div>
			<div class="card-body">
				<table id="datatablesSimple" class="table">
					<thead class="table-dark">
						<tr>
							<th>No.</th>
							<th>Judul</th>
							<th>Deskripsi</th>
							<th>Tanggal</th>
							<th>Banner</th>
							<th>Poster</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
	<?php
      require_once 'models/m_pelatihan.php';
      $object=new modelpelatihan();
      //$object->inputdata();
      $no = 1;
      $object->setdata();
      $datapelatihan=$object->getdata();
      foreach ($datapelatihan as $key) 
    {

    ?>
							<tr>
								<td><?php echo $no++ . "."; ?></td>
                 				<td><?php echo $key['judul'];?></td>
                 				<td><?php echo $key['deskripsi']; ?></td>
                 				<td><?php echo $key['tglpel']; ?></td>
                 				<td><img src="assetss/img/<?php echo $key['banner'];?>" alt="gambar" width="100px" hight="100px"></td>
                 				<td><img src="assetss/img/<?php echo $key['poster'];?>" alt="gambar" width="100px" hight="100px"></td>
								<td>
									<center>
									<button class="btn btn-success btn-xs" type="button" data-bs-toggle="modal" data-bs-target="#mymodal3<?php echo $key['id_pelatihan'] ?>"><i class="fa fa-clipboard-list" style="width: 20px"></i></button>
									<button class="btn btn-warning btn-xs" type="button" data-bs-toggle="modal" data-bs-target="#mymodal<?php echo $key['id_pelatihan'] ?>"><i class="fa fa-edit" style="width: 20px"></i></button>
									<button class="btn btn-danger btn-xs" type="button" data-bs-toggle="modal" data-bs-target="#mymodal2<?php echo $key['id_pelatihan'] ?>"><i class="fa fa-trash" style="width: 20px"></i></button>
									</center>
								</td>
								
							</tr>
					<?php
					}
					?>	
					</tbody>
				</table>

	<?php
      require_once 'models/m_pelatihan.php';
      $object=new modelpelatihan();
      //$object->inputdata();
      $no = 1;
      $object->setdata();
      $datapelatihan=$object->getdata();
      foreach ($datapelatihan as $key) 
    {

    ?>
				<div id="mymodal<?php echo $key['id_pelatihan'] ?>" class="modal fade" role="dialog">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title">Edit Pelatihan</h4>
									<button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">&times;</button>
								</div>
								<form action="views/data.php?aksi=ubah&id=<?php echo $key['id_pelatihan']; ?>" method="post" enctype="multipart/form-data">
									<div class="modal-body">
										<div class="form-group">
											<label class="control-label" for="judul">Nama Pelatihan</label>
											<input type="text" name="judul" class="form-control" id="judul" value="<?php echo $key['judul']; ?>" required>
										</div>
										<div class="form-group">
											<label class="control-label" for="deskripsi">Deskripsi</label>
											<input type="text" name="deskripsi" class="form-control" id="deskripsi" value="<?php echo $key['deskripsi']; ?>" required>
										</div>
										<div class="form-group">
											<label class="control-label" for="tglpel">Tanggal</label>
											<input type="date" name="tglpel" class="form-control" id="tglpel" value="<?php echo $key['tglpel']; ?>" required>
										</div>
										<div class="form-group">
											<label class="control-label" for="banner">Banner</label>
											<input type="file" name="banner" class="form-control" id="banner" required>
										</div>
										<div class="form-group">
											<label class="control-label" for="poster">Poster</label>
											<input type="file" name="poster" class="form-control" id="poster" required>
										</div>
									</div>
									<div class="modal-footer">
										<button type="reset" class="btn btn-danger">Reset</button>
										<button type="submit" name="submit" class="btn btn-success" value="Send">Send</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					<?php 
					}
					?>

			<?php
      require_once 'models/m_pelatihan.php';
      $object=new modelpelatihan();
      //$object->inputdata();
      $no = 1;
      $object->setdata();
      $datapelatihan=$object->getdata();
      foreach ($datapelatihan as $key) 
    {

    ?>
				<div id="mymodal2<?php echo $key['id_pelatihan'] ?>" class="modal fade" role="dialog">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title">Peringatan!!!</h4>
									<button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">&times;</button>
								</div>
								<form action="views/data.php?aksi=hapus&id=<?php echo $key['id_pelatihan']; ?>" method="post" enctype="multipart/form-data">
									<div class="modal-body">
										<div class="form-group">
											<label class="control-label" for="judul">Apakah anda yakin ingin menghapus data?</label>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-danger" data-bs-dismiss="modal">cancel</button>
										<button type="submit" name="submit" class="btn btn-success" value="Send">Ya</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					<?php 
					}
					?>

		<?php
      require_once 'models/m_pelatihan.php';
      $object=new modelpelatihan();
      //$object->inputdata();
      $no = 1;
      $object->setdata2();
      $datapelatihan=$object->getdata2();

      foreach ($datapelatihan as $key) 
    {

    ?>
				<div id="mymodal3<?php echo $key['id_pelatihan'] ?>" class="modal fade" role="dialog">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title">Detail Pelatihan</h4>
									<button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">&times;</button>
								</div>
								<form action="views/data.php?aksi=ubah&id=<?php echo $key['id_pelatihan']; ?>" method="post" enctype="multipart/form-data">
									<div class="modal-body">
										<div class="form-group">
											<label class="control-label" for="judul">Nama Pelatihan</label>
											<input type="text" name="judul" class="form-control" id="judul" value="<?php echo $key['judul']; ?>" disabled="false">
										</div>
										<div class="form-group">
											<label class="control-label" for="deskripsi">Deskripsi</label>
											<input type="textarea" name="deskripsi" class="form-control" id="deskripsi" value="<?php echo $key['deskripsi']; ?>" disabled="false">
										</div>
										<div class="form-group">
											<label class="control-label" for="tglpel">Tanggal</label>
											<input type="date" name="tglpel" class="form-control" id="tglpel" value="<?php echo $key['tglpel']; ?>" disabled="false">
										</div>
										<div class="form-group">
											<label class="control-label" for="Jumlah">Jumlah Peserta</label>
											<p><b><?php echo $key['total'];?></b></p>
										</div>
										<div class="form-group">
											<label class="control-label" for="banner">Banner </label>
											<img src="assetss/img/<?php echo $key['banner'];?>" alt="gambar" width="100%">
										</div>
										
									</div>
									<div class="modal-footer">
										<button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					<?php 
					}
					?>
			</div>
				
		</main>
	</div>
</div>