$().ready(function(){

	$("#formEmpleado").validate({

			rules: {

				nombre: {
					required: true,
					minlength: 3,

				},

				email: {
          required: true,
					email: true,
				},

				description: {
          required: true,
					minlength: 5,
				},
				area_id: {
					required: true,
				}

			},

			messages: {
                
              nombre:{
		            required: "Por favor ingrese el Nombre",
								minlength: "Campo demasiado corto, minimo 3 characters"
							},

              email:{
               	required: "Por favor ingrese el Email",
               	email: "El campo debe de ser de tipo Email"
               },

              description:{
               	required: "Por favor ingrese una descripcion",
               	minlength : "Campo demasiado corto, minimo 5 characters"
              },
              area_id: {
									required: "Por favor Seleccione una opcion"
								}
            }
		});

});