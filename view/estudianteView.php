<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/view/css/table.css">
    <title>Estudiantes</title>
</head>
<body>
    <div>
        <table>
            <thead>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Cedula</th>
                <th>Estado</th>
                <th>Acciones</th>
            </thead>
            <tbody>

                <?php
                include "../business/estduianteBusiness.php";
                $estudianteBusiness = new EstudianteBusiness();
                $estudiantes = $estudianteBusiness->getEstudiantes();

                foreach ($estudiantes as $estudiante) {
                    echo "<tr>";
                    echo "<td>" . $estudiante->getId() . "</td>";
                    echo "<td>" . $estudiante->getNombre() . "</td>";
                    echo "<td>" . $estudiante->getApellido() . "</td>";
                    echo "<td>" . $estudiante->getCedula() . "</td>";
                    echo "<td>" . $estudiante->getEstado() . "</td>";

                    echo "<td>";
                    echo "<form method='post' action='../business/estudianteActions.php' style='display:inline;'> ";
                    echo "<input type='hidden' name='idEstudiante' value='" . $estudiante->getId() . "'>";
                    echo "<input type='submit' value='Eliminar' name='delete'>";
                    echo "</form>";

                    echo "<form method='get' action='estudianteEdit.php' style='display:inline;'>";
                    echo "<input type='hidden' name='idEstudiante' value='" . $estudiante->getId() . "'>";
                    echo "<input type='submit' value='Editar' name='edit'>";
                    echo "</form>";

                    


                     echo "</td>";
                    echo "</tr>";
                }

                ?>
            </tbody>
        </table>
    </div>

    <div>
        <form id="createForm" method="post" enctype="multipart/form-data" action="../business/estudianteActions.php">
            <label for="nombre">Nombre</label><br>
            <input type="text" id="nombre" name="nombre" required><br>

            <label for="apellido">Apellido</label><br>
            <input type="text" id="apellido" name="apellido" required><br>

            <label for="telefono">Telefono</label><br>
            <input type="text" id="telefono" name="telefono" required><br>

            <label for="correo">Correo</label><br>
            <input type="email" id="correo" name="correo" required><br>

            <label for="direccion">Direccion</label><br>
            <input type="text" id="direccion" name="direccion" required><br>

            <label for="indentificacion">Tipo de identificacion</label><br>
            <select name="tipoIdentificacion" id="tipoIdentificacion">
                <option value="Cedula">Cedula</option>
                <option value="Pasaporte">Pasaporte</option>
                <option value="Dimex">Dimex</option>
            </select><br>

            <label for="cedula">Cedula</label><br>
            <input type="text" name="cedula" required><br>

            <label for="fechaNacimiento">Fecha de nacimiento</label><br>
            <input type="date" id="fechaNacimiento" name="fechaNacimiento" required><br>


            <input type="submit" value="Crear" name="create"><br>
        </form>
    </div>
    <a href="../index.php">index</a>
    
</body>

<script>

        const today = new Date().toISOString().split('T')[0];
        document.getElementById('fechaNacimiento').setAttribute('max', today);
    </script>

</html>