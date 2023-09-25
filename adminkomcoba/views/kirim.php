<?php
function generate_uuid()
{
    return sprintf(
        '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0x0fff) | 0x4000,
        mt_rand(0, 0x3fff) | 0x8000,
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff)
    );
}

$UUID = generate_uuid();
?>

<?php
$koneksi = new mysqli("localhost", "root", "", "pelatihankominfo");

$nama = $_POST['nama'];
$email = $_POST['email'];
$password = $_POST['password'];
// $subjek = "Aktivasi Akun";
$pesan = "Selamat, Anda telah terdaftar sebagai admin pada sistem BPSDMP Kominfo. Berikut email dan password anda: <br><br>Email : ".$email."<br><br>Password : ".$password." <br>Untuk mengaktifkan akun silahkan klik link tersebut : <a href='http://localhost/pelatihankominfo/adminkomcoba/views/verif.php?token=$UUID'>Aktifkan Akun Sekarang</a> ";


$sql_simpan = "INSERT INTO tb_admin (nama,email,password,token) VALUES (
    '" . $nama . "',
    '" . $email . "',
    '" . $password . "',
    '$UUID')";
$query_simpan = mysqli_query($koneksi, $sql_simpan);
mysqli_close($koneksi);

// require_once('send_email.php');
include "classes/class.phpmailer.php";

$mail = new PHPMailer;
$mail->IsSMTP();
$mail->SMTPSecure = 'ssl';
$mail->Host = "smtp.gmail.com"; //host email
$mail->SMTPDebug = 2;
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->Username = "narindraarif4@gmail.com"; //user email server
$mail->Password = "arif2000"; //password email server
$mail->SetFrom("narindraarif4@gmail.com", "BPSDMP Kominfo"); //set email pengirim / server
$mail->Subject = "Aktifasi Admin"; //subyek email
// $mail->AddAddress($tujuan);  // email tujuan
// $mail->MsgHTML("Selamat, anda berhasil menerima Pesan Notifikasi ini");

// $mail->Subjek = $subjek;
$mail->AddAddress($email);
$mail->MsgHTML($pesan);

if ($mail->Send()) {
    echo "<script>alert('PENDAFTARAN SUKSES')</script>";
    echo "<meta http-equiv='refresh' content='0; url=../index.php'>";
    // echo "<script type='text/javascript'> document.location = 'index.php';</script>";
} else {
    echo "<script>alert('PENDAFTARAN GAGAL')</script>";
    echo "<meta http-equiv='refresh' content='0; url=index.php'>";
}

?>