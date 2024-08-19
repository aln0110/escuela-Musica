<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/view/css/table.css">
    <title>Junta crear</title>
</head>

<body>
    <div>
        <table>
            <thead>
                <th>ID</th>
                <th>Nombre</th>
                <th>Cedula</th>
                <th>Puesto</th>
                <th>Fecha inicio</th>
                <th>Fecha fin</th>
                <th>Estado</th>
                <th>Accion</th>
            </thead>
            <tbody>
                <?php
                include '../business/juntaBusiness.php';
                $juntaBusiness = new JuntaBusiness();
                $juntas = $juntaBusiness->getJuntas();
                foreach ($juntas as $junta) {
                    echo "<tr>";
                    echo "<td>" . $junta->getIdjunta() . "</td>";
                    echo "<td>" . $junta->getNombrejunta() . "</td>";
                    echo "<td>" . $junta->getCedulajunta() . "</td>";
                    echo "<td>" . $junta->getJuntapuesto() . "</td>";
                    echo "<td>" . $junta->getFechainiciojunta() . "</td>";
                    echo "<td>" . $junta->getFechafinaljunta() . "</td>";

                    echo "<td>";
                    if ($junta->getJuntaactivo() == 1) {
                        echo "Activo";
                    } else {
                        echo "Inactivo";
                    }
                    echo "</td>";

                    echo "<td>";
                    echo "<form method='post' action='../business/juntaActions.php'>";
                    echo "<input type='hidden' name='idjunta' value='" . $junta->getIdjunta() . "'>";
                    echo "<input type='submit' value='Eliminar' name='delete'>";
                    echo "</form>";

                    echo "<form method='get' action='editJunta.php'>";
                    echo "<input type='hidden' name='idjunta' value='" . $junta->getIdjunta() . "'>";
                    echo "<input type='submit' value='Editar' name='edit'>";
                    echo "</form>";

                    echo "</td>";


                }

                ?>

            </tbody>

        </table>
    </div>


    <div>
        <form id="createForm" method="post" enctype="multipart/form-data" action="../business/juntaActions.php">
            <label for="nombre"> Nombre</label><br>
            <input type="text" name="nombrejunta" required><br>

            <label for="cedula">Cedula</label><br>
            <input type="text" name="cedulajunta" required><br>

            <label for="puesto">Puesto</label><br>
            <input type="text" name="juntapuesto" required><br>

            <label for="fechaInicio">Fecha inicio</label><br>
            <input type="date" name="fechaIniciojunta" required><br>

            <label for="fechaFin">Fecha fin</label><br>
            <input type="date" name="fechaFinjunta" required><br>

            <label for="estado">Estado</label><br>
            <select name="juntaestado" id="estado">
                <option value="true">Verdadero</option>
                <option value="false">Falso</option>
            </select><br>

            <input type="submit" value="Crear" name="create"><br>

        </form>

    </div>


</body>

</html>