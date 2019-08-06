$(document).ready(function () {
    $('#form-modificar').submit(function (e) {
        e.preventDefault();


        var miInit = {
            method: 'post',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: $(this).serialize()
        };

        fetch($(this).attr('action'), miInit)
            .then(function(){
                Swal.fire({
                title: 'Modificado',
                type: 'success'
            })
            location.reload()
        })
            .catch(function(){
                Swal.fire({
                title: 'Error al modificar',
                type: 'error'
            })
            location.reload()
        }
)

    })
})