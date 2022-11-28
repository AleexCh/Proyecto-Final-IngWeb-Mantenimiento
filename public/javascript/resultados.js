document.addEventListener("DOMContentLoaded", () => {
    resultadosBuscador();
})

function resultadosBuscador() {
    const dateInput = document.getElementById("play_date");
    const searchButton = document.getElementById("buscar");

    if(searchButton !== undefined) {
        searchButton.addEventListener("click", evt => {
            evt.preventDefault();
            parent.location = `/resultados?play_date=${dateInput.value}`;
        });
    }
}