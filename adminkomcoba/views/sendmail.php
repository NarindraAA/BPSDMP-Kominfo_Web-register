<?php
    $konek = mysqli_connect("localhost", "root", "", "pelatihankominfo"); 


include "classes/class.phpmailer.php";

$pela = $_POST['pelatihan'];
$ps = $_POST['pesan'];
$sub = $_POST['subjek'];

// $query_input = mysqli_query($konek,"insert into tb_link(link) values('$lin')");

$query_use = mysqli_query($konek, "SELECT email FROM peserta WHERE id_pelatihan =$pela");
// $row = mysqli_fetch_array($query_use);

if (isset($_POST['submit'])) {
    // code...

$pesan = $_POST['pesan'];
$subject = $_POST['subjek'];

foreach ($query_use as $row ) {
    // code...

$mail = new PHPMailer;
$mail->IsSMTP();
$mail->SMTPSecure = 'ssl';
$mail->Host = "smtp.gmail.com"; //host email
$mail->SMTPDebug = 2;
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->Username = "narindraarif4@gmail.com"; //user email server
$mail->Password = "arif2000"; //password email server
$mail->SetFrom("narindraarif4@gmail.com", "Testing"); //set email pengirim / server
$mail->Subject = ($subject); //subyek email
$mail->AddAddress($row['email']);  // email tujuan
$mail->MsgHTML($pesan);

 $result = $mail->Send();      //Send an Email. Return true on success or false on error
}
      if ($result["code"] == '400') {
         $output .= html_entity_decode($result['full_error']);
      }
      else{
        echo "<script>alert('PENGIRIMAN SUKSES')</script>";
        echo "<meta http-equiv='refresh' content='0; url=../?page=email'>";
      }
   
   /*if ($output == '') {
      echo 'ok';
   } else {
      echo $output;
   }*/

   /*if ($mail->Send()) {
    echo "<script>alert('PENDAFTARAN SUKSES')</script>";
    echo "<meta http-equiv='refresh' content='0; url=login.php'>";
    // echo "<script type='text/javascript'> document.location = 'index.php';</script>";
} else {
    echo "<script>alert('PENDAFTARAN GAGAL')</script>";
    echo "<meta http-equiv='refresh' content='0; url=index.php'>";
}*/

}
?>

<!-- Elseif Channel -->