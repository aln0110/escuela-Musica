<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/view/css/table.css">
    <title>Document</title>
</head>

<body>
    <div>
        <table>
            <thead>
                <th>ID</th>
                <th>Nombre</th>
                <th>Categoria</th>
                <th>Estado</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                <?php
                include '../business/instrumentosBusiness.php';
                $instrumentosBusiness = new instrumentosBusiness();
                $instrumentos = $instrumentosBusiness->getInstrumentos();

                foreach ($instrumentos as $instrumento) {
                    echo "<tr>";
                    echo "<td>" . $instrumento->getId() . "</td>";
                    echo "<td>" . $instrumento->getNombre() . "</td>";
                    echo "<td>" . $instrumento->getCategoria() . "</td>";

                    echo "<td>";
                    if ($instrumento->getEstado() == 1) {
                        echo "Activo";
                    } else {
                        echo "Inactivo";
                    }
                    echo "</td>";


                    echo "<td>";
                    echo "<form method='post' action='../business/instrumentosActions.php' style='display:inline;'>";
                    echo "<input type='hidden' name='id' value='" . $instrumento->getId() . "'>";
                    echo "<input type='submit' value='Eliminar' name='delete'>";
                    echo "</form>";
                    
                    echo "<form method='get' action='instrumentosEdit.php' style='display:inline;'>";
                    echo "<input type='hidden' name='id' value='" . $instrumento->getId() . "'>";
                    echo "<input type='submit' value='Editar' name='edit'>";
                    echo "</form>";


                    echo "</tr>";
                }


                ?>

            </tbody>
        </table>
    </div>

    <div>
        <form id="createInstrumentoForm" method="post" action="../business/instrumentosActions.php">
            <label for="nombreInstrumento">Nombre del instrumento:</label><br>
            <input type="text" id="nombreInstrumento" name="nombreInstrumento" required><br>

            <label for="categoriaInstrumento">Categoria del instrumento:</label><br>
            <input type="text" id="categoriaInstrumento" name="categoriaInstrumento" required><br>


            <input type="submit" value="Agregar" name="create">
        </form>

    </div>

</body>
<br><a href="../index.php">index</a>

</html>