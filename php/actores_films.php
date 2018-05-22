<?php
include 'conexion.php';

$id_actor = $_POST['id_actor'];


echo '
      <center><h4>Resultados</h4></center>
      <table>
        <th>Título de películas donde aparece</th>';

        $query_films = mysqli_query($con, "SELECT f.title from film as f inner join film_actor as fa inner join actor as a on f.film_id = fa.film_id and fa.actor_id = a.actor_id WHERE a.actor_id = '$id_actor'");

        while ($line = mysqli_fetch_array($query_films)) {
          echo'<tr><td>'.$line["title"].'</td></tr>';
        }
        echo '</table>';

?>
