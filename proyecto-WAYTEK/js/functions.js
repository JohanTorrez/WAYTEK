$(document).ready(function () {
  bsCustomFileInput.init();
  $('[data-toggle="tooltip"]').tooltip({
    delay: {
      show: 500,
    }
  });
  //leerProductos();

  //funciones para borrar productos
  $(".borrar_producto").click(function (e) {
    var id_producto = $(this).data('id');
    swalBorrar(id_producto);
    e.preventDefault();
  })

  //funciones para borrar componentes
  $(".borrar_componente").click(function(e){
    var id_componente = $(this).data('id');
    swalBorrarComponente(id_componente);
    e.preventDefault();
  })

  

  

  function swalBorrar(id_producto) {
    var miInit= {
      method: 'post',
      headers: {
        "Content-type": "application/x-www-form-urlencoded; charset=UTF-8"
      },
      body: 'delete=' + id_producto,
      dataType: 'json'
    };
    Swal.fire({
      title: 'Estás seguro de borrar el producto?',
      text: "No se puede deshacer!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, borrar producto!',
      cancelButtonText: 'No, cancelar!',
      showLoaderOnConfirm: true,
      preConfirm: function(){
        fetch('http://localhost/proyecto-WAYTEK/borrar_producto.php', miInit)
        .then(res=>res.json())
        .then(function(data){
        Swal.fire('Producto borrado',data.message, data.estado);
        $('#P-'+id_producto+'').hide(500);
        $('#P-'+id_producto+'').remove();
      })
        .catch(function(data, textStatus, errorThrown){
          Swal.fire('Oops...', 'Algo malo paso al borrar el producto', 'error');
          console.log('Mensaje=:' + data + ', Estado=:' + textStatus + ', error thrown:=' + errorThrown);
        })
      },
  allowOutsideClick: false
});
}


function swalBorrarComponente(id_componente) {
  var miInit= {
    method: 'post',
    headers: {
      "Content-type": "application/x-www-form-urlencoded; charset=UTF-8"
    },
    body: 'borradocom=' + id_componente,
    dataType: 'json'
  };
  Swal.fire({
    title: 'Estás seguro de borrar el componente?',
    text: "No se puede deshacer!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, borrar componente!',
    cancelButtonText: 'No, cancelar!',
    showLoaderOnConfirm: true,
    preConfirm: function(){
      fetch('http://localhost/proyecto-WAYTEK/borrar_componente.php', miInit)
      .then(res=>res.json())
      .then(data=>{
        Swal.fire('Componente borrado', data.message, data.estado);
        $('#C-'+id_componente+'').hide(500);
        $('#C-'+id_componente+'').remove();
        console.log(data.message)
        //leerProductos()
      })
      .catch(function(data, textStatus, errorThrown){
        Swal.fire('Oops...', 'Algo malo paso al borrar el componente', 'error');
        console.log('Mensaje=:' + data + ', Estado=:' + textStatus + ', error thrown:=' + errorThrown);
      })
    },
allowOutsideClick: false
});
}



function leerProductos() {
  //$('.#leerProductos').load('read.php')
}

$('#busqueda').on('keyup', function(){
  buscar();
})

function buscar() {
    var textoBusqueda = $("input#busqueda").val();
    if (textoBusqueda != "") {
      $.post("buscar.php",
      {valorBusqueda: textoBusqueda},
      function(mensaje) {
      $("#resultadoBusqueda").html(mensaje);
      }); 
  } else { 
      ("#resultadoBusqueda").html('<p class="display-2 text-center">No existen registros</p>');
}
};
});