      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
      	<!-- sidebar: style can be found in sidebar.less -->
      	<section class="sidebar">
      		<!-- Sidebar user panel -->
      		<div class="user-panel" style="text-align: center;">
				<img src="<?= $url ?>/assets/dist/img/logo-alhidayah.png" class="img" width="60%" alt="User Image"> 
				<p style="color: white;">
					MI AL-HIDAYAH
				</p>
			</div>
      		<?php
				// Data sub menu pada menu 
				$dashboard = ["dashboard"];
				$access = ["user"];
				$data_menu = [
					'informasi_sekolah',
					'periode',
					'pendaftaran_siswa',
					'validasi_siswa_baru',
					'jenis_guru',
					'guru',
					'siswa',
					'kelas',
					'mapel',
					'plotting_jadwal',
					'kehadiran_siswa',
					'penilaian',
					'raport',
					'kelulusan',
				];

				$result = [
					"laporan_pendaftaran_siswa",
					"laporan_kehadiran_siswa",
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
						'user',
						'kelulusan',
						"laporan_pendaftaran_siswa",
						"laporan_kehadiran_siswa",
					],
					'Orang Tua' => [
						'dashboard',
						'pendaftaran_siswa',
						'validasi_siswa_baru',	
						'plotting_jadwal',
						'kehadiran_siswa',
						'penilaian',
						'raport',
					],
					'Seksi Kurikulum' => [
						'dashboard',
						'periode',
						'jenis_guru',
						'guru',
						'siswa',
						'kelas',
						'mapel',
						'plotting_jadwal',
						'raport'
					],
					'Guru' => [
						'dashboard',
						'kehadiran_siswa',
						'penilaian',
						'raport',
					],					
					'Seksi Tata Usaha' => [
						'dashboard',
						'user',
						'informasi_sekolah',
						'pendaftaran_siswa',
						'validasi_siswa_baru',
					],
				];
				// Hak Akses pada user menggunakan sub menu
				?>
      		<!-- sidebar menu: : style can be found in sidebar.less -->
      		<ul class="sidebar-menu">
      			<li class="header">MAIN NAVIGATION</li>      			
				<li class="treeview <?php if (Menu_active($dashboard) == "show") { echo "active";} ?>">
      				<a href="#">
      					<i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
      				</a>
      				<ul class="treeview-menu <?php if (Menu_active($dashboard) == "show") { echo "menu-open style='display:block;'"; } ?>">
      					<?php for ($sub = 0; $sub < count($dashboard); $sub++) {
								$check_role = array_search($dashboard[$sub], $level[$_SESSION['level']]);
								if ($check_role !== false) {            ?>
      							<li class="<?= Sub_menu_active($dashboard[$sub]) ?>"><a href="<?= $url ?>/app/<?= $dashboard[$sub] ?>/index.php" class="text-white"> <i class='fa fa-circle <?php if (Sub_menu_active($dashboard[$sub])  == "active") { ?>  text-aqua <?php } ?>'></i> <?= ucfirst(str_replace("_", " ", $dashboard[$sub])); ?></a></li>
      					<?php  }
							}   
						?>
      				</ul>
      			</li>

				<?php if($_SESSION['level'] == "Kepala Sekolah" || $_SESSION['level'] == 'Seksi Tata Usaha'){ ?>
      			<li class="treeview <?php if (Menu_active($access) == "show") { echo "active"; } ?>">
      				<a href="#">
      					<i class="fa fa-user-md"></i> <span>Akses</span> <i class="fa fa-angle-left pull-right"></i>
      				</a>
      				<ul class="treeview-menu <?php if (Menu_active($access) == "show") { echo "menu-open style='display:block;'"; } ?>">
      					<?php for ($sub = 0; $sub < count($access); $sub++) {
								$check_role = array_search($access[$sub], $level[$_SESSION['level']]);
								if ($check_role !== false) {            ?>
      							<li class="<?= Sub_menu_active($access[$sub]) ?>"><a href="<?= $url ?>/app/<?= $access[$sub] ?>/index.php" class="text-white"> <i class='fa fa-circle <?php if (Sub_menu_active($access[$sub])  == "active") { ?>  text-aqua <?php } ?>'></i> <?= ucfirst(str_replace("_", " ", $access[$sub])); ?></a></li>
      					<?php  }
							}   
						?>
      				</ul>
      			</li>
				<?php } ?>

      			<li class="treeview <?php if (Menu_active($data_menu) == "show") { echo "active"; } ?>">
      				<a href="#">
      					<i class="fa fa-folder-open-o"></i> <span>Menu</span> <i class="fa fa-angle-left pull-right"></i>
      				</a>
      				<ul class="treeview-menu <?php if (Menu_active($data_menu) == "show") { echo "menu-open style='display:block;'"; } ?>">
      					<?php for ($sub = 0; $sub < count($data_menu); $sub++) {
								$check_role = array_search($data_menu[$sub], $level[$_SESSION['level']]);
								if ($check_role !== false) {            ?>
      							<li class="<?= Sub_menu_active($data_menu[$sub]) ?>">
      								<a href="<?= $url ?>/app/<?= $data_menu[$sub] ?>/index.php" class="text-white">
      									<i class='fa fa-circle <?php if (Sub_menu_active($data_menu[$sub])  == "active") { ?>  text-aqua <?php } ?>'></i> <?= ucfirst(str_replace("_", " ", $data_menu[$sub])); ?>
      								</a>
      							</li>
      					<?php  }
							}   
						?>
      				</ul>
      			</li>
				
				<?php if($_SESSION['level'] == "Kepala Sekolah"){ ?>
      			<li class="treeview <?php if (Sub_menu_active("laporan") == "active") { echo "active"; } ?>">
      				<a href="#">
      					<i class="fa fa-files-o"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
      				</a>
      				<ul class="treeview-menu <?php if (Sub_menu_active("laporan") == "active") { echo "menu-open style='display:block;'"; } ?>">
      					<?php for ($sub = 0; $sub < count($result); $sub++) {
								$check_role = array_search($result[$sub], $level[$_SESSION['level']]);
								if ($check_role !== false) {            ?>
      							<li class="<?= Sub_menu_active($result[$sub]) ?>">
      								<a href="<?= $url ?>/app/laporan/<?= $result[$sub] ?>.php" class="text-white">
      									<i class='fa fa-circle <?php if (Sub_menu_active($result[$sub])  == "active") { ?>  text-aqua <?php } ?>'></i> <?= ucfirst(str_replace("_", " ", $result[$sub])); ?>
      								</a>
      							</li>
      					<?php  }
							}   
						?>
      				</ul>
      			</li>
				<?php } ?>
      		</ul>
      	</section>
      	<!-- /.sidebar -->
      </aside>