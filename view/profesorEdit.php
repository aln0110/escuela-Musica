<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <form id="createForm" action="../business/profesorActions.php" method="post" enctype="multipart/form-data">
            <?php
            include_once '../business/profesorBusiness.php';
            include_once '../domain/profesor.php';

            if (isset($_GET['idProfesor'])) {
                $id = $_GET['idProfesor'];
                $profesorBusiness = new ProfesorBusiness();
                $profesor = $profesorBusiness->getProfesor($id);
            }

            echo "<input type='hidden' name='idProfesor' value='" . $profesor->getId() . "'>";

            echo "<label for='nombre'>Nombre</label><br>";
            echo "<input type='text' id='nombre' name='nombre' value='" . $profesor->getNombre() . "' required><br>";

            echo "<label for='apellido'>Apellido</label><br>";
            echo "<input type='text' id='apellido' name='apellido' value='" . $profesor->getApellido() . "' required><br>";

            echo "<label for='indentificacion'>Tipo de identificacion</label><br>";
            echo "<select name=\"tipoIdentificacion\" id=\"tipoIdentificacion\">";
            echo "    <option value=\"Cedula\">Cedula</option>";
            echo "    <option value=\"Pasaporte\">Pasaporte</option>";
            echo "    <option value=\"Dimex\">Dimex</option>";
            echo "</select><br>";

            echo "<label for='cedula'>Cedula</label><br>";
            echo "<input type='text' id='cedula' name='cedula' value='" . $profesor->getCedula() . "' required><br>";

            echo "<label for='correo'>Correo</label><br>";
            echo "<input type='email' id='correo' name='correo' value='" . $profesor->getCorreo() . "' required><br>";

            echo "<label for='telefono'>Telefono</label><br>";
            echo "<input type='text' id='telefono' name='telefono' value='" . $profesor->getTelefono() . "' required><br>";

            echo "<label for='direccion'>Direccion</label><br>";
            echo "<input type='text' id='direccion' name='direccion' value='" . $profesor->getDireccion() . "' required><br>";

            echo " <label for='Iban'>Iban</label><br>";
            echo "<input type='text' id='iban' name='iban' value='" . $profesor->getIban() . "' required><br>";



            ?>


            <input type="submit" value="Actualizar" name="update"><br>
        </form>
    </div>

</body>

</html>