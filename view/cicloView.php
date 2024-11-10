<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/view/css/table.css">
    <title>Ciclo view</title>
</head>

<body>
<div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Tipo</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                <th>Estado</th>
                <th>Accion</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include '../business/cicloBusiness.php';
            $cicloBusiness = new CicloBusiness();
            $ciclos = $cicloBusiness->getCiclos();
            foreach ($ciclos as $ciclo) {
                echo "<tr>";
                echo "<td>" . $ciclo->getIdCiclo() . "</td>";
                echo "<td>" . $ciclo->getNombreCiclo() . "</td>";
                echo "<td>" . $ciclo->getDescripcionCiclo() . "</td>";
                echo "<td>" . $ciclo->getTipoCiclo() . "</td>";
                echo "<td>" . $ciclo->getFechaInicioCiclo() . "</td>";
                echo "<td>" . $ciclo->getFechaFinCiclo() . "</td>";

                echo "<td>";
                if ($ciclo->getEstadoCiclo() == 1) {
                    echo "Activo";
                } else {
                    echo "Inactivo";
                }
                echo "</td>";

                echo "<td>";
                echo "<form method='post' action='../business/cicloActions.php' style='display:inline;'>";
                echo "<input type='hidden' name='idCiclo' value='" . $ciclo->getIdCiclo() . "'>";
                echo "<input type='submit' value='Eliminar' name='delete'>";
                echo "</form>";

                echo "<form method='get' action='cicloEdit.php' style='display:inline;'>";
                echo "<input type='hidden' name='idCiclo' value='" . $ciclo->getIdCiclo() . "'>";
                echo "<input type='submit' value='Editar' name='update'>";
                echo "</form>";
                echo "</td>";

                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
    <div>

        <form id="createForm" method="post" enctype="multipart/form-data" action="../business/cicloActions.php">

            <label for="nombre">Nombre</label><br>
            <input type="text" name="nombre" required><br>

            <label for="descripcion">Descripcion</label><br>
            <input type="text" name="descripcion" required><br>

            <label for="Tipo">Tipo de curso</label><br>
            <select name="tipo" id="tipo" required>
                <option value="trismestral">Trimestral</option>
                <option value="cuatrimestral">Cuatrimestral</option>
                <option value="semestral">Semestral</option>
            </select><br>

            <label for="fechaInicio">Fecha de inicio</label><br>
            <input type="date" name="fechaInicio" id="fechaInicio" required><br>

            <label for="fechaFin">Fecha de fin</label><br>
            <input type="date" name="fechaFin" id="fechaFin" required><br>

            <input type="submit" value="Crear" name="create">
        </form>
    </div>

    <script>

    const fechaInicio = document.getElementById('fechaIniciojunta');
    const fechaFin = document.getElementById('fechaFinjunta');


    fechaInicio.addEventListener('change', function() {

        fechaFin.setAttribute('min', fechaInicio.value);
    });

    fechaFin.addEventListener('change', function() {

        if (fechaFin.value < fechaInicio.value) {
            fechaFin.value = fechaInicio.value;
        }
    });
</script>

</body>

<br><a href="../index.php">index</a>

</html>