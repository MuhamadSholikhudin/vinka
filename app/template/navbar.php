<header class="main-header">
  <!-- Logo -->
  <a href="<?= $url ?>/app/dashboard/index.php" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>A</b>L</span>
    <!-- logo for regular state and mobile devices -->          
    <span class="logo-lg" style="height: 140px;">SI AKADEMIK</span> 
    <!-- <span class="logo-lg">
      <img src="<?= $url ?>/assets/dist/img/logo-alhidayah.png" alt="" style="width:100px;">
      <br>
      SI AKADEMIK
      MI AL-HIDAYAH
    </span> -->
   </a>

  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top" role="navigation">
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">&nbsp;&nbsp;&nbsp;&nbsp; </a>
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li class="dropdown notifications-menu">
          <!-- 
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope"></i>
              <span class="label label-warning">10</span>
            </a> 
          -->
          <ul class="dropdown-menu">
            <li class="header">You have 10 notifications</li>
            <li>
              <ul class="menu">
                <li>
                  <a href="#">
                    <i class="fa fa-users text-aqua"></i> 5 new members joined today
                  </a>
                </li>
              </ul>
            </li>
            <li class="footer"><a href="#">View all</a></li>
          </ul>
        </li>
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?= $url ?>/assets/dist/img/avatar.png" class="user-image" alt="User Image">
            <span class="hidden-xs"><?= $_SESSION['username'] ?> - 
            <?php 
					if($_SESSION['level'] == 'Guru'){
						$guru = QueryOnedata("SELECT * FROM guru WHERE id_user = ".$_SESSION['id_user']."")->fetch_assoc();
						if(QueryOnedata("SELECT * FROM kelas WHERE id_guru = ".$guru['id_guru']."")->num_rows > 0){
						?>
						<small style="color:white;">Wali Kelas <?= QueryOnedata("SELECT * FROM kelas WHERE id_guru = ".$guru['id_guru']."")->fetch_assoc()['nm_kelas'] ?></small>
						<?php
						}                     
					}
				?>
          </span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="<?= $url ?>/assets/dist/img/avatar.png" class="img-circle" alt="User Image">
              <p>
                <?= $_SESSION['username'] ?> - <?= $_SESSION['level'] ?>
                <?php 
                  if($_SESSION['level'] == 'Guru'){
                    $guru = QueryOnedata("SELECT * FROM guru WHERE id_user = ".$_SESSION['id_user']."")->fetch_assoc();
                    if(QueryOnedata("SELECT * FROM kelas WHERE id_guru = ".$guru['id_guru']."")->num_rows > 0){
                      ?>
                      <small>Wali Kelas <?= QueryOnedata("SELECT * FROM kelas WHERE id_guru = ".$guru['id_guru']."")->fetch_assoc()['nm_kelas'] ?></small>
                      <?php
                    }                     
                  }
                ?>
              </p>
            </li>
            <li class="user-footer">
              <div class="pull-left">
                <a href="<?= $url ?>/app/profile/index.php" class="btn btn-default btn-flat">Profile</a>
              </div>
              <div class="pull-right">
                <a href="<?= $url ?>/aksi/logout.php" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
        <!-- Control Sidebar Toggle Button -->
        <!--
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> 
          -->
      </ul>
    </div>
  </nav>
</header>