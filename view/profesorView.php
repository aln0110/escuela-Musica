<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/view/css/table.css">
    <title>Document</title>
</head>
<body>
    <div>
        <table>
            <thead>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Tipo de indetificacion</th>
                <th>Cedula</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                <th>1</th>
                <th>Carlos</th>
                <th>Jimenez</th>
                <th>cedula</th>
                <th>123456789</th>
                <th>a@a.com</th>
                <th>12345678</th>
                <th></th>
            </tbody>
        </table>
    </div>
    
    <div>
        <form id="createForm" action="../business/profesorActions.php" method="post"  enctype="multipart/form-data">
            <label for="nombre">Nombre</label><br>
            <input type="text" id="nombre" name="nombre" required><br>

            <label for="apellido">Apellido</label><br>
            <input type="text" id="apellido" name="apellido" required><br>

            <label for="indentificacion">Tipo de identificacion</label><br>
            <select name="tipoIdentificacion" id="tipoIdentificacion">
                <option value="Cedula">Cedula</option>
                <option value="Pasaporte">Pasaporte</option>
                <option value="Dimex">Dimex</option>
            </select><br>

            <label for="cedula">Cedula</label><br>
            <input type="text" id="cedula" name="cedula" required><br>

            <label for="correo">Correo</label><br>
            <input type="email" id="correo" name="correo" required><br>

            <label for="telefono">Telefono</label><br>
            <input type="text" id="telefono" name="telefono" required><br>

            <label for="direccion">Direccion</label><br>
            <input type="text" id="direccion" name="direccion" required><br>

            <label for="Iban">Iban</label><br>
            <input type="text" id="iban" name="iban" required><br>



            <input type="submit" value="Crear" name="create"><br>
        </form>
    </div>

<a href="../index.php">index</a>
</body>
</html>