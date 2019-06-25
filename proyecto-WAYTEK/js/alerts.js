$(document).ready(function(){
  bsCustomFileInput.init();
$("#eliminar_btn").click(function(){

    Swal.fire({
        title: 'Estás seguro de borrar el producto?',
        text: "No se puede deshacer!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      })
})
});
