import alert from "./alert.mjs";
prevent();

function prevent() {
    let element = document.querySelector(".form");
    element.addEventListener("submit", (event) => {
        if (alert() === false) {
            event.preventDefault();
        }
    });
}
