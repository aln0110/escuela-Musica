<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar partitura</title>
</head>

<body>
    <div>
        <form id="editPartitura" enctype="multipart/form-data" action="../business/partituraActions.php" method="post">
            <?php
            include_once '../business/partituraBusiness.php';
            include_once '../domain/partitura.php';

            $partituraBusiness = new PartituraBusiness();
            $partitura = new Partitura();

            if (isset($_GET['id'])) {
                $idPartitura = $_GET['id'];
                $partitura = $partituraBusiness->getPartitura($idPartitura);
            }

            echo "<input type='hidden' name='id' value='" . $partitura->getIdPartitura() . "'>";

            echo "<label for='nombre'>Nombre:</label>";
            echo "<br>";
            echo "<input type='text' id='nombre' name='nombre' value='" . $partitura->getNombrePartitura() . "'>";
            echo "<br>";
            ?>

            <label for="category">Seleccione la categoría del instrumento</label><br>
            <select name="category" id="category">
                <option value="">Seleccione una categoría</option>
                <option value="percussion" <?php if (isset($_POST['category']) && $_POST['category'] == 'percussion') echo 'selected'; ?>>Percusión</option>
                <option value="woodwind" <?php if (isset($_POST['category']) && $_POST['category'] == 'woodwind') echo 'selected'; ?>>Viento madera</option>
                <option value="brass" <?php if (isset($_POST['category']) && $_POST['category'] == 'brass') echo 'selected'; ?>>Brass</option>
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
            <input type="file" name="pdf" id="pdf" accept=".pdf" onchange="updateFileName()"><br>

            <label for="estado">Estado</label>
            <select name="estado" id="estado">
                <option value="true">Activo</option>
                <option value="false">Inactivo</option>
            </select><br>

            <input type="submit" value="Actualizar" name="update">





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
    
   /*
        function updateFileName() {
            const fileInput = document.getElementById('pdf');
            const fileNameInput = document.getElementById('nombre');
            const file = fileInput.files[0];
            if (file) {
                const fileNameWithoutExtension = file.name.replace(/\.[^/.]+$/, "");
                fileNameInput.value = fileNameWithoutExtension;
            }
        }
            */
            
    </script>

</html>