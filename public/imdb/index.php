<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>star movie</title>
    <link rel="stylesheet" href="../../css/nav.css">
    <link rel="stylesheet" href="../../css/styles.css">
</head>
<body>
<header>
<div class="contenedor">
<h2 class="logotipo" style="font-family: Arial;">star movie</h2>
<nav>
				<a href="#" class="activo">Inicio</a>
				<a href="#">Programas</a>
				<a href="#">Películas</a>
				<a href="#">Más Recientes</a>
				<a href="#">Mi lista</a>
			</nav>
            </div>
            </header>
	<main>
        
		<div class="pelicula-principal">
			<div class="contenedor">
            <button role="button" id="flecha-izquierda" class="flecha-izquierda"><i class="fas fa-angle-left"></i></button>
            <div class="contenedor-carousel">
				<h3 class="titulo">Capitana Marvel</h3>
				<p class="descripcion">
					La guerrera Vers no recuerda su pasado, el cual vuelve a ella en sueños. A pesar de sus problemas para controlar sus emociones y, con ellas, sus poderes, la Inteligencia Suprema le permite participar en una misión. Con la ayuda de Nick Fury tratará de descubrir los secretos de su pasado mientras aprovecha sus poderes para acabar con la guerra.
				</p>
				<button role="button" class="boton"><i class="fas fa-play"></i>Reproducir</button>
				<button role="button" class="boton"><i class="fas fa-info-circle"></i>Más información</button>
			</div>
		</div>
	</main>

    
    <div id="movies-list">
    </div>
    <script src="js/main.js"></script>

    <script>
        async function fetchData() {
            const url = 'https://imdb146.p.rapidapi.com/v1/find/?query=marvel';
const options = {
    method: 'GET',
    headers: {
        'X-RapidAPI-Key': 'ab2f088e9fmsh15ccad158ef882cp1290a9jsn8425f73bffe3',
        'X-RapidAPI-Host': 'imdb146.p.rapidapi.com'
    }
};

try {
    const response = await fetch(url, options);
    const result = await response.json(); 

    const moviesList = document.getElementById('movies-list');
    moviesList.innerHTML = ''; 

    if (result && result.titleResults && result.titleResults.results.length > 0) {
        result.titleResults.results.forEach(movie => {
            const movieElement = document.createElement('div');
            movieElement.classList.add('movie');

            // Agregar imagen de la película
            if (movie.titlePosterImageModel && movie.titlePosterImageModel.url) {
                const image = document.createElement('img');
                image.src = movie.titlePosterImageModel.url;
                image.alt = movie.titleNameText;
                movieElement.appendChild(image);
            }

            // Agregar título de la película
            const title = document.createElement('p');
            title.textContent = movie.titleNameText;
            movieElement.appendChild(title);

            // Agregar año de lanzamiento
            const releaseYear = document.createElement('p');
            releaseYear.textContent = `Año: ${movie.titleReleaseText}`;
            movieElement.appendChild(releaseYear);

           

            moviesList.appendChild(movieElement);
        });
    } else {
        moviesList.innerHTML = '<p>No se encontraron resultados.</p>';
    }
} catch (error) {
    console.error(error);
}


        }

        function displayMovies(movies) {
            const moviesList = document.getElementById('movies-list');
            if (movies && movies.length > 0) {
                moviesList.innerHTML = '<h2>Películas encontradas:</h2>';
                const ul = document.createElement('ul');
                movies.forEach(movie => {
                    const li = document.createElement('li');
                    li.textContent = movie.title;
                    ul.appendChild(li);
                });
                moviesList.appendChild(ul);
            } else {
                moviesList.innerHTML = '<p>No se encontraron resultados.</p>';
            }
        }

       
        fetchData();
    </script>

</body>
</html>
