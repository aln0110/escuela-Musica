<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <form id"createForm" method="post" enctype="multipart/form-data" action="../business/instrumentoActions.php">
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
            <?php
            include_once '../business/instrumentoBusiness.php';
            include_once '../domain/instrumento.php';

            $instrumentoBusiness = new InstrumentoBusiness();
            $instrumento = new Instrumento();
            
            if (isset($_GET['id'])) {
                $idInstrumento = $_GET['id'];
                $instrumento = $instrumentoBusiness->getInstrumento($idInstrumento);
            }

            echo "<input type='hidden' name='id' value='" . $instrumento->getId() . "'>";


            echo "<label for='marca'>Marca</label><br>";
            echo "<input type='text' name='marca' id='marca' value='" . $instrumento->getMarca() . "'><br>";

            echo "<label for='codigo'>Código</label><br>";
            echo "<input type='text' name='codigo' id='codigo' value='" . $instrumento->getCodigo() . "'><br>";

            echo "<label for='serie'>Serie</label><br>";
            echo "<input type='text' name='serie' id='serie' value='" . $instrumento->getSerie() . "'><br>";

            echo "<label for='uso'>Uso</label><br>";
            echo "<select name='uso' id='uso'>";
            echo "<option value='1' " . ($instrumento->getUso() == 1 ? 'selected' : '') . ">Sí</option>";
            echo "<option value='0' " . ($instrumento->getUso() == 0 ? 'selected' : '') . ">No</option>";
            echo "</select><br>";

            echo "<label for='activo'>Activo</label><br>";
            echo "<select name='activo' id='activo'>";
            echo "<option value='1' " . ($instrumento->getActivo() == 1 ? 'selected' : '') . ">Activo</option>";
            echo "<option value='0' " . ($instrumento->getActivo() == 0 ? 'selected' : '') . ">Inactivo</option>";
            echo "</select><br>";

            echo "<input type='submit' value='Guardar' name='update'>";

             ?>

        </form>
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