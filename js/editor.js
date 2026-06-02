const imagenInput =
document.getElementById("imagenInput");

const previewImagen =
document.getElementById("previewImagen");

const textoInput =
document.getElementById("textoInput");

const previewTexto =
document.getElementById("previewTexto");

const colorTexto =
document.getElementById("colorTexto");

const tamanoImagen =
document.getElementById("tamanoImagen");

const botonGuardar =
document.getElementById("guardarDiseno");

imagenInput.addEventListener("change", function () {

    const archivo = this.files[0];

    if (!archivo) {
        return;
    }

    const reader = new FileReader();

    reader.onload = function (e) {

        previewImagen.src = e.target.result;
        previewImagen.style.display = "block";

    };

    reader.readAsDataURL(archivo);

});

textoInput.addEventListener("input", function () {

    previewTexto.textContent =
        this.value || "Tu texto";

});

colorTexto.addEventListener("input", function () {

    previewTexto.style.color =
        this.value;

});

tamanoImagen.addEventListener("input", function () {

    previewImagen.style.width =
        this.value + "px";

});

function activarDrag(elemento) {

    let moviendo = false;

    let offsetX = 0;
    let offsetY = 0;

    elemento.addEventListener("mousedown", function (e) {

        moviendo = true;

        offsetX =
            e.clientX -
            elemento.offsetLeft;

        offsetY =
            e.clientY -
            elemento.offsetTop;

    });

    document.addEventListener("mouseup", function () {

        moviendo = false;

    });

    document.addEventListener("mousemove", function (e) {

        if (!moviendo) {
            return;
        }

        elemento.style.left =
            (e.clientX - offsetX) + "px";

        elemento.style.top =
            (e.clientY - offsetY) + "px";

    });

}

activarDrag(previewImagen);
activarDrag(previewTexto);

botonGuardar.addEventListener("click", async function () {

    if (!imagenInput.files.length) {

        alert("Debes subir una imagen");

        return;
    }

    const formData = new FormData();

    formData.append(
        "imagen",
        imagenInput.files[0]
    );

    formData.append(
        "texto",
        previewTexto.textContent
    );

    formData.append(
        "color",
        previewTexto.style.color || "#000000"
    );

    formData.append(
        "imagen_x",
        parseInt(previewImagen.style.left) || 0
    );

    formData.append(
        "imagen_y",
        parseInt(previewImagen.style.top) || 0
    );

    formData.append(
        "texto_x",
        parseInt(previewTexto.style.left) || 0
    );

    formData.append(
        "texto_y",
        parseInt(previewTexto.style.top) || 0
    );

    formData.append(
        "ancho_imagen",
        parseInt(previewImagen.offsetWidth)
    );

    try {

        botonGuardar.disabled = true;
        botonGuardar.textContent = "Guardando...";
        console.log(imagenInput.files[0]);
        const respuesta = await fetch(
            "./procesos/guardarDiseno.php",
            {
                method: "POST",
                body: formData,
                credentials: "same-origin"
            }
        );

        const texto = await respuesta.text();

        console.log(texto);

        alert(texto);

        return;

        if (datos.ok) {

            alert(
                "Diseño guardado correctamente"
            );

            window.location.href =
                "./carrito.php";

        } else {

            alert(
                datos.mensaje ||
                "Error al guardar"
            );

        }

    } catch (error) {

        console.error(error);

        alert(
            "Error de conexión con el servidor"
        );

    } finally {

        botonGuardar.disabled = false;
        botonGuardar.textContent =
            "Guardar diseño";

    }

});