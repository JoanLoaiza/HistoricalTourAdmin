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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $nit = $_POST['nit'];
    $email = $_POST['email'];
    $password = $_POST['pass1'];
    $password2 = $_POST['pass2'];
    if ($password === $password2) {
        $query = "INSERT INTO empresa (nit, nombre_empresa, email, password) VALUES ('$nit', '$name', '$email', '$password')";
        $result = mysqli_query($db, $query);
        if (!$result) {
            die("Query Failed.");
        }
        $_SESSION['message'] = 'Usuario creado satisfactoriamente';
        $_SESSION['message_type'] = 'success';
    } else {
        $_SESSION['message'] = 'Las contraseñas no coinciden';
        $_SESSION['message_type'] = 'danger';
        header("Location: register.php");
    }
}
?>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <p><b>Historical </b>Tour</p>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Registrate</p>

                <form action="" method="POST">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="name" placeholder="Nombre de la empresa" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" name="nit" placeholder="NIT" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-check"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="pass1" placeholder="Contraseña" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="pass2" placeholder="Repite tu contraseña" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <!--las contraseñas no coinciden-->
                    <?php if (isset($_SESSION['message'])) { ?>
                        <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                            <?= $_SESSION['message'] ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php session_unset();
                    } ?>

                    <div>
                        <button type="submit" class="btn btn-info btn-lg btn-block">Registrar</button>
                    </div>
                </form>
                </br>
                <p class="mb-0">
                    Si ya tienes una cuenta, <a href="login.php" class="text-center"> ingresa aquí.</a>
                </p>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>