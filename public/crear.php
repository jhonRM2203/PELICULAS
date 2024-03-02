<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>crear</title>
    <link rel="stylesheet" href="../css/crear.css">
</head>
<body>
    <header>
        <div class="container2">
            <nav>
            <img src="../logo/Free_Sample_By_Wix.jpg" alt="">
                  
                    <li><a href="funcionAPI.php">Inicio</a><br>
                    <li><a href="funcionCRUD.php">crud</a>
                
            </nav>
        </div>
    </header>
    <div class="container">
        <h1>crear</h1>
        <form method="POST" action="funcionCRUD.php?accion=guardar">
            <div class="form-group">
                <label for="id_pelicula">ID Pelicula:</label>
                <input type="text" class="form-control" id="id_pelicula" name="id_pelicula" required>
            </div>
            <div class="form-group">
                <label for="title">Título:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="sinopsis">Sinopsis:</label>
                <textarea class="form-control" id="sinopsis" name="sinopsis" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="imagen_principal">URL Imagen:</label>
                <input type="text" class="form-control" id="imagen_principal" name="imagen_principal" required>
            </div>
            <input type="submit" value="Guardar">
        </form>
    </div>
</body>
</html>
