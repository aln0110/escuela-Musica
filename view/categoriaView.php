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
                <th>Estado</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                <?php
                include '../business/categoriaBusiness.php';
                $categoriaBusiness = new categoriaBusiness();
                $categorias = $categoriaBusiness->getCategorias();

                foreach ($categorias as $categoria) {
                    echo "<tr>";
                    echo "<td>" . $categoria->getId() . "</td>";
                    echo "<td>" . $categoria->getNombre() . "</td>";

                    echo "<td>";
                    if ($categoria->getEstado() == 1) {
                        echo "Activo";
                    } else {
                        echo "Inactivo";
                    }
                    echo "</td>";

                    echo "<td>";
                    echo "<form method='post' action='../business/categoriaActions.php' style='display:inline;'>";
                    echo "<input type='hidden' name='id' value='" . $categoria->getId() . "'>";
                    echo "<input type='submit' value='Eliminar' name='delete'>";
                    echo "</form>";

                    echo "<form method='get' action='categoriaEdit.php' style='display:inline;'>";
                    echo "<input type='hidden' name='id' value='" . $categoria->getId() . "'>";
                    echo "<input type='submit' value='Editar' name='edit'>";
                    echo "</form>";

                    echo "</td>";

                    echo "</tr>";

                }

                ?>

            </tbody>
        </table>
    </div>

    <div>

        <form id="createForm" method="post" enctype="multipart/form-data" action="../business/categoriaActions.php">
            <label for="nombreCategoria">Nombre de la categoria</label><br>
            <input type="text" name="nombre">
            <input type="submit" value="Agregar" name="create">

        </form>
    </div>

</body>
<br><a href="../index.php">index</a>

</html>