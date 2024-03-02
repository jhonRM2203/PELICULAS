<?php

namespace interfaz;
require_once 'peliculainterfaz.php';
require_once __DIR__ . '/../Modelo/Pelicula.php';


use Modelo\Pelicula;

class peliinter implements peliculainterfaz
{
    public function obtenerTodas()
    {
        return Pelicula::all();
    }
}
