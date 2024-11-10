<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar escuela</title>
</head>
<body>
<div>   
        <form id="editForm" method="post" enctype="multipart/form-data" action="../business/escuelaActions.php">
            <?php
            require_once '../business/escuelaBusiness.php';
            require_once '../domain/escuelaMusica.php';
            $escuelaBusiness = new EscuelaBusiness();
            $escuela =  new EscuelaMusica();
            if (isset($_GET['id'])) {
                $escuela = $escuelaBusiness->getEscuela($_GET['id']);
            }

            echo "<input type='hidden' name='idEscuelaMusica' value='" . $escuela->getIdEscuelaMusica() . "'>"; echo "<br>";

            echo "<label for='nombre'>Nombre:</label>"; echo "<br>";
            echo "<input type='text' name='nombre' value='" . $escuela->getNombre() . "' required>"; echo "<br>";

            echo "<label for='cedulaJuridica'>Cedula Juridica:</label>"; echo "<br>";
            echo "<input type='text' name='cedulaJuridica' value='" . $escuela->getCedulaJuridica() . "' required>"; echo "<br>";

            echo "<label for='correo'>Correo:</label>"; echo "<br>";
            echo "<input type='text' name='correo' value='" . $escuela->getCorreo() . "' required>"; echo "<br>";

            echo "<label for='telefono'>Telefono:</label>"; echo "<br>";
            echo "<input type='text' name='telefono' value='" . $escuela->getTelefono() . "' required>"; echo "<br>";

            echo "<label for='estado'>Estado:</label>"; echo "<br>";
            echo "<select name=\"estado\" id=\"estado\">";
            echo "    <option value=\"true\">Verdadero</option>";
            echo "    <option value=\"false\">Falso</option>";
            echo "</select> <br>";

            echo "<input type='submit' value='Actualizar' name='update'>"; echo "<br>";

            ?>


        </form>
    </div>
</body>
</html>
