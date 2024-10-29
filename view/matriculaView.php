<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <form id="createForm" method="post" enctype="multipart/form-data" action="../business/matriculaActions.php">

            <label for="Estuidiante">Cedula del estudiante</label><br>
            <input type="text" id="cedulaEst" name="cedulaEst" required><br>

            <label for="Curso">Sigla del curso</label><br>
            <input type="text" id="sigla" name="sigla" required><br>


            <input type="submit" value="Crear" name="create">


        </form>
    </div>

    <div>
        <form action="listCurso.php" method="get">
            <p>Aqui sale la lista de todos los cursos por estudiante</p>
            <label for="">Digite la cedula de un estudiante </label><br>
            <input type="text" name="cedulaEstudiante" id="cedulaEstudiante" required><br>
            <input type="submit" value="Buscar" name="search">
        </form>
    </div>

    <a href="../index.php">index</a>

</body>

</html>