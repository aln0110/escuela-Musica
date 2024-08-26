<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partitura Crear</title>
    <link rel="stylesheet" href="/view/css/table.css">

</head>
<body>
    <div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Instrumento</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../business/partituraBusiness.php';
                $partituraBusiness = new PartituraBusiness();
                $partituras = $partituraBusiness->getPartituras();

                foreach ($partituras as $partitura) {
                    echo "<tr>";
                    echo "<td>" . $partitura->getIdPartitura() . "</td>";
                    echo "<td>" . $partitura->getNombrePartitura()  . "</td>";
                    echo "<td>" . $partitura->getInstrumentoPartitura() . "</td>";
                    echo "<td>" . ($partitura->getEstadoPartitura() ? 'Activo' : 'Inactivo') . "</td>";

                    echo "<td>";
                    echo "<form method='get' action='../business/partituraActions.php'>";
                    echo "<input type='hidden' name='id' value='" . $partitura->getIdPartitura() . "'>";
                    echo "<input type='submit' value='Descargar'>";
                    echo "</form>";

                    echo "<form method='update' action='../business/partituraActions.php'>";
                    echo "<input type='hidden' name='id' value='" . $partitura->getIdPartitura() . "'>";
                    echo "<input type='submit' value='Actualizar'>";
                    echo "</form>";

                    echo "<form method='delete' action='../business/partituraActions.php'>";
                    echo "<input type='hidden' name='id' value='" . $partitura->getIdPartitura() . "'>";
                    echo "<input type='submit' value='Eliminar'>";
                    echo "</form>";
                    

                    echo "</td>";

                    echo "</tr>";
                }

                ?>

            </tbody>
        </table>
    </div>





    <div>
        <form id="createForm" enctype="multipart/form-data" action="../business/partituraActions.php" method="post">
            <label for="nombre">Digite el nombre de la partitura</label><br>
            <input type="text" name="nombre" id="nombre" value="<?php echo isset($_FILES['pdf']) ? pathinfo($_FILES['pdf']['name'], PATHINFO_FILENAME) : ''; ?>" required><br>

            <label for="category">Seleccione la categoría del instrumento</label><br>
            <select name="category" id="category">
                <option value="">Seleccione una categoría</option>
                <option value="percussion" <?php if(isset($_POST['category']) && $_POST['category'] == 'percussion') echo 'selected'; ?>>Percusión</option>
                <option value="woodwind" <?php if(isset($_POST['category']) && $_POST['category'] == 'woodwind') echo 'selected'; ?>>Viento madera</option>
                <option value="brass" <?php if(isset($_POST['category']) && $_POST['category'] == 'brass') echo 'selected'; ?>>Brass</option>
            </select><br>

            <label for="instrumento">Seleccione el instrumento</label><br>
            <select name="instrumento" id="instrumento">
                <option value="">Seleccione un instrumento</option>

                <?php
                if (isset($_POST['category'])) {
                    $category = $_POST['category'];
                    $instruments = [
                        'percussion' => ["Snare Drum", "Tenor Drums", "Bass Drum", "Platillos"],
                        'woodwind' => ["Flauta", "Piccolo", "Clarinete", "Saxofón alto", "Saxofón tenor", "Saxofón barítono"],
                        'brass' => ["Trompeta", "Trombón", "Tuba", "Melófono"]
                    ];

                    if (array_key_exists($category, $instruments)) {
                        foreach ($instruments[$category] as $instrument) {
                            echo "<option value='" . strtolower($instrument) . "'>$instrument</option>";
                        }
                    }
                }
                ?>

            </select><br>

            <br>
            <label for="pdf">Seleccione el archivo PDF</label><br>
            <input type="file" name="pdf" id="pdf" accept=".pdf" required  onchange="updateFileName()"><br>

            <label for="estado">Estado</label>
            <select name="estado" id="estado">
                <option value="true">Activo</option>
                <option value="false">Inactivo</option>
            </select><br>    

            <input type="submit" value="Crear" name="create">
        </form>
    </div>
</body>

<script>

    document.getElementById('category').addEventListener('change', function() {
        const category = this.value;
        const instrumentoSelect = document.getElementById('instrumento');


        instrumentoSelect.innerHTML = '<option value="">Seleccione un instrumento</option>';


        if (!category) return;


        const instruments = {
            'percussion': ["Snare Drum", "Tenor Drums", "Bass Drum", "Platillos"],
            'woodwind': ["Flauta", "Piccolo", "Clarinete", "Saxofón alto", "Saxofón tenor", "Saxofón barítono"],
            'brass': ["Trompeta", "Trombón", "Tuba", "Melófono"]
        };


        if (instruments[category]) {
            instruments[category].forEach(function(instrument) {
                const option = document.createElement('option');
                option.value = instrument.toLowerCase();
                option.textContent = instrument;
                instrumentoSelect.appendChild(option);
            });
        }
    });

        function updateFileName() {
            const fileInput = document.getElementById('pdf');
            const fileNameInput = document.getElementById('nombre');
            const file = fileInput.files[0];
            if (file) {
                const fileNameWithoutExtension = file.name.replace(/\.[^/.]+$/, "");
                fileNameInput.value = fileNameWithoutExtension;
            }
        }
    </script>
</html>