<?php
require_once '../models/m_pelatihan.php';

class prosespelatihan
{
	public $aksi;

	function __construct()
	{
		$this->aksi = $_GET['aksi'];
	}

	function proses()
	{
		$model = new modelpelatihan();
		if ($this->aksi == "tambah") {
			$judul = $_POST['judul'];
			$deskripsi = $_POST['deskripsi'];
			$tglpel = $_POST['tglpel'];
			// $banner=upload();
			// if (!$banner) {
			// 	return false;

			$extensi = explode(".", $_FILES['banner']['name']);
			$banner = "ban-" . round(microtime(true)) . "." . end($extensi);
			$tmpname = $_FILES['banner']['tmp_name'];
			move_uploaded_file($tmpname, "../assetss/img/" . $banner);
			// }

			$extensi_Poster = explode(".", $_FILES['poster']['name']);
			$poster = "pos-" . round(microtime(true)) . "." . end($extensi_Poster);
			$tmpPoster = $_FILES['poster']['tmp_name'];
			move_uploaded_file($tmpPoster, "../assetss/img/" . $poster);
			// $banner=$_FILES['banner'];
			// $model->inputdata($judul, $deskripsi, $tglpel, $banner);
			// header("location: index.php?page=pelatihan");
			// // 	header("location: ?page=pelatihan");
			//          $extensi = explode(".", $_FILES['banner']['name']);
			// $banner = "ban-" . round(microtime(true)) . "." . end($extensi);
			// $sumber = $_POST['banner']['tmp_name'];
			// $upload = move_uploaded_file($sumber, "assets/img/pelatihan/" . $banner);
			// if ($upload) {
			// 	$model->inputdata($judul, $deskripsi, $tglpel, $banner);
			// 	header("location: ?page=pelatihan");
			// } else {
			// 	echo "<script>alert('Upload gagal')</script";
			// }

			// $namaFile=$_FILES['banner']['name'];
			// $ukuranFile=$_FILES['banner']['size'];
			// $error=$_FILES['banner']['error'];
			// $tmpName=$_FILES['banner']['tmp_name'];
			// if ($error === 4) {
			// 	echo "<script>alert('pilih gambar dahulu!!')</script>";
			// }

			// $ekstensiGambarValid = ['jpg','jpeg','png'];
			// $ekstensiGambar = explode('.', $namaFile);
			// $ekstensiGambar = strtolower(end($ekstensiGambar));
			// if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
			// 	echo "<script>alert('upload gambar blok!!')</script>";
			// 	return false;
			// }

			// if ($ukuranFIle > 1000000) {
			// 	echo "alert('gambar besar!!')";
			// 	return false;
			// }

			// $banner=move_uploaded_file($tmpname, "assets/img/pelatihan/" . $namaFile);

			$model->inputdata($judul, $deskripsi, $tglpel, $banner, $poster);
			header("location: ../?page=pelatihan");
		} elseif ($this->aksi == "ubah") {
			$id = $_GET['id'];
			$judul = $_POST['judul'];
			$deskripsi = $_POST['deskripsi'];
			$tglpel = $_POST['tglpel'];

			$extensi = explode(".", $_FILES['banner']['name']);
			$banner = "ban-" . round(microtime(true)) . "." . end($extensi);
			$tmpname = $_FILES['banner']['tmp_name'];
			move_uploaded_file($tmpname, "../assetss/img/" . $banner);

			$extensi_Poster = explode(".", $_FILES['poster']['name']);
			$poster = "pos-" . round(microtime(true)) . "." . end($extensi_Poster);
			$tmpPoster = $_FILES['poster']['tmp_name'];
			move_uploaded_file($tmpPoster, "../assetss/img/" . $poster);

			$model->ubahdata($id, $judul, $deskripsi, $tglpel, $banner, $poster);
			header("location: ../?page=pelatihan");
		} elseif ($this->aksi == "hapus") {
			$id = $_GET['id'];
			$model->hapusdata($id);
			header("location: ../?page=pelatihan");
		} elseif ($this->aksi == "send") {
			$id = $_GET['id'];
			$model->sendemail($id);
			header("location: ../?page=pelatihan");
		}
	}
}
$object = new prosespelatihan();
$object->proses();
