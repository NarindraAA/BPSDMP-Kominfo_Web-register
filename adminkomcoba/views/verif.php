<?php
include 'koneksi.php';

$token = $_GET['token'];
$sql_cek = mysqli_query($koneksi, "SELECT * FROM tb_admin WHERE token='" . $token . "' AND statuss='0'");
$jumlah_login = mysqli_num_rows($sql_cek);
if ($jumlah_login > 0) {
    //update data users aktif
    mysqli_query($koneksi, "UPDATE tb_admin SET statuss='1' WHERE token='" . $token . "' AND statuss='0'");
    echo '<div class="alert alert-success">
                        Akun anda sudah aktif, silahkan <a href="login.php">Login</a>
                        </div>';
} else {
    //data tidak di temukan
    echo '<div class="alert alert-warning">
                        Invalid Token!
                        </div>';
}
