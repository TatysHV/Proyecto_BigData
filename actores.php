
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
        <h4>Búsqueda de películas de actores</h4>
        <br><br>

        <?php
          echo ' <center>
              <div style="width: 40%">
              <div class="input-field col s9" style="width:100%; margin:auto; display: inline-block">
              <select id="select-actor" style="display: inline-block">';
          $query= mysqli_query($con, "SELECT * FROM actor ORDER BY first_name, last_name ASC");

          while ($line = mysqli_fetch_array($query)) {
            echo'<option value="'.$line["actor_id"].'">'.$line["first_name"].' '.$line["last_name"].'</option>';
          }

          echo'</select>
          </div>
          </center>';

         ?>

         <div class="col s3" style="display:inline-block; width:100px; height: 80px;">
           <div onclick="show_actor_films()">
             <a class="waves-effect waves-light btn">Buscar</a>
           </div>
         </div>
        </div>
      </center>
    </form>
  </div>

</br></br>

  <div class="row" style="margin:auto; width: 50%">

      <div id="resultado_films">

      </div>

  </div>


      <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
  </body>
  </html>
