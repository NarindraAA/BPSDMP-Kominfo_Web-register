<?php
$koneksi = new mysqli("localhost", "root", "", "pelatihankominfo");

$username = $_POST['email'];
$password = $_POST['password'];

$sql_login = "SELECT * FROM tb_admin WHERE email='" . $username . "' AND password='" . $password . "' AND statuss='1'";
$query_login = mysqli_query($koneksi, $sql_login);
$data_login = mysqli_fetch_array($query_login, MYSQLI_BOTH);
$jumlah_login = mysqli_num_rows($query_login);

if ($jumlah_login == 1) {
    session_start();
    $_SESSION['id'] = $data_login['id'];
    $_SESSION['nama'] = $data_login['nama'];
    $_SESSION['email'] = $data_login['email'];

    echo "<script>alert('LOGIN SUKSES')</script>";
    echo "<meta http-equiv='refresh' content='0; url=../?page=dashboard'>";
} else {
    echo "<script>alert('LOGIN GAGAL')</script>";
    echo "<meta http-equiv='refresh' content='0; url=login.php'>";
}
