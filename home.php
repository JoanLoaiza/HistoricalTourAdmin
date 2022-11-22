<?php
include 'includes/head.php';
include 'config/database.php';

#Obtener variable de URL
$id_empresa = $_GET['id_empresa'];

#Traer los datos de la base de datos
$query = "SELECT fecha_ingreso, fecha_salida FROM turista WHERE id_empresa = $id_empresa";
$result = mysqli_query($db, $query);
$count = mysqli_num_rows($result);

#Calcular la diferencia entre dos fechas
$diferencia = [];
foreach ($result as $row) {
  $fecha_ingreso = $row['fecha_ingreso'];
  $fecha_salida = $row['fecha_salida'];
  $diferencia[] = (strtotime($fecha_salida) - strtotime($fecha_ingreso)) / 86400;
}

#Calcular el promedio de los días
$promedio = array_sum($diferencia) / count($diferencia);

?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  </br>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-6 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?php echo $promedio; ?> días</h3>
              <p>Tiempo promedio de estadia</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?php echo $count; ?></h3>

              <p>Usuarios registrados</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Turistas por mes</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Mes</th>
                    <th>Cantidad</th>
                    <th style="width: 40px">Porcentaje</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $meses = [
                    'Enero',
                    'Febrero',
                    'Marzo',
                    'Abril',
                    'Mayo',
                    'Junio',
                    'Julio',
                    'Agosto',
                    'Septiembre',
                    'Octubre',
                    'Noviembre',
                    'Diciembre'
                  ];

                  #Traer los datos de la base de datos
                  $query = "SELECT MONTH(fecha_ingreso) AS mes, COUNT(*) AS cantidad FROM turista WHERE id_empresa = $id_empresa GROUP BY MONTH(fecha_ingreso)";
                  $result = mysqli_query($db, $query);
                  $count = mysqli_num_rows($result);
                  $i = 1;
                  foreach ($result as $row) {
                    $mes = $row['mes'];
                    $cantidad = $row['cantidad'];
                    $porcentaje = ($cantidad * 100) / $count;
                  ?>

                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $meses[$mes - 1];?></td>
                      <td><?php echo $cantidad; ?></td>
                      <td><span class="badge bg-danger"><?php echo $porcentaje; ?>%</span></td>
                    </tr>
                  <?php

                    $i++;
                  }
                  ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
              <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
              </ul>
            </div>
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include 'includes/footer.php'; ?>