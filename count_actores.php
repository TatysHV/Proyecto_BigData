
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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
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
        <h4>Gráfica de actores por película</h4>
        <br>
        <div style="width: 80%">

          <div class="col s12" style="border: 1px solid #00838F; border-radius: 3px 3px 3px 3px; padding: 10px; margin: 2%;">
            <span style="color:#00838F"><b>Ejercicio 7.</b></span> Muestra la cantidad de actores que aparecen en cada película de un género deseado.
          </div>
          <br><br><br>

        <?php
          echo '
                <div class="input-field col s10">
                <div class="col s12" style="text-align: left">Elegir película:</div>
                <select id="gr-categoria" style="display: inline-block; height:40px;">';
                  $query= mysqli_query($con, "SELECT name FROM category");

                  while ($line = mysqli_fetch_array($query)) {
                    echo'<option value="'.$line["name"].'">'.$line["name"].'</option>';
                  }

                  echo'</select>
              </div>';

         ?>

         <div class="col s2" style="padding-top: 40px;">
           <div onclick="grafica_actores()">
             <a class="waves-effect waves-light btn">Buscar</a>
           </div>
         </div>
       </div>
      </div>
      </center>
    </form>
  </div>

</br></br>

  <div class="row" style="margin:auto; width: 70%">



    <div id="grafica_actores">

      <div class="chart-container" style="height:1000px; width:1000px">
        <canvas id="myChart"></canvas>
      </div>
      <div class="chart-container" style="height:1000px; width:1000px">
        <canvas id="bar-chart" ></canvas>
      </div>
    </div>

    </div>


        <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script>

      window.onload = function() {
        var flag = false;
      };

      if(flag==true){//si ya hay una grafica
        removeData(chart);
      }

        function grafica_actores(){

          var lista = document.getElementById("gr-categoria");
          var indice = lista.selectedIndex;
          var opcion = lista.options[indice];
          var categoria = opcion.value;

        //  alert("categoria: "+categoria);
          $.ajax({
             url: "php/gr_actores.php",
             data: {"category":categoria},
             type: "post",
              success: function(data){
                //alert("data: "+data);
                $("#hola").html(data);

                flag = true;
              }
            });
        }

      </script>
      <script id="hola"></script>

  </body>
  </html>
