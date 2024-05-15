// Obtén el elemento del icono de flecha
const arrowIcon = document.querySelector(".desplazarMov");

// Agrega un evento de clic al icono
arrowIcon.addEventListener("click", () => {
    // Desplázate hacia el div de destino
    const divDestino = document.querySelector("#desplazarDestino");
    if (divDestino) {
        divDestino.scrollIntoView({
            behavior: "smooth"
        });
    }1
});

$(document).ready(function () {
    $('.agregar-carrito').on('click', function () {
        // Obtener datos del producto
        var id = $(this).data('id');
        var nombre = $(this).closest('.texto-producto').find('.letras2').text();
        var precio = $(this).closest('.texto-producto').find('.letras3').text();
        var imagen = $(this).closest('.cardd').find('img').attr('src');
        
        // Crear el HTML para el producto en el carrito
        var productoCarrito = `
            <tr>
                <td><img src="${imagen}" width="100"></td>
                <td>${nombre}</td>
                <td>${precio}</td>
                <td><a href="#" class="borrar-producto" data-id="${id}">X</a></td>
            </tr>
        `;
        
        // Agregar el producto al carrito
        $('#lista-carrito tbody').append(productoCarrito);
        
        // Mostrar el mensaje modal
        mostrarMensajeModal();
    });

    // Vaciar el carrito
    $('#vaciar-carrito').on('click', function (e) {
        e.preventDefault();
        $('#lista-carrito tbody').empty();
    });

    // Borrar un producto del carrito
    $('#lista-carrito').on('click', '.borrar-producto', function (e) {
        e.preventDefault();
        $(this).closest('tr').remove();
    });

    // Función para mostrar el mensaje modal
    function mostrarMensajeModal() {
        var modal = $('#mensajeModal');
        modal.css('display', 'block');
        
        // Ocultar el mensaje después de 2 segundos
        setTimeout(function() {
            modal.css('display', 'none');
        }, 2000);
    }

    // Cerrar el mensaje modal al hacer clic en la 'x'
    $('.close').on('click', function() {
        $('#mensajeModal').css('display', 'none');
    });

    // Cerrar el mensaje modal al hacer clic fuera del contenido del modal
    $(window).on('click', function(event) {
        var modal = $('#mensajeModal');
        if ($(event.target).is(modal)) {
            modal.css('display', 'none');
        }
    });
});
