<?php
    $konek = mysqli_connect("localhost", "root", "", "pelatihankominfo"); 


include "classes/class.phpmailer.php";

$pela = $_POST['pelatihan'];
$lin = $_POST['link'];

$query_input = mysqli_query($konek,"insert into tb_link(link) values('$lin')");

$query_use = mysqli_query($konek, "SELECT email FROM peserta WHERE id_pelatihan =$pela");
// $row = mysqli_fetch_array($query_use);

if ($query_input) {
    // code...

$pesan = $_POST['link'];

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
$mail->Subject = "Pendaftaran Pelatihan BPSDMP KOMINFO"; //subyek email
$mail->AddAddress($row['email']);  // email tujuan
$mail->MsgHTML($pesan);

 $result = $mail->Send();      //Send an Email. Return true on success or false on error

      if ($result["code"] == '400') {
         $output .= html_entity_decode($result['full_error']);
      }
   }
   if ($output == '') {
      echo 'ok';
   } else {
      echo $output;
   }
}
?>

<!-- Elseif Channel -->