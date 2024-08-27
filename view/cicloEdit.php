<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar ciclo</title>
</head>

<body>
    <div>
        <form id="createForm" method="post" enctype="multipart/form-data" action="../business/cicloActions.php">
            <?php

            require_once '../business/cicloBusiness.php';
            require_once '../domain/ciclo.php';

            $cicloBusiness = new CicloBusiness();
            $ciclo =  new Ciclo();

            if (isset($_GET['idCiclo'])) {
                $ciclo = $cicloBusiness->getCiclo($_GET['idCiclo']);
            }


            echo "<input type='hidden' name='idCiclo' value='" . $ciclo->getIdCiclo() . "'>";
            echo "<br>";

            echo "<label for='nombre'>Nombre:</label>";
            echo "<br>";
            echo "<input type='text' name='nombre' value='" . $ciclo->getNombreCiclo() . "' required>";
            echo "<br>";

            echo "<label for='descripcion'>Descripcion:</label>";
            echo "<br>";
            echo "<input type='text' name='descripcion' value='" . $ciclo->getDescripcionCiclo() . "' required>";
            echo "<br>";

            echo "<label for='tipo'>Tipo de cueso</label><br>";
            echo "<select name=\"tipo\" id=\"tipo\">";
            echo "    <option value=\"Anual\">Anual</option>";
            echo "    <option value=\"Semestral\">Semestral</option>";
            echo "    <option value=\"Trimestral\">Trimestral</option>";
            echo "    <option value=\"Bimestral\">Bimestral</option>";
            echo "    <option value=\"Mensual\">Mensual</option>";
            echo "</select><br>";

            echo "<label for='fechaInicio'>Fecha inicio:</label>";
            echo "<br>";
            echo "<input type='date' name='fechaInicio' value='" . $ciclo->getFechaInicioCiclo() . "' required>";
            echo "<br>";

            echo "<label for='fechaFin'>Fecha fin:</label>";
            echo "<br>";
            echo "<input type='date' name='fechaFin' value='" . $ciclo->getFechaFinCiclo() . "' required>";
            echo "<br>";

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