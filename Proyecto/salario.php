<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard de salarios</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/dashboard.css">

</head>
<body>
  <header class="fixed-top">
    <div class="navbar navbar-dark bg-dark shadow-sm">
      <div class="container d-flex justify-content-between align-items-center">
      <a href="index.html" class="btn btn-outline-light d-flex align-items-center gap-2" aria-label="Volver"
              title="Volver a la página anterior">
              <span>Volver</span> </a>
        <a href="#" class="navbar-brand">Pagos</a>
        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">
            <img src="Assets/Images/profile.svg" style="width: 35px;" alt="perfil">
          </button>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="profile.php">Ver perfil</a>
            <a class="dropdown-item btn btn-danger" href="login.php">Cerrar sesión</a>
          </div>
        </div>
      </div>
    </div>
  </header>

  <div class="container-fluid mt-5 pt-3">
    <h2>Dashboard</h2>
    <canvas id="myChart" width="900" height="380"></canvas>
    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>#</th>
            <th>Cantidad</th>
            <th>Fecha</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include 'datosPhp/salarios.php';
          $contador = 1;
          foreach ($salarios as $salario) {
            echo "<tr>";
            echo "<td>" . $contador++ . "</td>";
            echo "<td>" . number_format($salario->cantidad, 2) . "</td>";
            echo "<td>" . $salario->fecha . "</td>";
            echo "</tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
  <script>
    var ctx = document.getElementById("myChart").getContext("2d");
    var myChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: [<?php foreach ($salarios as $salario) { echo "'" . $salario->fecha . "',"; } ?>],
        datasets: [{
          data: [<?php foreach ($salarios as $salario) { echo $salario->cantidad . ","; } ?>],
          lineTension: 0,
          backgroundColor: 'transparent',
          borderColor: '#007bff',
          borderWidth: 4,
          pointBackgroundColor: '#007bff'
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: false
            }
          }]
        },
        legend: {
          display: false,
        }
      }
    });
  </script>
</body>
</html>
