<?php {

  require_once('phpmail/class.phpmailer.php');
  require_once('phpmail/class.smtp.php');
  include('koneksi.php');
  $ml = $_POST['email'];

  $select = mysqli_query($koneksi, "SELECT email, password FROM tb_admin WHERE email = '$ml'");
  if (mysqli_num_rows($select) == 1) {
    while ($row = mysqli_fetch_array($select)) {
      $ml = $row['email'];
      $pass = md5($row['password']);
    }
    //$link="<a href='localhost:8080/phpmailer/reset_pass.php?key=".$email."&reset=".$pass."'>Click To Reset password</a>";
    $mail = new PHPMailer();

    $body      = "Klik link berikut untuk reset Password, <a href='http://localhost/pelatihankominfo/adminkomcoba/views/reset_pass.php?reset=$pass&key=$ml'>$pass<a>"; //isi dari email

    // $mail->CharSet =  "utf-8";
    $mail->IsSMTP();
    // enable SMTP authentication
    $mail->SMTPDebug  = 1;
    $mail->SMTPAuth = true;
    // GMAIL username
    $mail->Username = "rakavando@gmail.com";
    // GMAIL password
    $mail->Password = "gjckusftkqjbjuqy";
    $mail->SMTPSecure = "ssl";
    // sets GMAIL as the SMTP server
    $mail->Host = "smtp.gmail.com";
    // set the SMTP port for the GMAIL server
    $mail->Port = "465";
    $mail->From = 'rakavando@gmail.com';
    $mail->FromName = 'BPSDMP Kominfo';

    $email = $_POST['email'];

    $mail->AddAddress($ml, 'User Sistem');
    $mail->Subject  =  'Reset Password';
    $mail->IsHTML(true);
    $mail->MsgHTML($body);
    if ($mail->Send()) {
      echo "<script> alert('Link reset password telah dikirim ke email anda, Cek email untuk melakukan reset'); window.location = 'password.php'; </script>"; //jika pesan terkirim

    } else {
      echo "Mail Error - >" . $mail->ErrorInfo;
    }
  } else {
    echo "<script> alert('Email anda tidak terdaftar di sistem'); window.location = 'password.php'; </script>"; //jika pesan terkirim

  }
}