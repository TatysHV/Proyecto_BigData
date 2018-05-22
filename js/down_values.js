function buscar(){

	var genero = $("#select-category").val();

	$.ajax({
     url: "php/genero_actores.php",
     data: {"genero":genero},
     type: "post",
      success: function(data){

				document.getElementById("resultado_genero").innerHTML = data;
      }
    });

}

function show_actor_films(){
	var lista = document.getElementById("select-actor");
	var indice = lista.selectedIndex;
	var opcion = lista.options[indice];
	var id_actor = opcion.value;

	$.ajax({
		 url: "php/actores_films.php",
		 data: {"id_actor":id_actor},
		 type: "post",
			success: function(data){

				document.getElementById("resultado_films").innerHTML = data;
			}
		});


}
