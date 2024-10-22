function ValidaLado1() {
    let lado1 = document.getElementById("lado1");
    let error_lado1 = document.getElementById("error_lado1");

    if (lado1.value == null || lado1.value.length == 0 || isNaN(lado1.value) || lado1.value <= 0) {
        error_lado1.innerHTML = "El lado 1 es obligatorio y debe ser un número positivo.";
        lado1.classList.add("is-invalid"); // Añadir clase de error
        return false;
    } else {
        error_lado1.innerHTML = "";
        lado1.classList.remove("is-invalid"); // Quitar clase de error
        return true;
    }
}

function ValidaLado2() {
    let lado2 = document.getElementById("lado2");
    let error_lado2 = document.getElementById("error_lado2");

    if (lado2.value == null || lado2.value.length == 0 || isNaN(lado2.value) || lado2.value <= 0) {
        error_lado2.innerHTML = "El lado 2 es obligatorio y debe ser un número positivo.";
        lado2.classList.add("is-invalid");
        return false;
    } else {
        error_lado2.innerHTML = "";
        lado2.classList.remove("is-invalid");
        return true;
    }
}

function ValidaRadio() {
    let radio = document.getElementById("lado1");
    let error_radio = document.getElementById("error_lado1");

    if (radio.value == null || radio.value.length == 0 || isNaN(radio.value) || radio.value <= 0) {
        error_radio.innerHTML = "El radio es obligatorio y debe ser un número positivo.";
        radio.classList.add("is-invalid");
        return false;
    } else {
        error_radio.innerHTML = "";
        radio.classList.remove("is-invalid");
        return true;
    }
}
