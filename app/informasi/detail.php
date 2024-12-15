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
                    <li><a href="<?= $url ?>/app/home/index.php" class="active">Home</a></li>
                    <li><a href="<?= $url ?>/app/home/index.php#tentang">Tentang Kami</a></li>
                    <li><a href="<?= $url ?>/app/home/index.php#pendaftaran">Pendaftaran</a></li>
                    <li><a href="<?= $url ?>/app/home/index.php#informasi">Informasi</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
            <a class="btn-getstarted" href="<?= $url . "/aksi/login.php" ?>">LOGIN</a>
        </div>
    </header>

    <main class="main">

        <!-- Hero Section -->
        <section id="home" class="hero section">
        <?php 
        if(isset($_GET['id_informasi'])){
            $query_informasi = 'SELECT * FROM informasi_sekolah WHERE id_informasi = '.$_GET['id_informasi'].''; 
            $informasi =QueryOnedata($query_informasi)->fetch_assoc();
        ?>
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-12 ps-lg-5 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                    <img src="<?= $url ?>/foto/gambar_informasi/<?= $informasi['gambar_informasi'] ?>" alt="" class="img-fluid services-img">
                    <h3><?= $informasi['judul_informasi'] ?></h3>
                    <p>
                    <?= $informasi['ket_informasi'] ?>
                                    </p>
                    <ul>
                        <li><i class="bi bi-check-circle"></i> <span><?= $informasi['tgl_post_informasi'] ?>.</span></li>
                    </ul>
                    
                </div>

            </div>
        <?php 
        }
        ?>
        </section><!-- /Hero Section -->



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
                    foreach (QueryManyData($query_informasi) as $row) {
                    ?>
                        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="service-card d-flex">
                                <div class="icon flex-shrink-0">
                                    <!-- <i class="bi bi-activity"></i> -->
                                    <img src="<?= $url . '/foto/gambar_informasi/' . $row['gambar_informasi']; ?>" alt="" srcset="" style="width: 50px; height:50px;">
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