<?php
#Obtener variable de URL
$id_empresa = $_GET['id_empresa'];

#obtener los registros de la base de datos y guardarlos en un array
$query = "SELECT fecha_ingreso FROM turista WHERE id_empresa = $id_empresa";
$result = mysqli_query($db, $query);
$data = array(); // Array donde vamos a guardar los datos
while ($r = $result->fetch_object()) { // Recorrer los resultados de Ejecutar la consulta SQL
    $data[] = $r; // Guardar los resultados en la variable $data
}
?>

<div class="row">
    <div class="col-md-6">
        <!-- BAR CHART -->
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Turistas por mes</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="chart">
                    <canvas id="barChart" style="width:100%;" height="100"></canvas>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <div class="col-md-6">
        <!-- LINE CHART -->
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Line Chart</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="chart">
                    <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>


<!-- jQuery -->
<script src="includes/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="includes/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="includes/plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE App -->
<script src="includes/dist/js/adminlte.min.js"></script>
<!-- Page specific script -->
<script>
    var ctx = document.getElementById("barChart");
    var data = {
        labels: [
            <?php foreach ($data as $d) : ?> "<?php echo $d->date_at ?>",
            <?php endforeach; ?>
        ],
        datasets: [{
            label: '$ Ventas',
            data: [
                <?php foreach ($data as $d) : ?>
                    <?php echo $d->val; ?>,
                <?php endforeach; ?>
            ],
            backgroundColor: "#3898db",
            borderColor: "#9b59b6",
            borderWidth: 2
        }]
    };
    var options = {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    };
    var chart1 = new Chart(ctx, {
        type: 'bar',
        data: data,
        options: options
    });
</script>