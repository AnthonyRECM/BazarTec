document.addEventListener("DOMContentLoaded", function () {
    // Obtén el contenedor del carrito
    const carrito = document.getElementById('carrito');
    // Obtén la lista de productos
    const listaProductos = document.querySelector('.row.justify-content-evenly.my-5');
    // Agrega un evento de clic a la lista de productos
    listaProductos.addEventListener('click', agregarAlCarrito);

    // Función para agregar un producto al carrito
    function agregarAlCarrito(e) {
        e.preventDefault();
        if (e.target.classList.contains('agregar-carrito')) {
            // Obtén el ID del producto
            const idProducto = e.target.getAttribute('data-id');
            // Obtén los detalles del producto
            const nombre = e.target.parentElement.querySelector('.letras2').textContent;
            const precio = e.target.parentElement.querySelector('.letras3').textContent;
            const imagen = e.target.parentElement.parentElement.querySelector('.img-avatar').src;

            // Agrega el producto al carrito
            insertarCarrito(idProducto, nombre, precio, imagen);
            // Muestra un mensaje de éxito
            mostrarMensaje('El producto se ha agregado al carrito');
        }
    }

    // Función para insertar un producto en el carrito
    function insertarCarrito(id, nombre, precio, imagen) {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>
                <img src="${imagen}" width="50" >
            </td>
            <td>
                ${nombre}
            </td>
            <td>
                ${precio}
            </td>
            <td>
                <a href="#" class="borrar" data-id="${id}">X</a>
            </td>
        `;

        // Inserta la fila en la lista de carrito
        const listaCarrito = document.querySelector('#lista-carrito tbody');
        listaCarrito.appendChild(row);
    }

    // Función para mostrar un mensaje en la página
    function mostrarMensaje(mensaje) {
        // Crea un elemento para el mensaje
        const mensajeElemento = document.createElement('div');
        mensajeElemento.classList.add('mensaje');
        mensajeElemento.textContent = mensaje;

        // Inserta el mensaje en el DOM
        document.body.insertBefore(mensajeElemento, document.body.firstChild);

        // Desaparece el mensaje después de 3 segundos
        setTimeout(function () {
            mensajeElemento.remove();
        }, 3000);
    }

    // Evento de clic para el botón de vaciar carrito
    document.getElementById("vaciar-carrito").addEventListener("click", function() {
        // Eliminar todos los elementos de la lista del carrito
        document.querySelector("#lista-carrito tbody").innerHTML = "";
    });

    // Evento de clic para eliminar un solo producto del carrito
    document.querySelector("#lista-carrito").addEventListener("click", function(event) {
        if (event.target.classList.contains("borrar")) {
            const id = event.target.getAttribute("data-id");
            const row = event.target.parentElement.parentElement;
            row.remove();
        }
    });
});
