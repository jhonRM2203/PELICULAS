<?php

namespace controlador;

use interfaz\peliculainterfaz;

class pelicula_inicial
{
    protected $interfaz;

    public function __construct(peliculainterfaz $interfaz)
    {
        $this->interfaz = $interfaz;
    }

    public function index()
    {
        $peliculas = $this->interfaz->obtenerTodas();
        include __DIR__ . ('/../public/index.php');
    }
}
