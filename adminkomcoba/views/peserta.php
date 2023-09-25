 <?php
    include("models/koneksi.php");
    ?>
    <?php
$host="localhost";
$user="root";
$password="";
$database="pelatihankominfo";

$koneksi=mysqli_connect($host,$user,$password,$database);
?>
 <div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Daftar Peserta</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"></li>
                    <li class="breadcrumb-item active">Tabel Peserta</li>
                </ol>


                <div class="card-header">
                    <form method="post" action="views/export.php">
                    <input type="submit" name="export" class="btn btn-success" value="Export Excel" />
                    </form>
                </div>
                        <form action="" method="POST">
    <div class="form-group">
        <label for="sel1">Select list:</label>
        <select class="pilih" name="pelatihan">
             <option value="0">Pilih Pelatihan</option>
            <?php
            include "koneksi.php";
            //Perintah sql untuk menampilkan semua data pada tabel jurusan
            $sql="select * from pelatihan";

            $hasil=mysqli_query($koneksi,$sql);
            $no=0;
            while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            $ket="";
            if (isset($_POST['pelatihan'])) {
                $jurusan = trim($_POST['pelatihan']);

                if ($jurusan==$data['id_pelatihan'])
                {
                    $ket="selected";
                }
            }
            ?>
            <option <?php echo $ket; ?> value="<?php echo $data['id_pelatihan'];?>"><?php echo $data['judul'];?></option>
            <?php
    }
  ?>
  <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
    </select>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-info" value="Pilih">
    </div>
    </form>
            <div class="card-body">
                <table id="datatablesSimple" class="table">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>nama</th>
                            <th>notelp</th>
                            <th>email</th>
                            <th>Gender</th>
                            <th>profesi</th>
                            <th>instansi</th>
                            <th>Pelatihan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                            require_once 'models/m_peserta.php';
                            $object = new modelpeserta();
                            //$object->inputdata();
                            $no = 1;
                            $object->setdata();
                            $datapeserta = $object->getdata();
                            foreach ($datapeserta as $key) {

                            ?>
                            <tr>
                                <td><?php echo $no++ . "."; ?></td>
                                <td><?php echo $key['nama']; ?></td>
                                <td><?php echo $key['notelp']; ?></td>
                                <td><?php echo $key['email']; ?></td>
                                <td><?php echo $key['jkel']; ?></td>
                                <td><?php echo $key['profesi']; ?></td>
                                <td><?php echo $key['instansi']; ?></td>
                                <td><?php echo $key['judul']; ?></td>
                                <td><button class="btn btn-danger btn-xs" type="button" onclick="window.location.href='views/data2.php?aksi=hapus&id=<?php echo $key['id_peserta']; ?>';"><i class="fa fa-trash"></i></button></td>
                                
                            </tr>
                        <?php
                            }
                            ?>
                    </tbody>
                </table>
                <?php
                    require_once 'models/m_peserta.php';
                    $object = new modelpeserta();
                    //$object->inputdata();
                    $no = 1;
                    $object->setdata();
                    $datapelatihan = $object->getdata();
                    foreach ($datapeserta as $key) {

                    ?>
                    <div id="mymodal<?php echo $key['id_peserta'] ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Edit Pelatihan</h4>
                                    <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                                </div>
                                <form action="views/data2.php?aksi=ubah&id=<?php echo $key['id_peserta']; ?>" method="post" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="control-label" for="judul">Nama Pelatihan</label>
                                            <input type="text" name="judul" class="form-control" id="judul" value="<?php echo $key['judul']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="deskripsi">Deskripsi</label>
                                            <input type="text" name="deskripsi" class="form-control" id="deskripsi" value="<?php echo $key['deskripsi']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="tglpel">Tanggal</label>
                                            <input type="date" name="tglpel" class="form-control" id="tglpel" value="<?php echo $key['tglpel']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="banner">Banner</label>
                                            <input type="file" name="banner" class="form-control" id="banner" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="reset" class="btn btn-danger">Reset</button>
                                        <button type="submit" name="submit" class="btn btn-success" value="Send">Send</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php
                    }
                    ?>
            </div>
        </main>
    </div>
 </div>