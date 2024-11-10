<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <form id="createForm" method="post" enctype="multipart/form-data" action="../business/estudianteActions.php">
            <?php
            include_once "../business/estduianteBusiness.php";
            include_once "../domain/estudiante.php";

            $estudianteBusiness = new EstudianteBusiness();
            $estudiante = new Estudiante();

            if (isset($_GET['idEstudiante'])) {
                $estudiante = $estudianteBusiness->getEstudiante($_GET['idEstudiante']);
            }
            echo "<input type='hidden' name='idEstudiante' value='" . $estudiante->getId() . "'>";
            echo "<label for='nombre'>Nombre</label><br>";
            echo "<input type='text' name='nombre' value='" . $estudiante->getNombre() . "'><br>";

            echo "<label for='apellido'>Apellido</label><br>";
            echo "<input type='text' name='apellido' value='" . $estudiante->getApellido() . "'><br>";

            echo "<label for='telefono'>Telefono</label><br>";
            echo "<input type='text' name='telefono' value='" . $estudiante->getTelefono() . "'><br>";

            echo "<label for='correo'>Correo</label><br>";
            echo "<input type='email' name='correo' value='" . $estudiante->getCorreo() . "'><br>";

            echo "<label for='direccion'>Direccion</label><br>";
            echo "<input type='text' name='direccion' value='" . $estudiante->getDireccion() . "'><br>";

            echo "<label for='indentificacion'>Tipo de identificacion</label><br>";
            echo "<select name=\"tipoIdentificacion\" id=\"tipoIdentificacion\">";
            echo "    <option value=\"Cedula\">Cedula</option>";
            echo "    <option value=\"Pasaporte\">Pasaporte</option>";
            echo "    <option value=\"Dimex\">Dimex</option>";
            echo "</select><br>";

            echo "<label for='cedula'>Cedula</label><br>";
            echo "<input type='text' name='cedula' value='" . $estudiante->getCedula() . "'><br>";

            ?>

            <label for="fechaNacimiento">Fecha de nacimiento</label><br>
            <input type="date" id="fechaNacimiento" name="fechaNacimiento" required><br>


            <input type="submit" value="Actualizar" name="update"><br>


        </form>
    </div>

</body>
<script>

        const today = new Date().toISOString().split('T')[0];
        document.getElementById('fechaNacimiento').setAttribute('max', today);
    </script>

</html>