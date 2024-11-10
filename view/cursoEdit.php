<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit estudainte</title>
</head>

<body>
    <div>
        <form id="createForm" action="../business/cursoActions.php" method="post"  enctype="multipart/form-data">

            <?php
            include_once '../business/cursoBusiness.php';
            include_once  '../domain/curso.php';

            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $cursoBusiness = new CursoBusiness();
                $curso = $cursoBusiness->getCurso($id);
            }

            echo "<input type='hidden' name='idCurso' value='" . $curso->getId() . "'>";

            echo "<label for='nombre'>Nombre</label><br>";
            echo "<input type='text' id='nombre' name='nombre' value='" . $curso->getNombre() . "' required><br>";

            echo "<label for='siglas'>Siglas</label><br>";
            echo "<input type='text' id='siglas' name='siglas' value='" . $curso->getSiglas() . "' required><br>";

            echo "<label for='requisito'>Requisito</label><br>";
            echo "<input type='text' id='requisito' name='requisito' value='" . $curso->getRequisito() . "' required><br>";

            echo "<label for='corequisito'>Corequisito</label><br>";
            echo "<input type='text' id='corequisito' name='corequisito' value='" . $curso->getCorequisito() . "' required><br>";

            echo "<label for='creditos'>Creditos</label><br>";
            echo "<input type='number' id='creditos' name='creditos' value='" . $curso->getCreditos() . "' required><br>";

            ?>
            <label for="horaInicio">Hora de inicio</label><br>
            <input type="time" id="horaInicio" name="horaInicio" required><br>

            <label for="horaFin">Hora del final</label><br>
            <input type="time" id="horaFin" name="horaFin" required><br>



            <input type="submit" value="Actualizar" name="update"><br>
        </form>
    </div>

</body>

</html>