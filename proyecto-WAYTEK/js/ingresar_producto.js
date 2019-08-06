$(document).ready(function(){
	$('#form_producto').submit(function(event){

		event.preventDefault();

		$.ajax({
			type: 'POST',
			url: $(this).attr('action'),
			data: $(this).serialize(),
			success: function(data){
				window.location="administrador.php";
			},
			error: function(data){
				alert("Error al añadir el producto");
			} 
		})
	})
});