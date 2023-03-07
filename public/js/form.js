let rol = document.getElementsByClassName("role");
let viewA = document.getElementsByClassName("patient");

rol.addEventListener("click", function () {
    if ((rol.value = "doctor")) {
        viewA.style.display = none;
    } else {
        viewA.style.display = block;
    }
});
