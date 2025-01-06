<?php
include '../../config/config.php';
session_start(); //Memulai session
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>MI AL HIDAYAH PATI</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <!-- Favicons -->
  <link href="<?= $url ?>/assets/ilanding/img/favicon.png" rel="icon">
  <link href="<?= $url ?>/assets/ilanding/img/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="<?= $url ?>/assets/ilanding/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= $url ?>/assets/ilanding/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= $url ?>/assets/ilanding/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?= $url ?>/assets/ilanding/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?= $url ?>/assets/ilanding/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <!-- Main CSS File -->
  <link href="<?= $url ?>/assets/ilanding/css/main.css" rel="stylesheet">
</head>

<body class="index-page">
  <main class="main">
    <!-- Contact Section -->
    <section id="pendaftaran" class="contact section light-background">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <!-- <h2>Pendaftaran</h2>
        <p>Silahkan Daftarkan anak anda untuk bergabung dengan sekolah yang berkarakter dan berbudi luhur MI AL-HIDAYAH PATI.</p> -->
      
        <div style="text-align: center">
            <img src="<?= $url ?>/assets/dist/img/logo-alhidayah.png" alt="" style="width:15%;">
          </div>  
          <a href="<?= $url ?>/">
             <h2> Sistem Monitoring 
             <br> Akademik Siswa</h2>
            <h1 style="font-family:Georgia, 'Times New Roman', Times, serif;"> MI AL HIDAYAH PATI</1>
          </a>
        </div><!-- /.login-logo -->

      </div>
      <!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100" style="width: 600px;">
        <div class="contact-form" data-aos="fade-up" data-aos-delay="300">
          <h3 class="text-center">LOGIN</h3>
          <p class="text-center">Silahkan masukkan username dan password untuk mengakses sistem.</p>
          <form action="<?= $url . "/aksi/login.php" ?>" enctype="multipart/form-data" method="POST" class="php-email-form">
            <?php if (isset($_SESSION['message'])) {
              if ($_SESSION['message_code'] == 200) {
            ?>
                <div class="text-center text-bg-primary rounded-3">
                  <i class="bi bi-check-circle-fill"></i> <?= $_SESSION['message'] ?>. Silahkan Login
                </div>
                <br>
              <?php
              } else {
              ?>
                <div class="text-center text-bg-danger rounded-3">
                  <i class="bi bi-door-closed-fill"></i> <?= $_SESSION['message'] ?>
                </div>
                <br>
            <?php
              }
            }
            ?>
            <div class="row gy-4">
              <label for="username" class="col-md-4 ">Username</label>
              <div class="col-md-8">
                <input type="text" class="form-control" name="username" id="username" placeholder="Username Account" required>
              </div>
              <label for="password" class="col-md-4">Password</label>
              <div class="col-md-8">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
              </div>
              <div class="col-12 text-center">
                <button type="submit" class="btn btn-sm" name="daftaruser" value="daftaruser"><i class="bi bi-arrow-right"></i> LOGIN</button>
              </div>
            </div>
          </form>
          <?php
        if (isset($_SESSION['unvalid_username'])) {
        ?>
          <div id="alert-notif" class="alert alert-warning alert-dismissible  show" role="alert">
            <strong>Error!</strong> Username Atau Password Salah !.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="CloseX();">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <script>
            function CloseX(){
              document.getElementById("alert-notif").style.display = "none";
            }
          </script>
        <?php
        }
        ?>
        </div>
      </div>
    </section>

  </main>
  <footer id="footer" class="footer">
    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">VINKA</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
      </div>
    </div>
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!-- Vendor JS Files -->
  <script src="<?= $url ?>/assets/ilanding/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- <script src="<?= $url ?>/assets/ilanding/vendor/php-email-form/validate.js"></script> -->
  <script src="<?= $url ?>/assets/ilanding/vendor/aos/aos.js"></script>
  <script src="<?= $url ?>/assets/ilanding/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?= $url ?>/assets/ilanding/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?= $url ?>/assets/ilanding/vendor/purecounter/purecounter_vanilla.js"></script>
  <!-- Main JS File -->
  <script src="<?= $url ?>/assets/ilanding/js/main.js"></script>
</body>
</html>