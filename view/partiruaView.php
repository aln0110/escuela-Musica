<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partitura Crear</title>
    <link rel="stylesheet" href="/view/css/table.css">

</head>

<body>
    <div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Instrumento</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../business/partituraBusiness.php';
                $partituraBusiness = new PartituraBusiness();
                $partituras = $partituraBusiness->getPartituras();

                foreach ($partituras as $partitura) {
                    echo "<tr>";
                    echo "<td>" . $partitura->getIdPartitura() . "</td>";
                    echo "<td>" . $partitura->getNombrePartitura()  . "</td>";
                    echo "<td>" . $partitura->getInstrumentoPartitura() . "</td>";
                    echo "<td>" . ($partitura->getEstadoPartitura() ? 'Activo' : 'Inactivo') . "</td>";

                    echo "<td>";

                    echo "<form method='get' action='verPartitura.php' style='display:inline;'> ";
                    echo "<input type='hidden' name='id' value='" . $partitura->getIdPartitura() . "'>";
                    echo "<input type='submit' value='Ver' name='view'>";
                    echo "</form>";


                    echo "<form method='update' action='partituraEdit.php' style='display:inline;'> ";
                    echo "<input type='hidden' name='id' value='" . $partitura->getIdPartitura() . "'>";
                    echo "<input type='submit' value='Actualizar' name='update'>";
                    echo "</form>";

                    echo "<form method='post' action='../business/partituraActions.php' style='display:inline;'> ";
                    echo "<input type='hidden' name='id' value='" . $partitura->getIdPartitura() . "'>";
                    echo "<input type='submit' value='Eliminar' name='delete'>";
                    echo "</form>";

                    echo "<form method='get' action='../business/partituraActions.php' style='display:inline;'> ";
                    echo "<input type='hidden' name='id' value='" . $partitura->getIdPartitura() . "'>";
                    echo "<input type='submit' value='Descargar' name='download'>";
                    echo "</form>";


                    echo "</td>";

                    echo "</tr>";
                }

                ?>

            </tbody>
        </table>
    </div>





    <div>
        <form id="createForm" enctype="multipart/form-data" action="../business/partituraActions.php" method="post">
            <label for="nombre">Digite el nombre de la partitura</label><br>
            <input type="text" name="nombre" id="nombre" value="<?php echo isset($_FILES['pdf']) ? pathinfo($_FILES['pdf']['name'], PATHINFO_FILENAME) : ''; ?>" required><br>

            <label for="tipo">Seleccione la categoría del instrumento</label><br>
            <select name='tipo' id='tipo' onchange="loadInstruments()">
            <?php
            include '../business/categoriaBusiness.php';

            $categoriaBusiness = new categoriaBusiness();
            $categorias = $categoriaBusiness->getCategorias();

            foreach ($categorias as $categoria) {
                if($categoria->getEstado() == 1){
                    echo "<option value='" . $categoria->getNombre() . "'>" . $categoria->getNombre() . "</option>";
                }
            }
            ?>
            </select><br>
            <label for="instrumento">Seleccione el instrumento</label><br>
            <select name="instrumento" id="instrumento">
                <option value="">Seleccione un instrumento</option>

            </select><br>

            <br>
            <label for="pdf">Seleccione el archivo PDF</label><br>
            <input type="file" name="pdf" id="pdf" accept=".pdf" required onchange="updateFileName()"><br>


            <input type="hidden" name="estado" id="estado" value="true">


            <input type="submit" value="Crear" name="create">
        </form><br>
        <a href="../index.php">index</a>
    </div>
</body>

<script>
    function loadInstruments() {
    var categoria = document.getElementById('tipo').value;
    var instrumentoSelect = document.getElementById('instrumento');

    instrumentoSelect.innerHTML = "<option value=''>Seleccione un instrumento</option>"; 

    if (categoria != "") {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "./loadInstruments.php", true);   
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                instrumentoSelect.innerHTML += xhr.responseText; 
            }
        };
        xhr.send("categoria=" + encodeURIComponent(categoria));
    } else {
        instrumentoSelect.innerHTML = "<option value=''>Seleccione un instrumento</option>";
    }
}

    function updateFileName() {
        const fileInput = document.getElementById('pdf');
        const fileNameInput = document.getElementById('nombre');
        const file = fileInput.files[0];
        if (file) {
            const fileNameWithoutExtension = file.name.replace(/\.[^/.]+$/, "");
            fileNameInput.value = fileNameWithoutExtension;
        }
    }
</script>

</html>