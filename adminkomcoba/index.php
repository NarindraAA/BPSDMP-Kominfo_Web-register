<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('location: ../adminkomcoba/views/login.php');
}
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>BPSDMP Kominfo - Admin</title>
    <link href="../assets/img/logo.png" rel="icon">
    <link href="../assets/img/logo.png" rel="logo">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="assetss/css/styless.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tiny.cloud/1/97fbvi34ig6clv12k9vbaik3o20anvjsmj2w15f7mjwud461/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        selector: '#mytextarea'
      });
    </script>
    <script type="text/javascript" src="views/chartjs/Chart.js"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="?page=dashboard">BPSDMP Kominfo</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#tambahadm" href="#tambahadm">Register Admin</a></li>
                    <li><a class="dropdown-item" href="../index.php">Lihat Website</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="../adminkomcoba/views/logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Menu</div>
                        <a class="nav-link" href="?page=dashboard">
                            <div class="sb-nav-link-icon"><i class="fas fa-laptop-house"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="?page=pelatihan">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Pelatihan
                        </a>
                        <a class="nav-link" href="?page=peserta">
                            <div class="sb-nav-link-icon"><i class="fas fa-person-booth"></i></div>
                            Peserta
                        </a>
                        <a class="nav-link" href="?page=admin">
                            <div class="sb-nav-link-icon"><i class="fas fa-users-cog"></i></div>
                            Manage Admin
                        </a>
                        <a class="nav-link" href="?page=email">
                            <div class="sb-nav-link-icon"><i class="fas fa-envelope-open-text"></i></div>
                            Send Email
                        </a>
                    </div>
                </div>
            </nav>
        </div>
       
    </div>
    

    <div id="page-wrapper">

        <?php
        if (@$_GET['page'] == 'dashboard' || @$_GET['page'] == '') {
            include "views/dashboard.php";
        } else if (@$_GET['page'] == 'pelatihan') {
            include "views/pelatihan.php";
        } else if (@$_GET['page'] == 'peserta') {
            include "views/peserta.php";
        } else if (@$_GET['page'] == 'admin') {
            include "views/adminn.php";
        }else if (@$_GET['page'] == 'email') {
            include "views/email.php";
        }
        ?>

    </div>

    <div id="tambahadm" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Admin Baru</h4>
                    <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                </div>
                <form action="views/kirim.php?aksi=tambah" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label" for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password" required>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="assetss/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="assetss/js/datatables-simple-demo.js"></script>
</body>

</html>