<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Monitoring Akademik Siswa</title>
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@2.4.18/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@2.4.18/dist/css/skins/skin-blue.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Custom Style -->
    <style>
        .login-logo img {
            max-width: 120px;
        }
        .login-page {
            background: #f7f7f7;
        }
        .login-box-body {
            border-radius: 8px;
        }
    </style>
</head>
<body class="login-page">
    <div class="login-box">
        <div class="login-logo">
            <img src="https://via.placeholder.com/120" alt="Logo">
            <h3><b>Sistem Monitoring Akademik Siswa</b></h3>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Masuk untuk melanjutkan</p>

            <form action="login_process.php" method="post">
                <div class="form-group has-feedback">
                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                    <span class="fa fa-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                    <span class="fa fa-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox"> Ingat Saya
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <a href="#">Lupa password?</a><br>
            <a href="register.html" class="text-center">Daftar akun baru</a>
        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- AdminLTE JS -->
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@2.4.18/dist/js/adminlte.min.js"></script>
</body>
</html>
