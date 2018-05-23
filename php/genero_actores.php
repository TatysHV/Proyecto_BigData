<?php

$func = $_POST['funcion'];


switch ($func) {
  case '0':
    films();
    break;

  case '1':
    filmsActor();
    break;
}

function films(){
  include 'conexion.php';
  $category = $_POST['genero'];
  $actores = '';

  $query_film = mysqli_query($con, "SELECT DISTINCT f.film_id, f.title from film as f inner join film_category as fc inner join category as c on f.film_id = fc.film_id and fc.category_id = c.category_id WHERE c.name = '$category'") or die('<b>No se encontraron coincidencias</b>' . mysqli_error($con));

  echo '
        <center><h4>Resultados</h4></center>
        <table>
          <th>Título película</th>
          <th>Actores que participan</th>';

    while ($line = mysqli_fetch_array($query_film)) {
      $id_film = $line["film_id"];
      $title_film = $line["title"];

      echo'<tr>
      <td>'.$title_film.'</td>';

      $query_actor = mysqli_query($con, "SELECT a.first_name, a.last_name from actor as a inner join film_actor as fa inner join film as f on fa.actor_id = a.actor_id and fa.film_id = f.film_id WHERE f.film_id = '$id_film'");
          echo '<td>';
          while ($line = mysqli_fetch_array($query_actor)) {
            $actores = $actores.$line["first_name"].' '.$line["last_name"].', '; //Concatenar los nombres e ir separando por , (coma)
          }
          echo $actores;
        echo '</td>
        </tr>';
        $actores = '';
      }
      echo '</table>';
}

function filmsActor(){
  include 'conexion.php';
  $category = $_POST['genero'];
  $id_actor = $_POST["actor"];
  $actores = '';

  $query_film = mysqli_query($con, "SELECT DISTINCT f.film_id, f.title from film as f inner join film_category as fc inner join category as c on f.film_id = fc.film_id and fc.category_id = c.category_id WHERE c.name = '$category'") or die('<b>No se encontraron coincidencias</b>' . mysqli_error($con));

  echo '
        <center><h4>Resultados</h4></center>
        <table>
          <th>Título película</th>
          <th>Actores que participan</th>';

        while($line = mysqli_fetch_array($query_film)){
          $id_film = $line["film_id"];
          $film = $line["title"];

          $query_actor = mysqli_query($con, "SELECT f.film_id, f.title, a.actor_id from film as f inner join film_actor as fa inner join actor as a on f.film_id = fa.film_id and fa.actor_id = a.actor_id WHERE f.film_id = '$id_film' and a.actor_id = '$id_actor'");

          if ($line = mysqli_fetch_array($query_actor)){
            $id_actor = $line["actor_id"];
        
            echo'<tr><td>'.$film.'</td>';

            echo '<td>';
            $query_actores = mysqli_query($con, "SELECT a.first_name, a.last_name, a.actor_id from actor as a inner join film_actor as fa inner join film as f on fa.actor_id = a.actor_id and fa.film_id = f.film_id WHERE f.film_id = '$id_film'");
            while ($line = mysqli_fetch_array($query_actores)) {
              $actores = $actores.$line["first_name"].' '.$line["last_name"].', '; //Concatenar los nombres e ir separando por , (coma)
            }
            echo $actores;
          }
          echo '</td></tr>';
          $actores = '';
        }
        echo '</table>';

}


?>
