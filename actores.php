
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
        <div style="width: 80%">

        <?php
        echo '
            <div class="col s5">
              <div class="input-field col s12">
                <div class="col s12" style="text-align: left">Elegir actor:</div>
                <select id="select-actor1" style="display: block;height:40px;" >';
                $query= mysqli_query($con, "SELECT * FROM actor ORDER BY first_name, last_name ASC");
                  echo'<option value="" selected> </option>';
                while ($line = mysqli_fetch_array($query)) {
                  echo'<option value="'.$line["actor_id"].'">'.$line["first_name"].' '.$line["last_name"].'</option>';
                }

                echo'</select>
                </div>
              </div>';

          echo '
              <div class="col s5">
                <div class="input-field col s12">
                  <div class="col s12" style="text-align: left">Elegir actor:</div>
                  <select id="select-actor2" style="display: block;height:40px;" >';
                  $query= mysqli_query($con, "SELECT * FROM actor ORDER BY first_name, last_name ASC");
                    echo'<option value="" selected> </option>';
                  while ($line = mysqli_fetch_array($query)) {
                    echo'<option value="'.$line["actor_id"].'">'.$line["first_name"].' '.$line["last_name"].'</option>';
                  }

                  echo'</select>
                  </div>
                </div>';

         ?>

         <div class="col s2" style="padding-top: 40px;">
           <div onclick="show_actor_films()">
             <a class="waves-effect waves-light btn">Buscar</a>
           </div>
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
  </body>
  </html>
