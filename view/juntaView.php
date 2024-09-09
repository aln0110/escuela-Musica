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
                <th>Indentificacion</th>
                <th>Cedula</th>
                <th>Puesto</th>
                <th>Correo</th>
                <th>Telefono</th>
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
                    echo "<td>" . $junta->getIdentificacionjunta() . "</td>";
                    echo "<td>" . $junta->getCedulajunta() . "</td>";
                    echo "<td>" . $junta->getJuntapuesto() . "</td>";
                    echo "<td>" . $junta->getCorreo() . "</td>";
                    echo "<td>" . $junta->getTelefono() . "</td>";
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
                    echo "<form method='post' action='../business/juntaActions.php' style='display:inline;'> ";
                    echo "<input type='hidden' name='idjunta' value='" . $junta->getIdjunta() . "'>";
                    echo "<input type='submit' value='Eliminar' name='delete'>";
                    echo "</form>";

                    echo "<form method='get' action='editJunta.php' style='display:inline;'>";
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
        <h1>Tabla de puestos</h1>
        <table>
            <thead>
                <th>Presidente</th>
                <th>Vicepresidente</th>
                <th>Secretario</th>
                <th>Tesorero</th>
                <th>Vocal</th>
                <th>Padre</th>
            </thead>
            <tbody>
                <?php

                $juntaBusiness = new JuntaBusiness();
                $juntas = $juntaBusiness->getJuntas(); 
                $presidente="No disponible";
                $vicepresidente="No disponible";
                $secretario="No disponible";
                $tesorero="No disponible";
                $vocal="No disponible";
                $padre="No disponible";

                foreach ($juntas as $junta) {

                    if ($junta->getJuntapuesto() == "Presidente" && $junta->getJuntaactivo() == 1) {
                        $presidente= $junta->getNombrejunta();
                    } 

                    if ($junta->getJuntapuesto() == "Vicepresidente" && $junta->getJuntaactivo() == 1) {
                        $vicepresidente= $junta->getNombrejunta();
                    }

                    if ($junta->getJuntapuesto() == "Secretario" && $junta->getJuntaactivo() == 1) {
                        $secretario= $junta->getNombrejunta();
                    } 

                    if ($junta->getJuntapuesto() == "Tesorero" && $junta->getJuntaactivo() == 1) {
                        $tesorero= $junta->getNombrejunta();
                    } 

                    if ($junta->getJuntapuesto() == "Vocal" && $junta->getJuntaactivo() == 1) {
                        $vocal= $junta->getNombrejunta();
                    }

                    if ($junta->getJuntapuesto() == "Padre" && $junta->getJuntaactivo() == 1) {
                        $padre= $junta->getNombrejunta();
                    }
                }
                echo "<tr>";
                echo "<td>" . $presidente . "</td>";
                echo "<td>" . $vicepresidente . "</td>";
                echo "<td>" . $secretario . "</td>";
                echo "<td>" . $tesorero . "</td>";
                echo "<td>" . $vocal . "</td>";
                echo "<td>" . $padre . "</td>";
                echo "</tr>";


                ?>
                
            </tbody>
        </table>
        
        
    </div>


    <div>
    <form id="createForm" method="post" enctype="multipart/form-data" action="../business/juntaActions.php">
            <label for="nombre"> Nombre</label><br>
            <input type="text" name="nombrejunta" required><br>

            <label for="indentificacion">Tipo de identificacion</label><br>
            <select name="tipoIdentificacion" id="tipoIdentificacion">
                <option value="Cedula">Cedula</option>
                <option value="Pasaporte">Pasaporte</option>
                <option value="Dimex">Dimex</option>
            </select><br>

            <label for="cedula">Cedula</label><br>
            <input type="text" name="cedulajunta" required><br>

            <label for="puesto">Puesto</label><br>
            <select name="juntapuesto" id="juntapuesto">
                <option value="Presidente">Presidente</option>
                <option value="Vicepresidente">Vicepresidente</option>
                <option value="Secretario">Secretario</option>
                <option value="Tesorero">Tesorero</option>
                <option value="Vocal">Vocal</option>
                <option value="Padre">Padre</option>
            </select><br>

            <label for="Correo">Correo</label><br>
            <input type="email" name="correo" required><br>

            <label for="Telefono">Telefono</label><br>
            <input type="text" name="telefono" required><br>

            <label for="fechaInicio">Fecha inicio</label><br>
            <input type="date" id="fechaIniciojunta" name="fechaIniciojunta" required><br>

            <label for="fechaFin">Fecha fin</label><br>
            <input type="date" id="fechaFinjunta" name="fechaFinjunta" required><br>

            <input type="submit" value="Crear" name="create"><br>
        </form><br>
        <a href="../index.php">index</a>


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