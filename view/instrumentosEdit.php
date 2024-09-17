<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <form id="createInstrumentoForm" method="post" action="../business/instrumentosActions.php">
            <?php
            require_once '../business/instrumentosBusiness.php';
            require_once '../domain/instrumentos.php';

            $instrumentosBusiness = new instrumentosBusiness();

            if (isset($_GET['id'])) {
                $instrumentos = $instrumentosBusiness->getInstrumento($_GET['id']);
            }

            echo "<input type='hidden' name='id' value='" . $instrumentos->getId() . "'>"; 

            echo "<label for='nombreInstrumento'>Nombre del instrumento:</label><br>";
            echo "<input type='text' name='nombreInstrumento' value='" . $instrumentos->getNombre() . "' required><br>";

            echo "<label for='categoriaInstrumento'>Categoria del instrumento:</label><br>";
            echo "<input type='text' name='categoriaInstrumento' value='" . $instrumentos->getCategoria() . "' required><br>";
            
            ?>
            <input type="submit" value="Actualizar" name="update">
        </form>
    </div>
    
</body>
</html>