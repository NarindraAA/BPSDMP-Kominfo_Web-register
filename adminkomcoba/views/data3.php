<?php
require_once '../models/m_admin.php';

class prosesadmin
{
	public $aksi;

	function __construct()
	{
		$this->aksi=$_GET['aksi'];
	}

	function proses()
	{
		$model=new modeladmin();
		if ($this->aksi=="hapus") 
		{
			$id=$_GET['id'];	
			$model->hapusdata($id);
			header("location: ../?page=adminn");
		}
	}
}
$object = new prosesadmin();
$object->proses();
