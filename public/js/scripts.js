// public/js/scripts.js

document.addEventListener("DOMContentLoaded", function () {
    const squares = document.querySelectorAll(".square");

    squares.forEach((square) => {
        square.addEventListener("mouseover", function () {
            square.classList.add("hovered");
        });

        square.addEventListener("mouseout", function () {
            square.classList.remove("hovered");
        });
    });
});
