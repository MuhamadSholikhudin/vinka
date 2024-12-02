      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
      	<!-- sidebar: style can be found in sidebar.less -->
      	<section class="sidebar">
      		<!-- Sidebar user panel -->
      		<div class="user-panel">
      			<div class="pull-left image">
      				<img src="<?= $url ?>/assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      			</div>
      			<div class="pull-left info">
      				<p><?= $_SESSION['username'] ?></p>
      				<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      			</div>
      		</div>
      		<?php /* ?>

			<!-- search form -->
			<form action="#" method="get" class="sidebar-form">
				<div class="input-group">
				<input type="text" name="q" class="form-control" placeholder="Search...">
				<span class="input-group-btn">
					<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
				</span>
				</div>
			</form>
			<!-- /.search form -->
			<?php */ ?>

      		<?php
				// Data sub menu pada menu 
				$dashboard = ["dashboard"];
				$access = ["user"];
				$data_menu = [
					'informasi_sekolah',
					'periode',
					'pendaftaran_siswa',
					// 'berkas_pendaftaran',
					'jenis_guru',
					'guru',
					'siswa',
					'kelas',
					'mapel',
					'plotting_jadwal',
					'kehadiran_siswa',
					'penilaian',
					'rapot',
				];

				$result = [
					"laporan_pengaduan",
					"laporan_pemasangan",
					"laporan_pencatatan_penggunaan"
				];
				// Data sub menu pada menu 

				// Hak Akses pada user menggunakan sub menu
				$level = [
					'Kepala Sekolah' => [
						'dashboard',
						'berkas_pendaftaran',
						'guru',
						'informasi_sekolah',
						'jenis_guru',
						'kehadiran_siswa',
						'kelas',
						'mapel',
						'pendaftaran_siswa',
						'periode',
						'plotting_jadwal',
						'siswa',
						'user'
					],
					'Orang Tua' => [
						'pendaftaran_siswa',
						'plotting_jadwal',
						'kehadiran_siswa',
						'penilaian',
						'raport',
					],
					'Seksi Kurrikulum' => [
						'periode',
						'jenis_guru',
						'guru',
						'siswa',
						'kelas',
						'mapel',
						'plotting_jadwal',
						'rapot'
					],
					'Guru' => [
						'kehadiran_siswa',
						'penilaian',
						'raport',						
					],
					'Seksi Tata Usaha' => [
						'user',
						'penilaian',
						'informasi_sekolah',
						'pendaftaran_siswa',
					],

				];
				// Hak Akses pada user menggunakan sub menu
				?>
      		<!-- sidebar menu: : style can be found in sidebar.less -->
      		<ul class="sidebar-menu">
      			<li class="header">MAIN NAVIGATION</li>
      			<li class="treeview <?php if (Menu_active($dashboard) == "show") {
											echo "active";
										} ?>">
      				<a href="#">
      					<i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
      				</a>
      				<ul class="treeview-menu <?php if (Menu_active($dashboard) == "show") {
													echo "menu-open style='display:block;'";
												} ?>">
      					<?php for ($sub = 0; $sub < count($dashboard); $sub++) {
								$check_role = array_search($dashboard[$sub], $level[$_SESSION['level']]);
								if ($check_role !== false) {            ?>
      							<li class="<?= Sub_menu_active($dashboard[$sub]) ?>"><a href="<?= $url ?>/app/<?= $dashboard[$sub] ?>/index.php" class="text-white"> <i class='fa fa-circle <?php if (Sub_menu_active($dashboard[$sub])  == "active") { ?>  text-aqua <?php } ?>'></i> <?= ucfirst(str_replace("_", " ", $dashboard[$sub])); ?></a></li>
      					<?php  }
							}   ?>
      				</ul>
      			</li>

      			<li class="treeview <?php if (Menu_active($access) == "show") {
											echo "active";
										} ?>">
      				<a href="#">
      					<i class="fa fa-user-md"></i> <span>Akses</span> <i class="fa fa-angle-left pull-right"></i>
      				</a>
      				<ul class="treeview-menu <?php if (Menu_active($access) == "show") {
													echo "menu-open style='display:block;'";
												} ?>">
      					<?php for ($sub = 0; $sub < count($access); $sub++) {
								$check_role = array_search($access[$sub], $level[$_SESSION['level']]);
								if ($check_role !== false) {            ?>
      							<li class="<?= Sub_menu_active($access[$sub]) ?>"><a href="<?= $url ?>/app/<?= $access[$sub] ?>/index.php" class="text-white"> <i class='fa fa-circle <?php if (Sub_menu_active($access[$sub])  == "active") { ?>  text-aqua <?php } ?>'></i> <?= ucfirst(str_replace("_", " ", $access[$sub])); ?></a></li>
      					<?php  }
							}   ?>
      				</ul>
      			</li>

      			<li class="treeview <?php if (Menu_active($data_menu) == "show") {
											echo "active";
										} ?>">
      				<a href="#">
      					<i class="fa fa-folder-open-o"></i> <span>Menu</span> <i class="fa fa-angle-left pull-right"></i>
      				</a>
      				<ul class="treeview-menu <?php if (Menu_active($data_menu) == "show") {
													echo "menu-open style='display:block;'";
												} ?>">
      					<?php for ($sub = 0; $sub < count($data_menu); $sub++) {
								$check_role = array_search($data_menu[$sub], $level[$_SESSION['level']]);
								if ($check_role !== false) {            ?>
      							<li class="<?= Sub_menu_active($data_menu[$sub]) ?>">
      								<a href="<?= $url ?>/app/<?= $data_menu[$sub] ?>/index.php" class="text-white">
      									<i class='fa fa-circle <?php if (Sub_menu_active($data_menu[$sub])  == "active") { ?>  text-aqua <?php } ?>'></i> <?= ucfirst(str_replace("_", " ", $data_menu[$sub])); ?>
      								</a>
      							</li>
      					<?php  }
							}   ?>
      				</ul>
      			</li>

      			<li class="treeview <?php if (Menu_active($result) == "show") {
											echo "active";
										} ?>">
      				<a href="#">
      					<i class="fa fa-files-o"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
      				</a>
      				<ul class="treeview-menu <?php if (Menu_active($result) == "show") {
													echo "menu-open style='display:block;'";
												} ?>">
      					<?php for ($sub = 0; $sub < count($result); $sub++) {
								$check_role = array_search($result[$sub], $level[$_SESSION['level']]);
								if ($check_role !== false) {            ?>
      							<li class="<?= Sub_menu_active($result[$sub]) ?>">
      								<a href="<?= $url ?>/app/<?= $result[$sub] ?>/index.php" class="text-white">
      									<i class='fa fa-circle <?php if (Sub_menu_active($result[$sub])  == "active") { ?>  text-aqua <?php } ?>'></i> <?= ucfirst(str_replace("_", " ", $result[$sub])); ?>
      								</a>
      							</li>
      					<?php  }
							}   ?>
      				</ul>
      			</li>
      			<?php /* ?>
				<li class="header">LABELS</li>
				<li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
				<li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
				<li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
				<?php */ ?>

      		</ul>
      	</section>
      	<!-- /.sidebar -->
      </aside>