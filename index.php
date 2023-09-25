<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>BPSDMP Kominfo Surabaya</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/logo.png" rel="icon">
    <link href="assets/img/logo.png" rel="logo">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Gp - v2.2.1
  * Template URL: https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
    <?php 
    include("konek.php");
    $result = mysqli_query($konek,"select banner from pelatihan");
?>
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center justify-content-between">

            <h1 class="logo"><a href="#"><img src="assets/img/logo.png" alt="kominfo">&nbsp;<span>Bpsdmp
                        Kominfo</span></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <!--<li class="active"><a href="index.html">Home</a></li>-->
                    <!-- <li><a href="#about">Pelatihan</a></li>
          <li><a href="#services">Services</a></li> -->
                    <!-- <li><a href="#portfolio">Portfolio</a></li> -->
                    <li><a href="#team">Pelatihan</a></li>
                    <!-- <li class="drop-down"><a href="">Drop Down</a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="drop-down"><a href="#">Deep Drop Down</a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> -->
                    <li><a href="#contact">Alamat</a></li>

                </ul>
            </nav><!-- .nav-menu -->

            <!-- <a href="#about" class="get-started-btn scrollto">Get Started</a> -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center justify-content-center">
        <div class="container" data-aos="fade-up">

            <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
                <div class="col-xl-6 col-lg-8">
                    <h1>Create Your Future<span>.</span></h1>
                </div>
            </div>



        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section class="about-section text-center" id="about">
            <div class="container">
                <CENTER>
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">

                            <?php 
                $i =0;
                foreach ($result as $key =>$value ) {
                  // code...
                  $actives = '';
                  if ($i == 0) {
                    // code...
                    $actives = 'active';
                  }
                ?>
                            <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i; ?>"
                                class="<?= $actives; ?>"></li>
                            <?php $i++; } ?>

                        </ol>

                        <div class="carousel-inner" style="width: 60%;">
                            <?php 
                $i =0;
                foreach ($result as $key => $value ) {
                  // code...
                  $actives = '';
                  if ($i == 0) {
                    // code...
                    $actives = 'active';
                  }
                ?>
                            <div class="carousel-item <?= $actives; ?>">
                                <img src="adminkomcoba/assetss/img/<?= $value['banner']; ?>" width="100%">
                            </div>
                            <?php $i++; } ?>

                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                            data-slide="prev" style="width: 50%;">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                            data-slide="next" style="width: 50%;">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
            </div>
            </CENTER>
        </section>
        <!-- End About Section -->

        </section>-->
        <!-- End Testimonials Section -->

        <!-- ======= Team Section ======= -->
        <section id="team" class="team">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Pelatihan</h2>
                    <p>Daftar Pelatihan</p>
                </div>

                <div class="row">
                    <?php 
        $query_use= mysqli_query($konek,"select*from pelatihan");
        $x = 1;
        while($j = mysqli_fetch_array($query_use))
        {
        ?>
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="member" data-aos="fade-up" data-aos-delay="100">
                            <div class="member-img">
                                <img src="adminkomcoba/assetss/img/<?php echo $j['poster'];?>" width="100%"
                                    height="30%">

                            </div>
                            <div class="member-info">
                                <h4><?php echo $j['judul'] ?></h4>
                                <span><?php echo $j['deskripsi'];?></span>
                                <center><button type="button" class="btn btn-outline-warning" style="margin-top: 1rem;"
                                        value="Submit" onclick="window.location.href='register/index.php';">
                                        Daftar</button></center>
                            </div>
                        </div>

                    </div>
                    <?php
              $x++;
            }
            ?>

                </div>

            </div>
        </section><!-- End Team Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Contact</h2>
                    <p>Alamat</p>
                </div>

                <div>
                    <iframe style="border:0; width: 100%; height: 270px;"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.7097174405844!2d112.73138161487668!3d-7.386390774761454!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e489f526de1b%3A0x6a6ab0bf3345a1ae!2sBPSDMP%20KOMINFO%20Surabaya!5e0!3m2!1sid!2sid!4v1624499557808!5m2!1sid!2sid"
                        frameborder="0" allowfullscreen></iframe>
                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-info">
                            <h3>Hubungi&nbsp;<span>Kami</span></h3>
                            <p>
                                Jl. Raya Ketajen No.36, Ketajen<br>
                                Kec. Gedangan, Kabupaten Sidoarjo, Jawa Timur 61254<br><br>
                                <strong>Phone:</strong> +62318011944<br>
                                <!-- <strong>Email:</strong> info@example.com<br> -->
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Link</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a
                                    href="../pelatihankominfo/adminkomcoba/">Admin</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Sosial Media</h4>
                        <ul>
                            <li><a href="https://www.instagram.com/bpsdmp.kominfo.sby/" class="instagram"><i
                                        class="bx bxl-instagram"></i>Instagram</a></li>
                            <li><a href="https://www.youtube.com/channel/UC64_56dUD8moMzOgVGhiHEQ"
                                    class="google-plus"><i class="bx bxl-youtube"></i>Youtube</a></li>

                        </ul>
                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Bpsdmp Kominfo</span></strong>
            </div>
            <div class="credits">

            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/venobox/venobox.min.js"></script>
    <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="assets/vendor/counterup/counterup.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>