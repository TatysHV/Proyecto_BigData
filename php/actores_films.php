<?php
include 'conexion.php';
$func = $_POST['funcion'];

switch($func){
  case '0';
    actor();
  break;
  case '1';
    match_actors();
  break;
}

function actor(){
  include 'conexion.php';
  $id_actor = $_POST['actor1'];

  echo '
        <center><h4>Resultados</h4></center>
        <table>
          <th>Título de películas donde aparece</th>';

          $query_films = mysqli_query($con, "SELECT f.title from film as f inner join film_actor as fa inner join actor as a on f.film_id = fa.film_id and fa.actor_id = a.actor_id WHERE a.actor_id = '$id_actor'");

          while ($line = mysqli_fetch_array($query_films)) {
            echo'<tr><td>'.$line["title"].'</td></tr>';
          }
          echo '</table>';
}

function match_actors(){
  include 'conexion.php';
  $id_actor1 = $_POST['actor1'];
  $id_actor2 = $_POST['actor2'];

  echo '
        <center><h4>Resultados</h4></center>
        <table>
          <th>Título de películas donde aparece</th>';

          $query_films = mysqli_query($con, "SELECT f.title, f.film_id from film as f inner join film_actor as fa inner join actor as a on f.film_id = fa.film_id and fa.actor_id = a.actor_id WHERE a.actor_id = '$id_actor1'");

          while ($line = mysqli_fetch_array($query_films)) {
            $id_film = $line["film_id"];

            $query_films2 = mysqli_query($con, "SELECT f.title, f.film_id from film as f inner join film_actor as fa inner join actor as a on f.film_id = fa.film_id and fa.actor_id = a.actor_id WHERE f.film_id = '$id_film' and a.actor_id = '$id_actor2'");

            if($line2 = mysqli_fetch_array($query_films2)){
                echo'<tr><td>'.$line2["title"].'</td></tr>';
            }

          }
          echo '</table>';

}




?>
