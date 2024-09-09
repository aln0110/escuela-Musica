<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit junta</title>
</head>
<body>
<div>
        <form id="createForm" method="post" enctype="multipart/form-data" action="../business/juntaActions.php">
            <?php
            
            require_once '../business/juntaBusiness.php';
            require_once '../domain/junta.php';

            $juntaBusiness = new JuntaBusiness();
            $junta =  new Junta();

            if (isset($_GET['idjunta'])) {
            $junta = $juntaBusiness->getJunta($_GET['idjunta']);
            }
            
            echo "<input type='hidden' name='idjunta' value='" . $junta->getIdjunta() . "'>"; echo "<br>";

            echo "<label for='nombrejunta'>Nombre:</label>"; echo "<br>";
            echo "<input type='text' name='nombrejunta' value='" . $junta->getNombrejunta() . "' required>"; echo "<br>";

            echo "<label for='indentificacion'>Tipo de identificacion</label><br>";
            echo "<select name=\"tipoIdentificacion\" id=\"tipoIdentificacion\">";
            echo "    <option value=\"Cedula\">Cedula</option>";
            echo "    <option value=\"Pasaporte\">Pasaporte</option>";
            echo "    <option value=\"Dimex\">Dimex</option>";
            echo "</select><br>";

            echo "<label for='cedulajunta'>Cedula:</label>"; echo "<br>";
            echo "<input type='text' name='cedulajunta' value='" . $junta->getCedulajunta() . "' required>"; echo "<br>";

            echo "<label for='juntapuesto'>Puesto:</label>"; echo "<br>";
            echo "<select name=\"juntapuesto\" id=\"juntapuesto\">";
            echo "    <option value=\"Presidente\">Presidente</option>";
            echo "    <option value=\"Vicepresidente\">Vicepresidente</option>";
            echo "    <option value=\"Secretario\">Secretario</option>";
            echo "    <option value=\"Tesorero\">Tesorero</option>";
            echo "    <option value=\"Vocal\">Vocal</option>";
            echo "    <option value=\"Padre\">Padre</option>";
            echo "</select><br>";

            echo "<label for='correo'>Correo:</label>"; echo "<br>";
            echo "<input type='email' name='correo' value='" . $junta->getCorreo() . "' required>"; echo "<br>";

            echo "<label for='telefono'>Telefono:</label>"; echo "<br>";
            echo "<input type='text' name='telefono' value='" . $junta->getTelefono() . "' required>"; echo "<br>";

            ?>
            <label for="fechaInicio">Fecha inicio</label><br>
            <input type="date" id="fechaIniciojunta" name="fechaIniciojunta" required><br>

            <label for="fechaFin">Fecha fin</label><br>
            <input type="date" id="fechaFinjunta" name="fechaFinjunta" required><br>


            <input type='submit' value='Actualizar' name='update'> <br>
         
        </form>

    </div>
    <script>

        const today = new Date().toISOString().split('T')[0];


        const fechaInicio = document.getElementById('fechaIniciojunta');
        fechaInicio.setAttribute('max', today); 


        const fechaFin = document.getElementById('fechaFinjunta');
        fechaFin.setAttribute('min', today); 
    </script>

    
</body>
</html>