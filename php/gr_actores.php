<?php
include "conexion.php";

$category = $_POST['category'];

echo "

  var ctx = document.getElementById('myChart').getContext('2d');

  var chart = new Chart(ctx, {
  // The type of chart we want to create
  type: 'line',

  // The data for our dataset
  data: {";


      $array= array();
      $id_film = array();

      $query= mysqli_query($con, "SELECT DISTINCT f.title, f.film_id from film as f inner join film_category as fc inner join category as c on f.film_id = fc.film_id and fc.category_id = c.category_id WHERE c.name = '$category'");

      while ($line = mysqli_fetch_array($query)) {
          $array[] = $line["title"];
          $id_film[] = $line["film_id"];
      }
        $registros = count($array);
        echo 'labels: [';
          for($i=0;$i<$registros;$i++){
            echo '"'.$array[$i].'"';
            if(($i+1)<$registros){
              echo ',';
            }
          }
        echo '],
        datasets: [{';

      $array2= array();

      for($i=0; $i<$registros; $i++){
          $query2= mysqli_query($con, "SELECT a.first_name, COUNT(a.actor_id) as cantidad FROM actor as a inner join film_actor as fa inner join film as f on fa.actor_id = a.actor_id and fa.film_id = f.film_id WHERE f.film_id = $id_film[$i]");

          while ($line = mysqli_fetch_array($query2)) {
              $array2[] = $line["cantidad"];

            }
      }


        $registros = count($array2);
        //echo'<li>'.$line["name"].'</li> <li>'.$line["cantidad"].'</li>';
        echo 'data: [';
          for($i=0;$i<$registros;$i++){
            echo '"'.$array2[$i].'"';
            if(($i+1)<$registros){
              echo ',';
            }
          }
        echo '],
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

      function removeData(chart) {
      chart.data.labels.pop();
      chart.data.datasets.forEach((dataset) => {
          dataset.data.pop();
      });
      chart.update();
      }

        ';


?>
