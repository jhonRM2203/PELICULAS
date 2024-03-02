<?php
require_once '../vendor/autoload.php';
require_once '../controlador/conexionCO.php';
require_once '../controlador/pelicula_inicial.php';
require_once '../modelo/conexionMO.php';
require_once '../interfaz/interfazMO.php';
require_once '../interfaz/peliinter.php';

use Illuminate\Database\Capsule\Manager as Capsule;

use controlador\conexionCO;
use interfaz\interfazMO;
use Modelo\conexionMO;
use interfaz\peliinter;
use controlador\pelicula_inicial;


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

$apiKey = '3b096d819085ed4d20c5e86c93052903'; // API key de TMDb

$modelo = new conexionMO();
$controlador = new conexionCO($modelo);
if (isset($_POST['fetch_data'])) {
    $controlador->fetchData($apiKey);
    echo "Datos obtenidos y guardados correctamente.";
}
//dependencias

// Crear una instancia concreta de peliinter que implemente Ppeliculainterfaz
$interfaz = new peliinter();
// Inyectar la interfaz en el controlador
$controlador = new pelicula_inicial($interfaz);
// Ejecutar el método index del controlador
$controlador->index();