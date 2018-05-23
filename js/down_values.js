function buscar(){

	var genero = $("#select-category").val();
	var actor = $("#select-actorx").val();
	var func;

	if(actor != ""){
		//alert("actor seleccionado");
		func = 1;
		$.ajax({
			 url: "php/genero_actores.php",
			 data: {"genero":genero, "funcion":func, "actor":actor},
			 type: "post",
				success: function(data){
					document.getElementById("resultado_genero").innerHTML = data;
				}
			});
	}else{
		//alert("actor no seleccionado");
		func = 0;
		$.ajax({
			 url: "php/genero_actores.php",
			 data: {"genero":genero, "funcion":func},
			 type: "post",
				success: function(data){
					document.getElementById("resultado_genero").innerHTML = data;
				}
			});
	}



}

function show_actor_films(){
	var actor1 = $("#select-actor1").val();
	var actor2 = $("#select-actor2").val();

	var lista = document.getElementById("select-actor1");
	var indice = lista.selectedIndex;
	var opcion = lista.options[indice];
	var id_actor1 = opcion.value;

	var lista = document.getElementById("select-actor2");
	var indice = lista.selectedIndex;
	var opcion = lista.options[indice];
	var id_actor2 = opcion.value;

	if(actor1 != ""){ // Si solamente se está seleccionando el primer actor
		if(actor2 == ""){

				$.ajax({
					 url: "php/actores_films.php",
					 data: {"actor1":id_actor1, "funcion": 0},
					 type: "post",
						success: function(data){
							document.getElementById("resultado_films").innerHTML = data;
						}
					});
		}
	}

	if(actor2 !=""){ // Si se están seleccionando 2 actores

		$.ajax({
			 url: "php/actores_films.php",
			 data: {"actor1":id_actor1, "actor2": id_actor2, "funcion":1},
			 type: "post",
				success: function(data){
					document.getElementById("resultado_films").innerHTML = data;
				}
			});
	}
}

function show_client_films(){

	var lista = document.getElementById("select-cliente");
	var indice = lista.selectedIndex;
	var opcion = lista.options[indice];
	var id_cliente = opcion.value;

	$.ajax({
		 url: "php/cliente_films.php",
		 data: {"cliente":id_cliente},
		 type: "post",
			success: function(data){
				document.getElementById("resultado_cliente").innerHTML = data;
			}
		});

}
