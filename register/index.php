<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Now - KOMINFO</title>

    <link href="../assets/img/logo.png" rel="icon">
    <link href="../assets/img/logo.png" rel="logo">

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/styles.css">
    <?php 
    include("koneksi.php");
    ?>
</head>

<body>

    <div class="main">
        <div class="container">
            <div class="signup-content">
                <div class="signup-img">
                    <img src="images/KOMINFO.jpg" alt="">
                </div>
                <div class="signup-form">
                    <form method="POST" class="register-form" id="register-form" action="eksekutor.php">
                        <h2>registration form</h2>
                        <div class="form-group">
                            <label for="namalengkap">Nama Lengkap</label>
                            <input type="text" name="namalengkap" id="namalengkap" required />
                        </div>
                        <div class="form-group">
                            <label for="nohp">No Hp</label>
                            <input type="text" name="nohp" id="profesi" required />
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" />
                        </div>
                        <div class="form-radio">
                            <label for="jeniskelamin" class="radio-label">Jenis Kelamin</label>
                            <div class="form-radio-item">
                                <input type="radio" name="jeniskelamin" id="laki-laki" value="laki-laki" checked>
                                <label for="laki-laki">Laki-Laki</label>
                                <span class="check"></span>
                            </div>
                            <div class="form-radio-item">
                                <input type="radio" name="jeniskelamin" id="perempuan" value="perempuan">
                                <label for="perempuan">Perempuan</label>
                                <span class="check"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="profesi">Profesi</label>
                            <input type="text" name="profesi" id="profesi">
                        </div>
                        <div class="form-group">
                            <label for="instansi">Instansi</label>
                            <input type="text" name="instansi" id="instansi">
                        </div>
                        <div class="form-group">
                            <label for="pelatihan">Pelatihan</label>
                            <div class="form-select">
                                <select name="pelatihan" id="pelatihan">
                                    <option value="0">Pilihan Anda</option>
                                    <?php
                                        $query_pelatihan = mysqli_query($koneksi, "select *from pelatihan");
                                        while($a= mysqli_fetch_array($query_pelatihan))
                                        {
                                    ?>
                                    <option value="<?php echo $a['id_pelatihan']?>"><?php echo $a['judul'];?></option>
                                    <?php 
                                        }
                                     ?>
                                </select>
                                <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                            </div>
                        </div>
                        <div class="form-submit"><!-- 
                            <p>*/Silahkan cek span email anda apabila belum mendapatkan notifikasi email</p> -->
                            <input type="submit" value="Reset All" class="submit" name="reset" id="reset" />
                            <input type="submit" value="Submit" class="submit" name="submit" id="submit" ac />
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>