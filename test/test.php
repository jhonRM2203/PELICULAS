<?php
namespace Tests\Modelo;

use Illuminate\Database\Capsule\Manager as Capsule;
use PHPUnit\Framework\TestCase;
use Modelo\ApiModelo;

class ApiModeloTest extends TestCase
{
    protected $apiKey = 'ab2f088e9fmsh15ccad158ef882cp1290a9jsn8425f73bffe3';

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
        $apiModelo = new ApiModelo();
        $movies = $apiModelo->fetchMovies($this->apiKey);

        // Verificar que se obtuvieron películas
        $this->assertNotEmpty($movies);

        // Verificar que las películas tienen los campos necesarios
        foreach ($movies as $movie) {
            $this->assertArrayHasKey('idpelicula', $movie);
            $this->assertArrayHasKey('titulo', $movie);
            $this->assertArrayHasKey('sinopsis', $movie);
            $this->assertArrayHasKey('imagen_principal', $movie);
        }
    }

    public function testFetchVideoKey()
    {
        $apiModelo = new ApiModelo();
        $movieId = 550; // Example movie ID
        $videoKey = $apiModelo->fetchVideoKey($movieId, $this->apiKey);

        // Verificar que se obtuvo la clave del video
        $this->assertNotEmpty($videoKey);
    }
}