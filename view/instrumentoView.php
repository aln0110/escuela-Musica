<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/view/css/table.css">
    <title>Instrumento</title>
</head>

<body>
    <div>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>tipo</th>
                    <th>instruemento</th>
                    <th>marca</th>
                    <th>codigo</th>
                    <th>serie</th>
                    <th>uso</th>
                    <th>activo</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "../business/instrumentoBusiness.php";
                $instrumentoBusiness = new InstrumentoBusiness();
                $instrumentos = $instrumentoBusiness->getInstrumentos();
                foreach ($instrumentos as $instrumento) {
                    echo "<tr>";
                    echo "<td>" . $instrumento->getId() . "</td>";
                    echo "<td>" . $instrumento->getTipo() . "</td>";
                    echo "<td>" . $instrumento->getInstrumento() . "</td>";
                    echo "<td>" . $instrumento->getMarca() . "</td>";
                    echo "<td>" . $instrumento->getCodigo() . "</td>";
                    echo "<td>" . $instrumento->getSerie() . "</td>";
                    echo "<td>" . ($instrumento->getUso() ? 'Sí' : 'No') . "</td>";
                    echo "<td>" . ($instrumento->getActivo() ? 'Activo' : 'Inactivo') . "</td>";

                    echo "<td>";
                    echo "<form action='../business/instrumentoActions.php' method='post' style='display:inline;'>";
                    echo "<input type='hidden' name='id' value='" . $instrumento->getId() . "'>";
                    echo "<input type='submit' value='Delete' name='delete'>";
                    echo "</form>";

                    echo "<form action='instrumentoEdit.php' method='get' style='display:inline;'>";
                    echo "<input type='hidden' name='id' value='" . $instrumento->getId() . "'>";
                    echo "<input type='submit' value='Editar' name='update'>";
                    echo "</form>";

                    
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
                
            </tbody>
        </table>

    </div>

    <div>
        <form id=createForm enctype="multipart/form-data" action="../business/instrumentoActions.php" method="post">

            <label for="tipo">Seleccione la categoría del instrumento</label><br>
            <select name="tipo" id="tipo">
                <option value="">Seleccione una categoría</option>
                <option value="percussion" <?php if (isset($_POST['tipo']) && $_POST['tipo'] == 'percussion') echo 'selected'; ?>>Percusión</option>
                <option value="woodwind" <?php if (isset($_POST['tipo']) && $_POST['tipo'] == 'woodwind') echo 'selected'; ?>>Viento madera</option>
                <option value="brass" <?php if (isset($_POST['tipo']) && $_POST['tipo'] == 'brass') echo 'selected'; ?>>Brass</option>
            </select><br>


            <label for="instrumento">Seleccione el instrumento</label><br>

            <select name="instrumento" id="instrumento">
                <option value="">Seleccione un instrumento</option>

                <?php
                if (isset($_POST['tipo'])) {
                    $tipo = $_POST['tipo'];
                    $instruments = [
                        'percussion' => ["Snare Drum", "Tenor Drums", "Bass Drum", "Platillos"],
                        'woodwind' => ["Flauta", "Piccolo", "Clarinete", "Saxofón alto", "Saxofón tenor", "Saxofón barítono"],
                        'brass' => ["Trompeta", "Trombón", "Tuba", "Melófono"]
                    ];

                    if (array_key_exists($tipo, $instruments)) {
                        foreach ($instruments[$tipo] as $instrument) {
                            echo "<option value='" . strtolower($instrument) . "'>$instrument</option>";
                        }
                    }
                }
                ?>
            </select><br>
            <label for="marca">Marca</label><br>
            <input type="text" name="marca" id="marca"><br>

            <label for="codigo">Código</label><br>
            <input type="text" name="codigo" id="codigo"><br>

            <label for="serie">Serie</label><br>
            <input type="text" name="serie" id="serie"><br>

            <label for="uso">Uso</label><br>
            <select name="uso" id="uso">
                <option value="1">Sí</option>
                <option value="0">No</option>
            </select><br>


            <label for="activo"></label>
            <select name="activo" id="activo">
                <option value="1">Activo</option>
                <option value="0">Inactivo</option>
            </select><br>

            <input type="submit" value="Guardar" name="create">
        </form><br>
        <a href="../index.php">index</a>
    </div>

</body>



<script>

        document.getElementById('tipo').addEventListener('change', function() {
            var tipo = this.value;
            var instrumentoSelect = document.getElementById('instrumento');


            instrumentoSelect.innerHTML = '<option value="">Seleccione un instrumento</option>';


            var instruments = {
                'percussion': ["Snare Drum", "Tenor Drums", "Bass Drum", "Platillos"],
                'woodwind': ["Flauta", "Piccolo", "Clarinete", "Saxofón alto", "Saxofón tenor", "Saxofón barítono"],
                'brass': ["Trompeta", "Trombón", "Tuba", "Melófono"]
            };

            if (tipo in instruments) {
                instruments[tipo].forEach(function(instrument) {
                    var option = document.createElement('option');
                    option.value = instrument.toLowerCase();
                    option.textContent = instrument;
                    instrumentoSelect.appendChild(option);
                });
            }
        });
    </script>

</html>