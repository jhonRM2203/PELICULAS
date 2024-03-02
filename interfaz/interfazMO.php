<?php

namespace interfaz;

interface interfazMO {
    public function fetchMovies($apiKey);
    public function fetchVideoKey($movieId, $apiKey);
}
