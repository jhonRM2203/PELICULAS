<?php

namespace Test\Modelo;
require_once __DIR__ . '/../Modelo/conexionMO.php';
require_once __DIR__ . '/../interfaz/peliculainterfaz.php';
use Illuminate\Database\Capsule\Manager as Capsule;
use PHPUnit\Framework\TestCase;
use Modelo\conexionMO;

class testAPI extends TestCase
{
    protected $apiKey = '3b096d819085ed4d20c5e86c93052903';

    protected function setUp(): void
    {
        parent::setUp();

        $capsule = new Capsule;
        $capsule->addConnection([
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'peliculas1',
            'username'  => 'root',
            'password'  => '',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]);
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }

    public function testFetchMovies()
    {
        $conexionMO = new conexionMO();
        $movies = $conexionMO>fetchMovies($this->apiKey);

        // Verificar que se obtuvieron películas
        $this->assertNotEmpty($movies);

        // Verificar que las películas tienen los campos necesarios
        foreach ($movies as $movie) {
            $this->assertArrayHasKey('id_pelicula', $movie);
            $this->assertArrayHasKey('title', $movie);
            $this->assertArrayHasKey('sinopsis', $movie);
            $this->assertArrayHasKey('imagen_principal', $movie);
        }
    }
}