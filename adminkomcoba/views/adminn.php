 <?php
	include("models/koneksi.php");
	?>
 <div id="layoutSidenav">
 	<div id="layoutSidenav_content">
 		<main>
 			<div class="container-fluid px-4">
 				<h1 class="mt-4">Daftar admin</h1>
 				<ol class="breadcrumb mb-4">
 					<li class="breadcrumb-item"></li>
 					<li class="breadcrumb-item active">Tabel admin</li>
 				</ol>
 				<span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>


 				<!-- <div class="card-header">
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
									</div>
									<div class="modal-footer">
										<button type="reset" class="btn btn-danger">Reset</button>
										<button type="submit" name="submit" class="btn btn-success" value="Send">Send</button>
									</div>
								</form>
								
							</div>
						</div>
					</div>

				</div> -->
 			</div>
 			<div class="card-body">
 				<table id="datatablesSimple" class="table">
 					<thead class="table-dark">
 						<tr>
 							<th>No</th>
 							<th>nama</th>
 							<th>email</th><!-- 
 							<th>Status</th> --><!-- 
 							<th>Send Email</th> -->
 							<th>Action</th>
 						</tr>
 					</thead>
 					<tbody>
 						<?php
							require_once 'models/m_admin.php';
							$object = new modeladmin();
							//$object->inputdata();
							$no = 1;
							$object->setdata();
							$dataadmin = $object->getdata();
							foreach ($dataadmin as $key) {

							?>
 							<tr>
 								<td><?php echo $no++ . "."; ?></td>
 								<td><?php echo $key['nama']; ?></td>
 								<td><?php echo $key['email']; ?></td><!-- 
 								<td><?php echo $key['statuss']; ?></td> -->
 								<td><button class="btn btn-danger btn-xs" type="button" data-bs-toggle="modal" data-bs-target="#mymodal1<?php echo $key['id'] ?>"><i class="fa fa-trash" style="width: 20px"></i></button>
 								<button class="btn btn-secondary btn-xs" type="button" data-bs-toggle="modal" data-bs-target="#mymodal2<?php echo $key['id'] ?>"><i class="fa fa-key" style="width: 20px"></i></button></td>
 								
 							</tr>
 						<?php
							}
							?>
 					</tbody>
 				</table>
 				<?php
     		require_once 'models/m_admin.php';
			$object = new modeladmin();
			//$object->inputdata();
			$no = 1;
			$object->setdata();
			$dataadmin = $object->getdata();
			foreach ($dataadmin as $key) {
			 ?>
				<div id="mymodal1<?php echo $key['id'] ?>" class="modal fade" role="dialog">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title">Peringatan!!!</h4>
									<button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">&times;</button>
								</div>
								<form action="views/data3.php?aksi=hapus&id=<?php echo $key['id']; ?>" method="post" enctype="multipart/form-data">
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
     		require_once 'models/m_admin.php';
			$object = new modeladmin();
			//$object->inputdata();
			$no = 1;
			$object->setdata();
			$dataadmin = $object->getdata();
			foreach ($dataadmin as $key) {
			 ?>
				<div id="mymodal2<?php echo $key['id'] ?>" class="modal fade" role="dialog">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title">Change Password</h4>
									<button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">&times;</button>
								</div>
								<form action="views/ubahpassword.php?&id=<?php echo $key['id']; ?>" method="post" enctype="multipart/form-data">
									<div class="modal-body">
										<div class="form-group">
											<label class="control-label" for="password_lama">Current Password</label>
											<input type="Password" name="password_lama" class="form-control" id="password_lama" required>
										</div>
										<div class="form-group">
											<label class="control-label" for="password_baru">New Password</label>
											<input type="Password" name="password_baru" class="form-control" id="password_baru" required>
										</div>
										<div class="form-group">
											<label class="control-label" for="konfirmasi_password">Confirm Password</label>
											<input type="Password" name="konfirmasi_password" class="form-control" id="konfirmasi_password" required>
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
 		</main>
 	</div>
 </div>