<?php

namespace Controlador;

require_once __DIR__ . '/../Modelo/conexionMO.php';

use Modelo\conexionMO;
use interfaz\interfazMO;

class conexionCO {

    private $modelo;

    public function __construct($modelo) {
        $this->modelo = $modelo; // Inicializa la propiedad $modelo
    }

    public function fetchData($apiKey) {
        $movies = $this->modelo->fetchMovies($apiKey);

        foreach ($movies as $movie) {
            // Verificar si la película ya existe en la base de datos
            $pelicula = conexionMO::where('id_pelicula', $movie['id_pelicula'])->first();

            // Si la película no existe, la insertamos
            if (!$pelicula) {
                $pelicula = new conexionMO();
                $pelicula->id_pelicula = $movie['id'];
                $pelicula->title = $movie['title'];
                $pelicula->sinopsis = $movie['overview'];
                $pelicula->imagen_principal = $movie['poster_path'];
                $pelicula->save();
            }

            // Obtener y actualizar el video principal de la película
            $videoKey = $this->modelo->fetchVideoKey($movie['id_pelicula'], $apiKey);
            if ($videoKey !== '') {
                $pelicula->video_principal = $videoKey;
                $pelicula->save();
            }
        }
    }
    public function setModelo($modelo)
{
    $this->modelo = $modelo;
}
}
