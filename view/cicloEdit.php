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

            ?>

            <label for='fechaInicio'>Fecha inicio:</label><br>
            <input type='date' name='fechaInicio' id='fechaInicio' required><br>

            <label for='fechaFin'>Fecha fin:</label><br>
            <input type='date' name='fechaFin' id='fechaFin' required> <br>

            <label for='estado'>Estado:</label> <br>
            <select name=estado id="estado">";
                <option value="true">Verdadero</option>";
                <option value="false">Falso</option>";
            </select> <br>

            <input type='submit' value='Actualizar' name='update'>
            <br>




        </form>
    </div>

    <script>
        const today = new Date().toISOString().split('T')[0];


        const fechaInicio = document.getElementById('fechaInicio');
        fechaInicio.setAttribute('max', today);


        const fechaFin = document.getElementById('fechaFin');
        fechaFin.setAttribute('min', today);
    </script>

</body>

</html>