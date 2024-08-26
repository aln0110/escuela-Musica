<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/view/css/table.css">
    <title>Escuela View</title>
</head>
<body>
    <div>
        <table>
            <thead>
                <th>ID</th>
                <th>Nombre</th>
                <th>Cedula Juridica</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th>Estado</th>
                <th>Accion</th>
            </thead>
            <tbody id="recordsTableBody">
                <?php
                    include '../business/escuelaBusiness.php';
                    $escuelaBusiness = new EscuelaBusiness();
                    $escuelas = $escuelaBusiness->getEscuelas();
                    foreach ($escuelas as $escuela) {
                        echo "<tr>";
                        echo "<td>" . $escuela->getIdEscuelaMusica() . "</td>";
                        echo "<td>" . $escuela->getNombre() . "</td>";
                        echo "<td>" . $escuela->getCedulaJuridica() . "</td>";
                        echo "<td>" . $escuela->getCorreo() . "</td>";
                        echo "<td>" . $escuela->getTelefono() . "</td>";
                        echo "<td>";
                        if ($escuela->getEstado() == 1) {
                            echo "Activo";
                        } elseif ($escuela->getEstado() == 0) {
                            echo "Inactivo";
                        }
                        echo "</td>";
                        echo "<td>";
                        echo "<form method='post' action='../business/escuelaActions.php'>";
                        echo "<input type='hidden' name='idEscuelaMusica' value='" . $escuela->getIdEscuelaMusica() . "'>";
                        echo "<input type='submit' value='Eliminar' name='delete'>";
                        echo "</form>";
                        echo "<form method='get' action='editEscuelaView.php'>";
                        echo "<input type='hidden' name='id' value='" . $escuela->getIdEscuelaMusica() . "'>";
                        echo "<input type='submit' value='Editar'>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";
                    }
                ?>  
            </tbody>
        </table>
    </div>

    <div>   
        <form id="createForm" method="post" enctype="multipart/form-data" action="../business/escuelaActions.php">


            <label for="nombre">Nombre</label> <br>
            <input type="text" name="nombre" id="nombre" required><br>

            <label for="cedulaJuridica">Cedula Juridica</label><br>
            <input type="text" name="cedulaJuridica" id="cedulaJuridica"><br>

            <label for="correo">Correo</label><br>
            <input type="text" name="correo" id="correo"><br>

            <label for="telefono">Telefono</label><br>
            <input type="text" name="telefono" id="telefono"><br>


            <label for="estado">Estado</label>
            <select name="estado" id="estado">
                <option value="true">Verdadero</option>
                <option value="false">Falso</option>
            </select> <br>
        
            <input type="submit" value="Crear" name="create">
            
        </form><br>
        <a href="../index.php">index</a>
    </div>

</body>
</html>
