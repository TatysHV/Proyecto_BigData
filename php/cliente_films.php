<?php

include 'conexion.php';

$id_cliente = $_POST['cliente'];

$query_film = mysqli_query($con, "SELECT f.title, f.film_id FROM customer as c inner join rental as r inner join inventory as i inner join film as f
on c.customer_id = r.customer_id and r.inventory_id = i.inventory_id and i.film_id = f.film_id WHERE c.customer_id ='$id_cliente'") or die('<b>No se encontraron coincidencias</b>' . mysqli_error($con));

  echo '
        <center><h4>Resultados</h4></center>
        <table>
          <th>Título película</th>';

    while ($line = mysqli_fetch_array($query_film)) {
      $id_film = $line["film_id"];
      $title_film = $line["title"];

      echo'<tr>
      <td>'.$title_film.'</td>';

      }
      echo '</table>';
?>
