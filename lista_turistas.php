<?php
include('includes/head.php');
include('config/database.php');

#Obtener variable de URL
$id_empresa = $_GET['id_empresa'];

#Traer los datos de la base de datos
$query = "SELECT * FROM turista WHERE id_empresa = $id_empresa";
$result = mysqli_query($db, $query);


?>
<div class="wrapper">

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        </br>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Lista de turistas</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nombre</th>
                                            <th>Identificación</th>
                                            <th>Proveniencia</th>
                                            <th>Email</th>
                                            <th>Fechas</th>
                                            <th>Transporte</th>
                                            <th>Equipo</th>
                                            <th>Tipo viaje</th>
                                            <th>Residencia</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = mysqli_fetch_array($result)) { ?>
                                            <tr>
                                                <td><?php echo $row['id_turista'] ?></td>
                                                <td><?php echo $row['nombrecompleto'] ?></td>
                                                <td><?php echo $row['identificacion'] ?></td>
                                                <td><?php echo $row['proveniencia'] ?></td>
                                                <td><?php echo $row['email'] ?></td>
                                                <td><?php echo $row['fecha_ingreso'] . '//' . $row['fecha_ingreso']  ?></td>
                                                <td><?php echo $row['medio_transporte'] ?></td>
                                                <td><?php echo $row['equipamento'] ?></td>
                                                <td><?php echo $row['tipo_viaje'] ?></td>
                                                <td><?php echo $row['lugar_residencia'] ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="includes/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="includes/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="includes/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="includes/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="includes/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="includes/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="includes/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="includes/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="includes/plugins/jszip/jszip.min.js"></script>
<script src="includes/plugins/pdfmake/pdfmake.min.js"></script>
<script src="includes/plugins/pdfmake/vfs_fonts.js"></script>
<script src="includes/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="includes/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="includes/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="includes/dist/js/adminlte.min.js"></script>
<!-- Page specific script -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>

</body>

</html>