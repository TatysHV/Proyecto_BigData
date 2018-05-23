
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
        <li><a href="clientes-films.php">Cliente-film</a></li>
        <li><a href="">Películas</a></li>
        <li><a href="graficas.php">Gráficas</a></li>
      </ul>
    </div>
  </nav>
    <form class="col s12">
      <center>
        <h4>Películas rentadas por cliente</h4>
        <br>

        <div style="width: 80%">
          <div class="col s12" style="border: 1px solid #00838F; border-radius: 3px 3px 3px 3px; padding: 10px; margin: 2%;">
            <span style="color:#00838F"><b>Ejercicio 9.</b></span> Busca las películas que han sido rentadas por un cliente determinado.
          </div>
          <br><br><br>


        <?php
          echo '
                <div class="input-field col s10">
                <div class="col s12" style="text-align: left">Elegir cliente:</div>
                <select id="select-cliente" style="display: inline-block; height:40px;">';
                  $query= mysqli_query($con, "SELECT customer_id, first_name, last_name FROM customer ORDER BY first_name, last_name ASC");

                  while ($line = mysqli_fetch_array($query)) {
                    echo '<option value="'.$line["customer_id"].'">'.$line["first_name"].' '.$line["last_name"].'</option>';
                  }

                  echo'</select>

                </div>';
         ?>

         <div class="col s2" style="padding-top: 40px;">
           <div onclick="show_client_films()">
             <a class="waves-effect waves-light btn">Buscar</a>
           </div>
         </div>
       </div>
      </div>
      </center>
    </form>
  </div>

</br></br>

  <div class="row" style="margin:auto; width: 60%">

      <div id="resultado_cliente">

      </div>

  </div>


      <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
  </body>
  </html>
