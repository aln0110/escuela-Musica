<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <form id="createForm" method="post" enctype="multipart/form-data" action="../business/categoriaActions.php">
            <?php
            require_once '../business/categoriaBusiness.php';
            require_once '../domain/categoria.php';

            $categoriaBusiness = new categoriaBusiness();

            if (isset($_GET['id'])) {
                $categoria = $categoriaBusiness->getCategoria($_GET['id']);
            }

            echo "<input type='hidden' name='id' value='" . $categoria->getId() . "'>"; 

            echo "<label for='nombreCategoria'>Nombre de la categoria</label><br>";
            echo "<input type='text' name='nombre' value='" . $categoria->getNombre() . "'> <br>";
            ?>
            <label for="estado">Estado</label>
            <select name="estado">
                <option value="1">Activo</option>
                <option value="0">Inactivo</option>
            </select>


        <input type='submit' value='Actualizar' name='update'>
        </form>

    </div>
    
</body>
</html>