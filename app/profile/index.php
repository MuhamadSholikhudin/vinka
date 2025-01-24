<?php include_once '../template/header.php'; ?>
<?php include_once '../template/navbar.php'; ?>
<?php include_once '../template/sidebar.php'; ?>
<div class='content-wrapper'>
    <section class='content-header'>
        <h1>Profile page</h1>
        <ol class='breadcrumb'>
            <li><a href='#'><i class='fa fa-dashboard'></i> Edit</a></li>
            <li class='active'>Profile page</li>
        </ol>
    </section>
    <section class='content'>
        <?php if (isset($_SESSION['message'])) {
            if ($_SESSION['message_code'] == 200) {
        ?>
                <div class='alert alert-info alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                    <h4>
                        <i class='icon fa fa-check-circle'></i> Success!
                    </h4>
                    <?= $_SESSION['message'] ?>
                </div>
            <?php
            } else {
            ?>
                <div class='alert alert-danger alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                    <h4><i class='icon fa fa-ban'></i> Error!</h4>
                    <?= $_SESSION['message'] ?>
                </div>
        <?php
            }
            unset($_SESSION['message']);
            unset($_SESSION['message_code']);
        } ?>
        <div class='row'>
            <div class='col-xs-12'>
                <div class="row">
                    <div class="col-lg-4">
                        <?php
                        $user = QueryOnedata("SELECT * FROM user WHERE id_user = " . $_SESSION['id_user'] . "")->fetch_assoc();
                        ?>
                        <div class="box box-primary">
                            <div class="box-body box-profile">
                                <img class="profile-user-img img-responsive img-circle" src="<?= $url ?>/assets/dist/img/avatar.png" alt="User profile picture">

                                <h3 class="profile-username text-center"><?= $user['nm_pengguna'] ?></h3>
                                <p class="text-muted text-center"><?= $user['level'] ?></p>
                                <ul class="list-group list-group-unbordered">
                                    <li class="list-group-item">
                                        <b>username</b> <a class="pull-right"><?= $user['username'] ?></a>
                                    </li>
                                </ul>
                                <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="box box-primary">
                                <div class='box-header with-border text-center'>
                                    <h3 class='box-title'>Form Edit Profile</h3>
                                </div>
                            <form action='<?= $url ?>/aksi/profile.php' method='post' enctype='multipart/form-data' class='form-horizontal'>
                                <div class='box-body'>
                                    <div class='form-group' style='display:none;'>
                                        <label for='inputid_user' class='col-sm-2 col-form-label'>Id_User</label>
                                        <div class='col-sm-10'>
                                            <input type='number' class='form-control' id='inputid_user' name='id_user' value='<?= $user['id_user']; ?>' required>
                                        </div>
                                    </div>
                                    <div class='form-group'>
                                        <label for='inputusername' class='col-sm-2 col-form-label'>Username</label>
                                        <div class='col-sm-10'>
                                            <input type='text' class='form-control' id='inputusername' name='username' value='<?= $user['username']; ?>' required>
                                        </div>
                                    </div>
                                    <div class='form-group'>
                                        <label for='inputpassword' class='col-sm-2 col-form-label'>Password</label>
                                        <div class='col-sm-10'>
                                            <input type='password' class='form-control' id='inputpassword' name='password' value='<?= $user['password']; ?>' required>
                                        </div>
                                    </div>
                                    <div class='form-group'>
                                        <label for='inputnm_pengguna' class='col-sm-2 col-form-label'>Nama Pengguna</label>
                                        <div class='col-sm-10'>
                                            <input type='text' class='form-control' id='inputnm_pengguna' name='nm_pengguna' value='<?= $user['nm_pengguna']; ?>' required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputlevel" class="col-sm-2 col-form-label">Level</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="level" id="inputlevel">
                                                <?php
                                                $level = ['Kepala Sekolah', 'Seksi Tata Usaha', 'Seksi Kurikulum', 'Guru', 'Orang Tua'];
                                                if ($_SESSION['level'] == 'Orang Tua') {
                                                    $level = ['Orang Tua'];
                                                }
                                                foreach ($level    as $val) {
                                                    if ($val == $user['level']) { ?>
                                                        <option value='<?= $val ?>' selected><?= $val ?></option>
                                                    <?php } else { ?>
                                                        <option value="<?= $val ?>"><?= $val ?></option>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class='box-footer'>
                                    <button type='submit' name='updateprofile' value='updateprofile' class='btn btn-info pull-right'>
                                        <i class='fa fa-save'></i> UPDATE
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- </div> -->
            </div>
        </div>
</div>
<?php include_once '../template/footer.php'; ?>