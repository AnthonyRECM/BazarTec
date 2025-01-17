document.addEventListener("DOMContentLoaded", function () {
    // Arreglo para almacenar los productos en el carrito
    let productosEnCarrito = [];
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
            let precio = e.target.parentElement.querySelector('.letras3').textContent;
            precio = precio.substring(1);
            const imagen = e.target.parentElement.parentElement.querySelector('.img-avatar').src;

            // Agrega el producto al carrito
            insertarCarrito(idProducto, nombre, precio, imagen);
            
            // Agrega los detalles del producto al arreglo
            productosEnCarrito.push({ id: idProducto, nombre: nombre, precio: precio});
            // Muestra un mensaje de éxito
             // Imprime el arreglo en la consola para verificar que se está actualizando correctamente
            console.log('Productos en carrito:', productosEnCarrito);

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
    
    // Evento de clic para el botón de comprar carrito
    document.getElementById("comprar-carrito").addEventListener("click", function(event) {
        event.preventDefault(); // Prevenir el comportamiento predeterminado del enlace
        
        // Convertir el arreglo a JSON
        const productosJSON = JSON.stringify(productosEnCarrito);

        // Log para verificar el contenido de los datos enviados
        console.log('Datos enviados al servidor:', productosJSON);
        
        // Enviar el arreglo al archivo PHP
        fetch('./php/procesar_compra.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: productosJSON,
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Error al procesar la compra');
            }
            return response.json();
        })
        .then(data => {
            console.log('Respuesta del servidor:', data); // Puedes hacer algo con la respuesta del servidor si es necesario
            if (data.status === 'success') {
                // Vaciar el carrito después de la compra
                document.querySelector("#lista-carrito tbody").innerHTML = "";
                productosEnCarrito.length = 0;
                mostrarMensaje('La compra se ha realizado con éxito');
                
                // Redirigir a la página de pago
                window.location.href = './pago.php';
            } else {
                mostrarMensaje('Error al procesar la compra: ' + data.errors.join(', '));
            }
        })
        .catch(error => {
            console.error('Error:', error);
            mostrarMensaje('Error al procesar la compra');
        });
    });
});
