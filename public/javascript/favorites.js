document.addEventListener("DOMContentLoaded", () => {
    loadEvents();
})

function loadEvents() {
    const favorite = document.getElementById("favorite");
    if(favorite !== undefined) {
        favorite.addEventListener("click", async evt => {
            evt.preventDefault();
            let result = await fetch(favorite.href);
            result = await result.json();
            window.location.reload();
        });
    }
}