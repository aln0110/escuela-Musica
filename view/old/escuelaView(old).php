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
                <th>Cedula Juridica</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th>Propietario</th>
                <th>Estado</th>
                <th>Accion</th>
            </thead>
            <tbody id="recordsTableBody">
            </tbody>
        </table>
    </div>

    <div>   
        <form id="createForm">


            <label for="nombre">Nombre</label> <br>
            <input type="text" name="nombre" id="nombre" required><br>

            <label for="cedulaJuridica">Cedula Juridica</label><br>
            <input type="text" name="cedulaJuridica" id="cedulaJuridica"><br>

            <label for="correo">Correo</label><br>
            <input type="text" name="correo" id="correo"><br>

            <label for="telefono">Telefono</label><br>
            <input type="text" name="telefono" id="telefono"><br>

            <label for="propietario">Propietario</label><br>
            <input type="text" name="propietario" id="propietario"><br>

            <label for="estado">Estado</label>
            <select name="estado" id="estado">
                <option value="true">Verdadero</option>
                <option value="false">Falso</option>
            </select> <br>
        
            <input type="submit" value="Crear">
        </form>
    </div>

    <script>

        function fetchRecords() {
            fetch('http://localhost:8080/api/getAll.php')
                .then(response => response.json())
                .then(records => {
                    const tableBody = document.getElementById('recordsTableBody');
                    tableBody.innerHTML = ''; 
                    records.forEach(record => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td class="record-id">${record.id}</td>
                            <td>${record.nombre}</td>
                            <td>${record.cedulajuridica}</td>
                            <td>${record.correo}</td>
                            <td>${record.telefono}</td>
                            <td>${record.propietario}</td>
                            <td>${record.estado}</td>
                            <td><button onclick="deleteRecord(this)">Eliminar</button></td>
                            <td><button onclick="window.location.href='editEscuelaView.php/${record.id}'">Actualizar</button></td>
                        `;
                        tableBody.appendChild(row);
                    });
                })
                .catch(error => {
                    const tableBody = document.getElementById('recordsTableBody');
                    tableBody.innerHTML = '<tr><td colspan="8">No es posible obtener los datos.</td></tr>';
                });
        }

        document.getElementById('createForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const formData = {
                nombre: document.getElementById('nombre').value,
                cedulajuridica: document.getElementById('cedulaJuridica').value,
                correo: document.getElementById('correo').value,
                telefono: document.getElementById('telefono').value,
                propietario: document.getElementById('propietario').value,
                estado: document.getElementById('estado').value === 'true'
            };

            fetch('http://localhost:8080/api/create.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(formData)
            })
            .then(response => response.json())
            .then(data => {
                alert('Se guardo correctamente');
                fetchRecords(); 
            })
            .catch(error => {
                alert('Error creando');
            });
        });

        function deleteRecord(button) {
            const row = button.closest('tr');
            const id = row.querySelector('.record-id').textContent;

            if (confirm('¿Está seguro que quiere eliminar?')) {
                fetch('http://localhost:8080/api/LogicalDelete.php?id=' + id, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                })
                .then(response => response.json())
                .then(data => {
                    alert('Registro eliminado correctamente');
                    fetchRecords(); 
                })
                .catch(error => {
                    alert('Error al eliminar el registro.');
                });
            }
        }



        fetchRecords();
    </script>
</body>
</html>
