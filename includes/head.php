<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Historical Tour</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="includes/plugins/fontawesome-free/css/all.min.css" />
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="includes/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css" />
  <!-- iCheck -->
  <link rel="stylesheet" href="includes/plugins/icheck-bootstrap/icheck-bootstrap.min.css" />
  <!-- JQVMap -->
  <link rel="stylesheet" href="includes/plugins/jqvmap/jqvmap.min.css" />
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css" />
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="includes/plugins/overlayScrollbars/css/OverlayScrollbars.min.css" />
  <!-- Daterange picker -->
  <link rel="stylesheet" href="includes/plugins/daterangepicker/daterangepicker.css" />
  <!-- summernote -->
  <link rel="stylesheet" href="includes/plugins/summernote/summernote-bs4.min.css" />

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="includes/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="includes/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="includes/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="includes/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="includes/dist/css/adminlte.min.css">


</head>
<?php
#Obtener variable por URL
$id_empresa = $_GET['id_empresa'];

?>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item dropdown">
        </li>
      </ul>


    </nav>
    <!-- /.navbar -->



    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="info">
            <h2 class="d-block  text-white">Historical Tour</h2>
          </div>
        </div>
        <div class="info">
            <a href="#" class="d-block">Bienvenido al sistema . . .</a>
          </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
            <li class="nav-item">
              <!-- Direcciónar al home-->
              <a href="home.php?id_empresa=<?php echo $id_empresa; ?>" class="nav-link">
                <i class="nav-icon fa fa-home"></i>
                <p>Home</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-plus-square"></i>
                <p>
                  Turistas
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="turista.php?id_empresa=<?php echo $id_empresa; ?>" class="nav-link">
                    <i class="far fa-user nav-icon"></i>
                    <p>Nuevo turista</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="lista_turistas.php?id_empresa=<?php echo $id_empresa; ?>" class="nav-link">
                    <i class="far fa-user nav-icon"></i>
                    <p>Lista de turistas</p>
                  </a>
                </li>
              </ul>
            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>