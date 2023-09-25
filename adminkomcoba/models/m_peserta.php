<?php
require_once 'koneksi.php';

class modelpeserta extends koneksi
{
    private $data;
 
    function setdata()
    {
        if (isset($_POST['pelatihan'])) {
            $pelatihan=trim($_POST['pelatihan']);
            $sql="SELECT peserta.id_peserta, peserta.nama, peserta.notelp, peserta.email,peserta.jkel, peserta.profesi, peserta.instansi, pelatihan.judul FROM pelatihan INNER JOIN peserta ON pelatihan.id_pelatihan=peserta.id_pelatihan WHERE pelatihan.id_pelatihan='$pelatihan' ORDER BY peserta.nama asc ";
        }else {
            $sql="SELECT peserta.id_peserta, peserta.nama, peserta.notelp, peserta.email,peserta.jkel, peserta.profesi, peserta.instansi, pelatihan.judul FROM pelatihan INNER JOIN peserta ON pelatihan.id_pelatihan=peserta.id_pelatihan ORDER BY peserta.nama asc";
        }
        $exec = mysqli_query($this->konek,$sql);
    
        while ($d = mysqli_fetch_array($exec))
        {
            $temp[]=$d;
        }
        $this->data=$temp;
    }


    function getdata()
    {
        return $this->data;
    }

    function view()
    {
        foreach ($this->data as $key) {
            echo $key['id_peserta'];
            echo " ";
            echo $key['nama'];
            echo " ";
            echo $key['notelp'];
            echo " ";
            echo $key['email'];
            echo " ";
            echo $key['jkel'];
            echo " ";
            echo $key['profesi'];
            echo " ";
            echo $key['instansi'];
            echo " ";
            echo $key['judul'];
            echo " ";
        }
    }

	function ubahdata($id,$judul,$deskripsi,$tglpel,$banner)
	{
		$sql="update peserta set judul='$judul', deskripsi='$deskripsi', tglpel='$tglpel', banner='$banner' where id_pelatihan='$id'";
		$exec=mysqli_query($this->konek,$sql);
	}

	function hapusdata($id)
	{
		$sql="delete from peserta where id_peserta='$id'";
		$exec=mysqli_query($this->konek,$sql);
	}

}
