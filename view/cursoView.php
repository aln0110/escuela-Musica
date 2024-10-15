<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/view/css/table.css">
    <title>Curso</title>
</head>
<body>
    <div>
        <table>
            <thead>
            <th>ID</th>
            <th>Nombre</th>
            <th>Sigla</th>
            <th>Creditos</th>
            <th>Activo</th>
            <th>Acciones</th>
            </thead>
            <tbody>
            <?php
            include '../business/cursoBusiness.php';
            $cursoBusiness = new cursoBusiness();
            $cursos = $cursoBusiness->getCursos();
            
            foreach ($cursos as $curso) {
                echo "<tr>";
                echo "<td>" . $curso->getId() . "</td>";
                echo "<td>" . $curso->getNombre() . "</td>";
                echo "<td>" . $curso->getSiglas() . "</td>";
                echo "<td>" . $curso->getCreditos() . "</td>";
                echo "<td>" . ($curso->getEstado() ? 'Activo' : 'Inactivo') . "</td>";
                echo "<td>";
                echo "<form method='get' action='cursoEdit.php' style='display:inline;'> ";
                echo "<input type='hidden' name='id' value='" . $curso->getId() . "'>";
                echo "<input type='submit' value='Actualizar' name='update'>";
                echo "</form>";
                echo "<form method='post' action='../business/cursoActions.php' style='display:inline;'> ";
                echo "<input type='hidden' name='id' value='" . $curso->getId() . "'>";
                echo "<input type='submit' value='Eliminar' name='delete'>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
        
            ?>

            </tbody>
        </table>
    </div>

    <div>
        <form id="createForm" action="../business/cursoActions.php" method="post"  enctype="multipart/form-data">


            <label for="nombre">Nombre</label><br>
            <input type="text" id="nombre" name="nombre" required><br>

            <label for="siglas">Siglas</label><br>
            <input type="text" id="siglas" name="siglas" required><br>

            <label for="requisito">Requisito</label><br>
            <input type="text" id="requisito" name="requisito" required><br>

            <label for="corequisito">Corequisito</label><br>
            <input type="text" id="corequisito" name="corequisito" required><br>
            
            <label for="creditos">Creditos</label><br>
            <input type="number" id="creditos" name="creditos" required><br>

            
            <input type="submit" value="Crear" name="create">
        </form>
    </div>
    <br>
    <a href="../index.php">index</a>
</body>
</html>