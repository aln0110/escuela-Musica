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
                <td>1</td>
                <td>Carlos</td>
                <td>Sanchez</td>
                <td>123456789</td>
                <td>Activo</td>
                <td>algo</td>
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
            <input type="text" name="cedulajunta" required><br>

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