<?php

pruebas.php

require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/vendor/autoload.php';

use Models\Pelicula;

$datos = [
    'titulo' => 'Spidercomo d-Man: No Way Home',
    'año' => 2021,
    'director' => 'Jon Watts',
    'sinopsis' => 'Con la identidad de Spider-Man ahora revelada, Peter le pide ayuda al Doctor Strange. Cuando un hechizo sale mal, empiezan a aparecer enemigos peligrosos de otros mundos, lo que obliga a Peter a descubrir lo que realmente significa ser Spider-Man.', 
    'duracion' => '2h 28m',
    'genero'   => 'aventura',
    'idioma'   => 'ingles',
    'imagen_portada' => 'https://www.imdb.com/title/tt10872600/mediaviewer/rm3936939521/?ref_=tt_ov_i', 
    'trailer'  => 'hhttps://www.imdb.com/video/vi3348546073/?playlistId=tt10872600&ref_=tt_ov_vi',
];

// función para crear una nueva película
$peliculaCreada = Pelicula::crearPelicula($datos);

if ($peliculaCreada) {
    echo "La película se creó correctamente.";
} else {
    echo "Hubo un error al crear la película.";
}