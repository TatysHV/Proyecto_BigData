
<?php
  include 'php/conexion.php';

 ?>
  <!DOCTYPE html lang="ES">
  <html>
    <head>
      <meta charset="utf-8"/>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>
      <script src="js/jquery-3.1.1.js"></script>
      <script src="materialize/js/materialize.js"></script>
      <script src="js/down_values.js"></script>
      <link type="text/css" rel="stylesheet" href="styles.css">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

  <body>
  <div class="row">
    <nav class="cyan darken-3">
    <div class="nav-wrapper">
      <a href="#" class="brand-logo right">°ITM°</a>
      <ul id="nav-mobile" class="left hide-on-med-and-down">
        <li><a href="genero.php">Género-Actores</a></li>
        <li><a href="actores.php">Actores</a></li>
        <li><a href="count_actores.php">GR-Actores</a></li>
        <li><a href="clientes-films.php">Cliente-film</a></li>
        <li><a href="graficas.php">Gráficas</a></li>
        <li><a href="rentas.php">Rentas</a></li>
      </ul>
    </div>
  </nav>

<form class="col s12">
      <center>
        <h4>Búsqueda de películas por género</h4>
        <br><br>
        <div style="width: 80%">
          <div class="col s5">
                <div class="input-field col s12">
                  <div class="col s12" style="text-align: left">Selecciona mes</div>
                  <select id="select-month"style="display: inline-block; height:40px;">
                    <option value="" disabled selected>Mes</option>
                    <option value="01">Enero</option>
                    <option value="02">Febrero</option>
                    <option value="03">Marzo</option>
                    <option value="04">Abril</option>
                    <option value="05">Mayo</option>
                    <option value="06">Junio</option>
                    <option value="07">Julio</option>
                    <option value="08">Agosto</option>
                    <option value="09">Septiembre</option>
                    <option value="10">Octubre</option>
                    <option value="11">Noviembre</option>
                    <option value="12">Diciembre</option>
                  </select>
                </div>
          </div>
          <div class="col s5">
                <div class="input-field col s12">
                  <div class="col s12" style="text-align: left">Selecciona año</div>
                    <select id="select-year"style="display: inline-block; height:40px;">
                      <option value="" disabled selected>Año</option>
                      <option value="2000">2000</option>
                      <option value="2001">2001</option>
                      <option value="2002">2002</option>
                      <option value="2003">2003</option>
                      <option value="2004">2004</option>
                      <option value="2005">2005</option>
                      <option value="2006">2006</option>
                      <option value="2007">2007</option>
                      <option value="2008">2008</option>
                      <option value="2009">2009</option>
                      <option value="2010">2010</option>
                    </select>
                </div>
          </div>
        </div>

        <div class="col s2" style="padding-top: 40px;">
           <div onclick="mostrar()">
             <a class="waves-effect waves-light btn">Mostrar</a>
           </div>
         </div>
      </center>

</form>
      <center>
        <div class="chart-container" style="height:1000px; width:1000px">
          <canvas id="bar-chart" ></canvas>
        </div>
      </center>

</div>
      <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script>

// Bar chart
function mostrar(){


  var mes = $("#select-month").val();
  var año = $("#select-year").val();
 // var año = $("#select-year").val();


new Chart(document.getElementById("bar-chart"), {
    type: 'bar',
    data: {

      <?php
          $array3= array();
          $query= mysqli_query($con, "SELECT COUNT(rental_id) as cantidad, date(rental_date) as dia FROM rental WHERE YEAR( rental_date ) = '2005' AND MONTH( rental_date ) = '05' GROUP BY date(rental_date)");
          while ($line = mysqli_fetch_array($query)) {
              $array3[] = $line["dia"];
            }
            $registros = count($array3);
            echo 'labels: [';
              for($i=0;$i<$registros;$i++){
                echo '"'.$array3[$i].'"';
                if(($i+1)<$registros){
                  echo ',';
                }
              }
            echo '],';
          ?>
      datasets: [
        {
          label: "Películas rentadas por día",
          backgroundColor: "#8e5ea2",

          <?php
          $array4= array();
          $query= mysqli_query($con, "SELECT COUNT(rental_id) as cantidad_rentas, date(rental_date) as dia FROM rental WHERE YEAR( rental_date ) = '2005' AND MONTH( rental_date ) = '05' GROUP BY date(rental_date)");
          while ($line = mysqli_fetch_array($query)) {
              $array4[] = $line["cantidad_rentas"];
            }
            $registros = count($array4);
            echo 'data: [';
              for($i=0;$i<$registros;$i++){
                echo '"'.$array4[$i].'"';
                if(($i+1)<$registros){
                  echo ',';
                }
              }
            echo '],';
          ?>
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Películas por día'
      }
    }
});
}
    </script>
  </body>
  </html>
