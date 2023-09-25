<?php
class koneksi
{ 
    protected $koneksi;
    private $server="localhost";
    private $uname="root";
    private $dbname="pelatihankominfo";

    function __construct() 
    {
        $koneksiDB = mysqli_connect($this->server,$this->uname,"",$this->dbname);      
        if (mysqli_connect_errno())
        {
            echo "Koneksi database gagal : " . mysqli_connect_error();
        }
        else
        {
            $this->konek=$koneksiDB;
            //echo "koneksi berhasil ";
        }
    }
} 
?>