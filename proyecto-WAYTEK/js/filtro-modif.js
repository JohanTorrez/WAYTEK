$(document).ready(function(){
    let url = new URLSearchParams(location.search);
    var tipo_producto = url.get('tipo');
    var id_producto = url.get('id');
    console.log(tipo_producto);
    console.log(id_producto);
    mostrarMarca(tipo_producto);
    mostrarCompo(tipo_producto);

    function mostrarMarca() {
      switch(tipo_producto){
        case 'accesorio':
            $('#categoriaa').show(500);
        case 'presupuesto':
        case 'pc escritorio':
          $('#marcae').hide(500);
          console.log("Se fue la marca");
          break;
        default:
          $('#marcae').show(500);
          console.log("Se mostró la marca");
          break;
      }
    }
    
    function mostrarCompo(tipo_producto) {
      switch (tipo_producto) {
        case 'accesorio':
          $('.form-partese').hide(500);
          break;
        case 'pc escritorio':
        case 'presupuesto':
        case 'portátil':
          $('.form-partese').show(500);
        default:
          break;
      }
    }
      /*var Init = {
      method: 'POST',
      headers: {
        "Content-type": "application/x-www-form-urlencoded; charset=UTF-8"
      },
      body: 'modifi=' + id_producto&'tipo='+tipo_producto,
    };*/
      //leerProductos()
})