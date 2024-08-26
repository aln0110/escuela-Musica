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
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Tipo</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                <th>Estado</th>
            </thead>
            <tbody>
                <td>Holi</td>
                <td>Jiji</td>
            </tbody>
        </table>
    </div>
    <div>

        <form id="createForm" method="post"  enctype="multipart/form-data" action="../business/cicloActions.php">

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
            <input type="date" name="fechaInicio" required><br>

            <label for="fechaFin">Fecha de fin</label><br>
            <input type="date" name="fechaFin" required><br>

            <label for="estado">Estado</label><br>
            <select name="estado" id="estado">
                <option value="true">Verdadero</option>
                <option value="false">Falso</option>
            </select><br>
            <input type="submit" value="Crear" name="create">
        </form>
    </div>

</body>

<br><a href="../index.php">index</a>

</html>