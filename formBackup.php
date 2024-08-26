<form id="createForm" enctype="multipart/form-data" action="/business/partituraActions.php" method="post">
            <label for="nombre">Digite el nombre de la partitura</label><br>
            <input type="text" name="nombre" id="nombre" value="<?php echo isset($_FILES['pdf']) ? pathinfo($_FILES['pdf']['name'], PATHINFO_FILENAME) : ''; ?>" required><br>

            <label for="category">Seleccione la categoría del instrumento</label><br>
            <select name="category" id="category" onchange="this.form.submit()">
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
            <input type="file" name="pdf" id="pdf" accept=".pdf" required onchange="updateFileName()"><br>

            <label for="estado">Estado</label>
            <select name="estado" id="estado">
                <option value="true">Activo</option>
                <option value="false">Inactivo</option>
            </select><br>    

            <input type="submit" value="Crear" name="create">
        </form>