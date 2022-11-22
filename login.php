<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Historical Tour</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="includes/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="includes/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="includes/dist/css/adminlte.min.css">
</head>

<?php
include('config/database.php');

session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "SELECT * FROM empresa WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($db, $query);
    $data = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if (mysqli_num_rows($result) !== 0) {
        #Pasar variables por URL
        header("location: home.php?id_empresa=" . $data['id_empresa']);
    } else {
        $_SESSION['message'] = 'Usuario o contraseña incorrectos';
        $_SESSION['message_type'] = 'danger';
    }
}


?>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <p><b>Historical</b> Tour</p>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Inicie sesión</p>
                <form method="POST">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <?php if (isset($_SESSION['message'])) { ?>
                        <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                            <?= $_SESSION['message'] ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php session_unset();
                    } ?>
                    <div class="col-13">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Ingresar</button>
                    </div>
                </form>

                </br>
                <p class="mb-1">
                    Si no tienes una cuenta, <a href="register.php" class="text-center">registrate aquí</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="includes/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="includes/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="includes/dist/js/adminlte.min.js"></script>
</body>

</html>