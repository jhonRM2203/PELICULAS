<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar</title>
    <link rel="stylesheet" href="../css/editar.css">
</head>
<body>
    <header>
        <div class="container2">
            <nav>
            <img src="../logo/Free_Sample_By_Wix.jpg" alt="">
                  
                    <a href="funcionAPI.php">Inicio</a>
                    <a href="funcionCRUD.php">crud</a>
                
            </nav>
        </div>
    </header>
    
    <div class="container">
        <h1>Editar</h1>
        <form action="funcionCRUD.php?accion=actualizar&id=<?php echo $pelicula->id; ?>" method="POST">
            <div class="form-group">
                <label for="title">Título:</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo $pelicula->title; ?>" required>
            </div>
            <div class="form-group">
                <label for="sinopsis">Sinopsis:</label>
                <textarea class="form-control" id="sinopsis" name="sinopsis" rows="3" required><?php echo $pelicula->sinopsis; ?></textarea>
            </div>
            <div class="form-group">
                <label for="imagen_principal">URL Imagen:</label>
                <input type="text" class="form-control" id="imagen_principal" name="imagen_principal" value="<?php echo $pelicula->imagen_principal; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
</body>
</html>
