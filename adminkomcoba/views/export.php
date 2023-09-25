<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "", "pelatihankominfo");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT peserta.id_peserta, peserta.nama, peserta.notelp, peserta.email,peserta.jkel, peserta.profesi, peserta.instansi, pelatihan.judul FROM pelatihan INNER JOIN peserta ON pelatihan.id_pelatihan=peserta.id_pelatihan";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>Name</th> 
                         <th>No Telpon</th>  
                         <th>Email</th>  
                         <th>Jenis Kelamin</th>
                         <th>Profesi</th>
                         <th>Instansi</th>
                         <th>Pelatihan</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["nama"].'</td>  
                         <td>"'.$row["notelp"].'"</td>  
                         <td>'.$row["email"].'</td>  
       <td>'.$row["jkel"].'</td>  
       <td>'.$row["profesi"].'</td>
       <td>'.$row["instansi"].'</td>
       <td>'.$row["judul"].'</td>
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=peserta.xls');
  echo $output;
 }
}
?>