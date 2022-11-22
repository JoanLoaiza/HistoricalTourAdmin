<?php include 'includes/head.php'; ?>
<!-- Main content -->
<div class="content-wrapper">
    </br>
    <?php
    include('config/database.php');
    #Obtener variable de URL
    $id_empresa = $_GET['id_empresa'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST['nombre'];
        $tipo = $_POST['tipo'];
        $id = $_POST['id'];
        $proveniencia = $_POST['proveniencia'];
        $email = $_POST['email'];
        $transporte = $_POST['transporte'];
        $direccion = $_POST['direccion'];
        $equipaje = $_POST['equipaje'];
        $viaje = $_POST['viaje'];
        $fecha_ingreso = strtotime($_POST['desde']);
        $fecha_salida = strtotime($_POST['hasta']);
        $fecha_ingreso = date('Y-m-d', $fecha_ingreso);
        $fecha_salida = date('Y-m-d', $fecha_salida);

        #Validar que el turista no exista
        $query = "SELECT * FROM turista WHERE identificacion = '$id'";
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) === 0) {
            $query = "INSERT INTO turista(nombrecompleto, tipo_documento, identificacion, proveniencia, email, fecha_ingreso, fecha_salida, medio_transporte, equipamento, tipo_viaje, lugar_residencia, id_empresa) VALUES ('$nombre', '$tipo', '$id', '$proveniencia', '$email', '$fecha_ingreso', '$fecha_salida', '$transporte', '$equipaje', '$viaje', '$direccion', '$id_empresa')";
            $result = mysqli_query($db, $query);
            if ($result) {
                $_SESSION['message'] = 'El turista se ha registrado correctamente';
                $_SESSION['message_type'] = 'success';
            } else {
                $_SESSION['message'] = 'El turista no se ha registrado correctamente';
                $_SESSION['message_type'] = 'danger';
            }
        } else {
            $_SESSION['message'] = 'El turista ya existe';
            $_SESSION['message_type'] = 'danger';
        }
    }
    ?>

    <section class="content">
        <div class="col-md-12">
            <!--Mensaje de salida-->
            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
            } ?>
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Datos del turista</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nombre completo</label>
                                <input type="text" class="form-control" name="nombre" placeholder="Nombre completo">
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>Tipo</label>
                                        <input class="form-control" name="tipo" placeholder="Cédula o Pasaporte">
                                    </div>
                                    <div class="col-md-9">
                                        <label>Identificación</label>
                                        <input type="number" class="form-control" name="id" placeholder="Identificación" min="6" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Lugar de proveniencia</label>
                                <input type="text" class="form-control" name="proveniencia" placeholder="Lugar de proveniencia" required>

                            </div>
                            <div class="form-group">
                                <label>Correo electronico</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <input type="email" class="form-control" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Desde</label>
                                        <?php $fcha = date("Y-m-d"); ?>
                                        <input type="date" name="desde" class="form-control" value="<?php echo $fcha; ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Hasta</label>
                                        <input type="date" class="form-control" name="hasta" placeholder="Mochila o Maleta" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Dirección de residencia de estadia</label>
                                <input type="text" class="form-control" name="direccion" placeholder="Dirección de residencia de estadia" required>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Medio de transporte</label>
                                        <input class="form-control" name="transporte" placeholder="Bus, Metro, Automovil, Motocicleta" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Tipo de equipaje</label>
                                        <input class="form-control" name="equipaje" placeholder="Mochila o Maleta" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Tipo de viaje</label>
                                        <input class="form-control" name="viaje" placeholder="Grupo o Individual" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Registrar turista</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    </br>
</div>

<!-- jQuery -->
<script src="includes/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="includes/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="includes/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="includes/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="includes/plugins/moment/moment.min.js"></script>
<script src="includes/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="includes/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="includes/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="includes/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="includes/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="includes/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="includes/plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="includes/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script>
    $(function() {
        //Date picker
        $('#reservationdate').datetimepicker({
            format: 'L'
        });

        //Date and time picker
        $('#reservationdatetime').datetimepicker({
            icons: {
                time: 'far fa-clock'
            }
        });

        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM/DD/YYYY hh:mm A'
            }
        })
        //Date range as a button
        $('#daterange-btn').daterangepicker({
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate: moment()
            },
            function(start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
        )

        //Timepicker
        $('#timepicker').datetimepicker({
            format: 'LT'
        })

        //Bootstrap Duallistbox
        $('.duallistbox').bootstrapDualListbox()

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        $('.my-colorpicker2').on('colorpickerChange', function(event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        })

        $("input[data-bootstrap-switch]").each(function() {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })

    })
</script>

<?php include 'includes/footer.php'; ?>