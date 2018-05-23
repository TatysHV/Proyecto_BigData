
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
        <li><a href="">Películas</a></li>
      </ul>
    </div>
  </nav>
    <form class="col s12">
      <center>
        <h4>Cantidad de películas por categoría</h4>
        <br><br>
        </div>
      </center>
    </form>
  </div>

</br></br>

  <div class="row" style="margin:auto; width: 50%">

      <div id="resultado_films">

      </div>

  </div>
  <div class="chart-container" style="height:1000px; width:1000px">
    <canvas id="myChart"></canvas>
  </div>
  <div class="chart-container" style="height:1000px; width:1000px">
    <canvas id="bar-chart" ></canvas>
  </div>


      <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script>
    //Lineas
      var ctx = document.getElementById('myChart').getContext('2d');
      var chart = new Chart(ctx, {
      // The type of chart we want to create
      type: 'line',

      // The data for our dataset
      data: {
          <?php
          $array= array();
          $query= mysqli_query($con, "SELECT c.name, COUNT(c.name) as cantidad from film as a INNER JOIN film_category as b INNER JOIN category as c on a.film_id = b.film_id and b.category_id = c.category_id GROUP BY c.name");
          while ($line = mysqli_fetch_array($query)) {
              $array[] = $line["name"];

              //echo $line["name"].',';
            }
            $registros = count($array);
            //echo'<li>'.$line["name"].'</li> <li>'.$line["cantidad"].'</li>';
            echo 'labels: [';
              for($i=0;$i<$registros;$i++){
                echo '"'.$array[$i].'"';
                if(($i+1)<$registros){
                  echo ',';
                }
              }
            echo '],';
          ?>
          //labels: [1500,1600,1700,1750,1800,1850,1900,1950,1999,2050],
    datasets: [{
        <?php
          $array2= array();
          $query= mysqli_query($con, "SELECT c.name, COUNT(c.name) as cantidad from film as a INNER JOIN film_category as b INNER JOIN category as c on a.film_id = b.film_id and b.category_id = c.category_id GROUP BY c.name");
          while ($line = mysqli_fetch_array($query)) {
              $array2[] = $line["cantidad"];

              //echo $line["name"].',';
            }
            $registros = count($array);
            //echo'<li>'.$line["name"].'</li> <li>'.$line["cantidad"].'</li>';
            echo 'data: [';
              for($i=0;$i<$registros;$i++){
                echo '"'.$array2[$i].'"';
                if(($i+1)<$registros){
                  echo ',';
                }
              }
            echo '],';
          ?> 
        //data: [86,114,106,106,107,111,133,221,783,2478],
        label: "Peliculas Por Categoría",
        borderColor: "#8e5ea2",
        //fill: false
      }
    ]
  },

        // Configuration options go here
        options: {
          title: {
      display: true,
      
    }
        }




      });

    </script>
  </body>
  </html>
