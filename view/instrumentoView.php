<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/view/css/table.css">
    <title>Instrumento</title>
</head>

<body>
    <div>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>tipo</th>
                    <th>instruemento</th>
                    <th>marca</th>
                    <th>codigo</th>
                    <th>serie</th>
                    <th>uso</th>
                    <th>activo</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "../business/instrumentoBusiness.php";
                $instrumentoBusiness = new InstrumentoBusiness();
                $instrumentos = $instrumentoBusiness->getInstrumentos();
                foreach ($instrumentos as $instrumento) {
                    echo "<tr>";
                    echo "<td>" . $instrumento->getId() . "</td>";
                    echo "<td>" . $instrumento->getTipo() . "</td>";
                    echo "<td>" . $instrumento->getInstrumento() . "</td>";
                    echo "<td>" . $instrumento->getMarca() . "</td>";
                    echo "<td>" . $instrumento->getCodigo() . "</td>";
                    echo "<td>" . $instrumento->getSerie() . "</td>";
                    echo "<td>" . ($instrumento->getUso() ? 'Sí' : 'No') . "</td>";
                    echo "<td>" . ($instrumento->getActivo() ? 'Activo' : 'Inactivo') . "</td>";

                    echo "<td>";
                    echo "<form action='../business/instrumentoActions.php' method='post' style='display:inline;'>";
                    echo "<input type='hidden' name='id' value='" . $instrumento->getId() . "'>";
                    echo "<input type='submit' value='Delete' name='delete'>";
                    echo "</form>";

                    echo "<form action='instrumentoEdit.php' method='get' style='display:inline;'>";
                    echo "<input type='hidden' name='id' value='" . $instrumento->getId() . "'>";
                    echo "<input type='submit' value='Editar' name='update'>";
                    echo "</form>";

                    
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
                
            </tbody>
        </table>

    </div>

    <div>
        <form id=createForm enctype="multipart/form-data" action="../business/instrumentoActions.php" method="post">

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


            <label for="marca">Marca</label><br>
            <input type="text" name="marca" id="marca"><br>

            <label for="codigo">Código</label><br>
            <input type="text" name="codigo" id="codigo"><br>

            <label for="serie">Serie</label><br>
            <input type="text" name="serie" id="serie"><br>


            <input type="submit" value="Guardar" name="create">
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

</script>


</html>