<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>peliculas</title>
    <link rel="stylesheet" href="../css/crud.css">
    
</head>
<body>
    <header>
        <div class="container2">
            <nav>
            <img src="../logo/Free_Sample_By_Wix.jpg" alt="">
                    <a href="funcionAPI.php">Inicio</a><br>
                    <a href="?accion=crear" class="btn btn-primary mb-3">crear</a>
            </nav>
        </div>
    </header>
    <div class="container">
        
        <table class="table" style="color: white;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Sinopsis</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($peliculas as $pelicula): ?>
                    <tr>
                        <td><?php echo $pelicula->id; ?></td>
                        <td><?php echo $pelicula->title; ?></td>
                        <td><?php echo $pelicula->sinopsis; ?></td>
                        <td><img src="<?php echo $pelicula->imagen_principal; ?>" alt="Imagen de la película" style="max-width: 100px; max-height: 100px;"></td>
                        <td>
                            <a href="?accion=editar&id=<?php echo $pelicula->id; ?>" class="btn btn-primary btn-sm">Editar</a>
                            <br><br>
                            <a href="#" class="btn btn-danger btn-sm" onclick="confirmarEliminar(<?php echo $pelicula->id ?>)">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script>
    function confirmarEliminar(id) {
        if (confirm('¿Estás seguro de que quieres eliminar esta película?')) {
            window.location.href = 'funcionCRUD.php?accion=eliminar&id=' + id;
        }
    }
</script>
</body>
</html>
