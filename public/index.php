<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>star movie</title>
    <link rel="stylesheet" href="../css/nav.css">

</head>
<body>
<header>
<div class="contenedor">
<h2 class="logotipo" style="font-family: Arial; color: #ffffff;">star movie</h2>
<nav>
				<a href="crud.php">CRUD</a>
				<form action="funcionAPI.php" method="post">
                        <button type="submit" name="fetch_data">Obtener Peliculas</button>
                    </form>
			</nav>
            </div>
            </header>
	<main>
	<div class="main-content">
        <div class="container">
            <h1>Películas</h1>
            <div class="movie">
			<?php foreach ($peliculas as $pelicula): ?>
				<h3 class="titulo"><?php echo $pelicula->title; ?><img src="<?php echo $pelicula->imagen_principal; ?>" alt="<?php echo $pelicula->titulo; ?>"></h3>


				<?php endforeach; ?>
				</div>
			</div>
		</div>
	</main>

    
    <!-- <div id="movies-list">
    </div> -->
    <!-- <script src="js/main.js"></script> -->

    
    

</body>
</html>