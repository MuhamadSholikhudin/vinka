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

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="<?= $url ?>/" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="<?= $url ?>/assets/ilanding/img/logo.png" alt=""> -->
        <h1 class="sitename">MI AL HIDAYAH PATI</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#home" class="active">Home</a></li>
          <li><a href="#tentang">Tentang Kami</a></li>
          <li><a href="#pendaftaran">Pendaftaran</a></li>
          <li><a href="#informasi">Informasi</a></li>
          <!-- <li><a href="#contact">Kontak</a></li> -->
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
      <a class="btn-getstarted" href="<?= $url . "/aksi/login.php" ?>">LOGIN</a>
    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="home" class="hero section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row align-items-center">
          <div class="col-lg-6">
            <div class="hero-content" data-aos="fade-up" data-aos-delay="200">
              <div class="company-badge mb-4">
                <i class="bi bi-gear-fill me-2"></i>
                Raih Prestasi
              </div>

              <h1 class="mb-4">
                Dengan Sekolahan Unggul <br>
                Berkarakter <br>
                <span class="accent-text">MI AL HIDAYAH PATI</span>
              </h1>

              <p class="mb-4 mb-md-5">
                Jl. Taman Pahlawan, Puri, Kec. Pati, Kabupaten Pati, Jawa Tengah 59113.
              </p>

              <!-- <div class="hero-buttons">
                <a href="#about" class="btn btn-primary me-0 me-sm-2 mx-1">Get Started</a>
                <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="btn btn-link mt-2 mt-sm-0 glightbox">
                  <i class="bi bi-play-circle me-1"></i>
                  Play Video
                </a>
              </div> -->
            </div>
          </div>

          <div class="col-lg-6">
            <div class="hero-image" data-aos="zoom-out" data-aos-delay="300">
              <!-- <img src="<?= $url ?>/assets/ilanding/img/illustration-1.webp" alt="Hero Image" class="img-fluid"> -->
              <img src="<?= $url ?>/assets/ilanding/img/depan.jpg" alt="Hero Image" class="img-fluid rounded-4">

              <!-- <div class="customers-badge">
                <div class="customer-avatars">
                  <img src="<?= $url ?>/assets/ilanding/img/avatar-1.webp" alt="Customer 1" class="avatar">
                  <img src="<?= $url ?>/assets/ilanding/img/avatar-2.webp" alt="Customer 2" class="avatar">
                  <img src="<?= $url ?>/assets/ilanding/img/avatar-3.webp" alt="Customer 3" class="avatar">
                  <img src="<?= $url ?>/assets/ilanding/img/avatar-4.webp" alt="Customer 4" class="avatar">
                  <img src="<?= $url ?>/assets/ilanding/img/avatar-5.webp" alt="Customer 5" class="avatar">
                  <span class="avatar more">12+</span>
                </div>
                <p class="mb-0 mt-2">12,000+ lorem ipsum dolor sit amet consectetur adipiscing elit</p>
              </div> -->
            </div>
          </div>
        </div>

        <div class="row stats-row gy-4 mt-5" data-aos="fade-up" data-aos-delay="500">
          <div class="col-lg-3 col-md-6">
            <div class="stat-item">
              <div class="stat-icon">
                <i class="bi bi-trophy"></i>
              </div>
              <div class="stat-content">
                <h4>3x Won Awards</h4>
                <p class="mb-0">Vestibulum ante ipsum</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="stat-item">
              <div class="stat-icon">
                <i class="bi bi-briefcase"></i>
              </div>
              <div class="stat-content">
                <h4>6.5k Faucibus</h4>
                <p class="mb-0">Nullam quis ante</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="stat-item">
              <div class="stat-icon">
                <i class="bi bi-graph-up"></i>
              </div>
              <div class="stat-content">
                <h4>80k Mauris</h4>
                <p class="mb-0">Etiam sit amet orci</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="stat-item">
              <div class="stat-icon">
                <i class="bi bi-award"></i>
              </div>
              <div class="stat-content">
                <h4>6x Phasellus</h4>
                <p class="mb-0">Vestibulum ante ipsum</p>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="tentang" class="about section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4 align-items-center justify-content-between">

          <div class="col-xl-5" data-aos="fade-up" data-aos-delay="200">
            <span class="about-meta">TENTANG KAMI</span>
            <h2 class="about-title">MI ALHIDAYAH PATI</h2>
            <p class="about-description" style="text-align:justify;">
              MI Al Hidayah merupakan sekolah dasar islam swasta didirikan sebagai bagian dari naungan Yayasan Hidayatul Mubtadin Puri yang diketuai oleh H.A.Suhari,SE.MM. MI Al Hidayah Pati berdiri pada tahun 2015. Sekolah ini berlokasi di Jl. Taman Pahlawan Desa Puri RT 02 RW 06 Kecamatan Pati Kabupaten Pati. Tujuan berdirinya MI Al Hidayah adalah mewujudkan pembelajaran dan pembiasaan dalam mempelajari Al-Qur’an dan menjalankan agama islam. </p>
            <!-- 
            <div class="row feature-list-wrapper">
              <div class="col-md-6">
                <ul class="feature-list">
                  <li><i class="bi bi-check-circle-fill"></i> Lorem ipsum dolor sit amet</li>
                  <li><i class="bi bi-check-circle-fill"></i> Consectetur adipiscing elit</li>
                  <li><i class="bi bi-check-circle-fill"></i> Sed do eiusmod tempor</li>
                </ul>
              </div>
              <div class="col-md-6">
                <ul class="feature-list">
                  <li><i class="bi bi-check-circle-fill"></i> Incididunt ut labore et</li>
                  <li><i class="bi bi-check-circle-fill"></i> Dolore magna aliqua</li>
                  <li><i class="bi bi-check-circle-fill"></i> Ut enim ad minim veniam</li>
                </ul>
              </div>
            </div> 
            -->

            <div class="info-wrapper">
              <div class="row gy-4">
                <div class="col-lg-5">
                  <div class="profile d-flex align-items-center gap-3">
                    <img src="<?= $url ?>/assets/ilanding/img/avatar-1.webp" alt="CEO Profile" class="profile-image">
                    <div>
                      <h4 class="profile-name">Bapak Saihu</h4>
                      <p class="profile-position">Kepala Sekolah</p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-7">
                  <div class="contact-info d-flex align-items-center gap-2">
                    <i class="bi bi-telephone-fill"></i>
                    <div>
                      <p class="contact-label">No Telphone</p>
                      <p class="contact-number">089 876 546 876</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-6" data-aos="fade-up" data-aos-delay="300">
            <div class="image-wrapper">
              <div class="images position-relative" data-aos="zoom-out" data-aos-delay="400">
                <img src="<?= $url ?>/assets/ilanding/img/samping.jpg" alt="Business Meeting" class="img-fluid main-image rounded-4">
                <img src="<?= $url ?>/assets/ilanding/img/depan.jpg" alt="Team Discussion" class="img-fluid small-image rounded-4">
                <!-- <img src="<?= $url ?>/assets/ilanding/img/about-5.webp" alt="Business Meeting" class="img-fluid main-image rounded-4">
                <img src="<?= $url ?>/assets/ilanding/img/about-2.webp" alt="Team Discussion" class="img-fluid small-image rounded-4"> -->
              </div>
              <!-- <div class="experience-badge floating">
                <h3>15+ <span>Years</span></h3>
                <p>Of experience in business service</p>
              </div> -->
            </div>
          </div>
        </div>

      </div>

    </section><!-- /About Section -->


    <!-- Contact Section -->
    <section id="pendaftaran" class="contact section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Pendaftaran</h2>
        <p>Silahkan Daftarkan anak anda untuk bergabung dengan sekolah yang berkarakter dan berbudi luhur MI AL-HIDAYAH PATI.</p>
      </div>
      <!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row g-4 g-lg-5">
          <div class="col-lg-5">
            <div class="info-box" data-aos="fade-up" data-aos-delay="200">
              <h3>Info Kontak</h3>
              <p>Untuk info lebih detail mengenai MI AL-HIDAYAH anda dapat menghubungi kontak di bawah ini.</p>
              <div class="info-item" data-aos="fade-up" data-aos-delay="300">
                <div class="icon-box">
                  <i class="bi bi-geo-alt"></i>
                </div>
                <div class="content">
                  <h4>Our Location</h4>
                  <p>Jl. Taman Pahlawan Desa Puri RT 02 RW 06 </p>
                  <p>Kecamatan Pati Kabupaten Pati </p>
                </div>
              </div>
              <div class="info-item" data-aos="fade-up" data-aos-delay="400">
                <div class="icon-box">
                  <i class="bi bi-telephone"></i>
                </div>
                <div class="content">
                  <h4>Phone Number</h4>
                  <p>+1 5589 55488 55</p>
                  <p>+1 6678 254445 41</p>
                </div>
              </div>

              <div class="info-item" data-aos="fade-up" data-aos-delay="500">
                <div class="icon-box">
                  <i class="bi bi-envelope"></i>
                </div>
                <div class="content">
                  <h4>Email Address</h4>
                  <p>info@example.com</p>
                  <p>contact@example.com</p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-7">
            <div class="contact-form" data-aos="fade-up" data-aos-delay="300">
              <h3 class="text-center">Form Pendaftaran</h3>
              <p class="text-center">Silahkan isi From pendaftaran ini sesuai dengan data pribadi dengan benar.</p>
              <form action="<?= $url . "/aksi/registrasi.php" ?>" method="POST" enctype="multipart/form-data" class="php-email-form">
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
                  <div class="col-md-6">
                    <input type="text" name="username" class="form-control" <?php if (isset($_SESSION['message'])) {
                                                                              if ($_SESSION['message_code'] != 200) {
                                                                                echo 'value="' . $_SESSION['data'][0] . '"';
                                                                              }
                                                                            } ?> placeholder="Username" required>
                  </div>
                  <div class="col-6">
                    <input type="text" class="form-control" name="nm_pengguna" <?php if (isset($_SESSION['message'])) {
                                                                                  if ($_SESSION['message_code'] != 200) {
                                                                                    echo 'value="' . $_SESSION['data'][1] . '"';
                                                                                  }
                                                                                } ?> placeholder="Nama pengguna" required>
                  </div>
                  <div class="col-md-6 ">
                    <input type="password" class="form-control" name="password1" placeholder="Password" required>
                  </div>
                  <div class="col-md-6 ">
                    <input type="password" class="form-control" name="password2" placeholder="Konfirmasi password Anda" required>
                  </div>
                  <div class="col-12 text-center">
                    <!-- <div class="loading show">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your message has been sent. Thank you!</div> -->
                    <button type="submit" class="btn" name="daftaruser" value="daftaruser"><i class="bi bi-save"></i> DAFTAR</button>
                  </div>
                </div>
              </form>
              <?php if (isset($_SESSION['message'])) {
                unset($_SESSION['message']);
                unset($_SESSION['message_code']);
              } ?>

            </div>
          </div>

        </div>

      </div>

    </section>
    <!-- /Contact Section -->

    <!-- Services Section -->
    <section id="informasi" class="services section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Informasi</h2>
        <p>Telusuri Informasi update terki MI AL HIDAYAH PATI</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-4">
          <?php 
            $query_informasi = 'SELECT * FROM informasi_sekolah ORDER BY id_informasi DESC LIMIT 4';
            foreach(QueryManyData($query_informasi) as $row){
          ?>
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-card d-flex">
                  <div class="icon flex-shrink-0">
                    <!-- <i class="bi bi-activity"></i> -->
                    <img src="<?= $url.'/foto/gambar_informasi/'.$row['gambar_informasi']; ?>" alt="" srcset="" style="width: 50px; height:50px;">
                  </div>
                  <div>
                    <h3><?= $row['judul_informasi'] ?></h3>
                    <p><?= $row['ket_informasi'] ?>.</p>
                    <a href="<?= $url ?>/app/informasi/detail.php?id_informasi=<?= $row['id_informasi'] ?>" class="read-more">Read More <i class="bi bi-arrow-right"></i></a>
                  </div>
                </div>
              </div><!-- End Service Card -->
          <?php
            } 
          ?>

        </div>

      </div>

    </section><!-- /Services Section -->


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