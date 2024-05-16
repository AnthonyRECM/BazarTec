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