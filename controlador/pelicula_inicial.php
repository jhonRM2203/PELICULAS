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

        // Obtener la dirección IP del usuario
        $ip = $_SERVER['REMOTE_ADDR'];

        // Guardar la dirección IP en un archivo de texto
        $file = 'traffic.txt';
        $data = "Usuario con IP $ip visitó la página en " . date('Y-m-d H:i:s') . "\n";
        file_put_contents($file, $data, FILE_APPEND);


        // Registro de una métrica de tiempo
        $start_time = microtime(true);

        // Lógica del controlador
        $peliculas = $this->interfaz->obtenerTodas();

        // Calcular el tiempo de ejecución
        $end_time = microtime(true);
        $execution_time = $end_time - $start_time;

        // Almacenar la métrica en un archivo de texto
        $file = 'metrics.txt';
        $data = "Tiempo de ejecución de la acción peliculas: $execution_time segundos\n";
        file_put_contents($file, $data, FILE_APPEND);


        $peliculas = $this->interfaz->obtenerTodas();
        include __DIR__ . ('/../public/index.php');
    }
}
