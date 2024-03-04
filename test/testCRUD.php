<?php

namespace test;
require_once __DIR__ . '/../controlador/CRUDcon.php';
require_once __DIR__ . '/../Modelo/Pelicula.php';
require_once __DIR__ . '/../Modelo/peliculaEliminada.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use PHPUnit\Framework\TestCase;
use controlador\CRUDcon;
use Modelo\Pelicula;
use Modelo\peliculaEliminada;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;



class testCRUD extends TestCase
{

    public static function setUpBeforeClass(): void
    {
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

    public function testGuardar()
    {
        $datos = [
            'id_pelicula' => '273198',
            'title' => 'pelicula',
            'sinopsis' => 'esta es una pelicula',
            'imagen_principal' => 'test.jpg'
        ];
    
        $controlador = new CRUDcon();
        $controlador->guardar($datos);
    
        $peliculaGuardada = Pelicula::where('title', 'pelicula')->first();
    
        $this->assertEquals('pelicula', $peliculaGuardada->title);
        $this->assertEquals('esta es una pelicula', $peliculaGuardada->sinopsis);
        $this->assertEquals('test.jpg', $peliculaGuardada->imagen_principal);

    }

    public function testEliminar()
    {
        // Crear una película para eliminar
        $pelicula = new Pelicula();
        $pelicula->id_pelicula = 12366;
        $pelicula->title = 'pelicula';
        $pelicula->sinopsis = 'esta es una pelicula';
        $pelicula->imagen_principal = 'test.jpg';
        $pelicula->video_principal = '';
        $pelicula->save();

        // Crear instancia del controlador
        $controlador = new CRUDcon();

        // Ejecutar el método eliminar
        $controlador->eliminar($pelicula->id);

        // Verificar que la película se haya eliminado correctamente
        $this->assertNull(Pelicula::find($pelicula->id));
    }
}
