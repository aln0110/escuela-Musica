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
                <th>Estado</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                <td>1</td>
                <td>Clasica</td>
                <td>Si</td>
                <td>STFU</td>
            </tbody>
        </table>
    </div>

    <div>

        <form id="createForm" method="post" enctype="multipart/form-data" action="../business/categoriaActions.php">
            <label for="nombreCategoria">Nombre de la categoria</label><br>
            <input type="text" name="nombre">
            <input type="submit" value="Agregar" name="create">

        </form>
    </div>

</body>
<br><a href="../index.php">index</a>

</html>