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

            echo "<label for='cedulajunta'>Cedula:</label>"; echo "<br>";
            echo "<input type='text' name='cedulajunta' value='" . $junta->getCedulajunta() . "' required>"; echo "<br>";

            echo "<label for='juntapuesto'>Puesto:</label>"; echo "<br>";
            echo "<input type='text' name='juntapuesto' value='" . $junta->getJuntapuesto() . "' required>"; echo "<br>";

            echo "<label for='fechainiciojunta'>Fecha inicio:</label>"; echo "<br>";
            echo "<input type='date' name='fechainiciojunta' value='" . $junta->getFechainiciojunta() . "' required>"; echo "<br>";

            echo "<label for='fechafinaljunta'>Fecha final:</label>"; echo "<br>";
            echo "<input type='date' name='fechafinaljunta' value='" . $junta->getFechafinaljunta() . "' required>"; echo "<br>";

            echo "<label for='juntaactivo'>Estado:</label>"; echo "<br>";
            echo "<select name=\"juntaactivo\" id=\"juntaactivo\">";
            echo "    <option value=\"true\">Verdadero</option>";
            echo "    <option value=\"false\">Falso</option>";
            echo "</select> <br>";

            echo "<input type='submit' value='Actualizar' name='update'>"; echo "<br>";
        

            ?>
         
        </form>

    </div>
    
</body>
</html>