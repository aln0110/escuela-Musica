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
                <th>Categoria</th>
                <th>Estado</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                <td>1</td>
                <td>Violin</td>
                <td>Cuerda</td>
                <td>Si</td>
                <td>STFU</td>
        </table>
    </div>
    
    <div>
    <form id="createInstrumentoForm" method="post" action="../business/instrumentosActions.php">
        
    <label for="nombreInstrumento">Nombre del instrumento:</label><br>
    <input type="text" id="nombreInstrumento" name="nombreInstrumento" required><br>

    <label for="categoriaInstrumento">Categoria del instrumento:</label><br>
    <input type="text" id="categoriaInstrumento" name="categoriaInstrumento" required><br>


    <input type="submit" value="Agregar" name="create">
</form>

    </div>
    
</body>
<br><a href="../index.php">index</a>
</html>