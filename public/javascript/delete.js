document.addEventListener("DOMContentLoaded", () => {
    loadEvents();
})

function loadEvents() {
    const favorite = document.querySelectorAll("#delete-favorite");

    if(favorite !== undefined && favorite.length > 0) {
        favorite.forEach(fav => {
            fav.addEventListener("click", async evt => {
                evt.preventDefault();
                let result = await fetch(fav.href);
                result = await result.json();
                window.location.reload();
            });
        })
    }
}