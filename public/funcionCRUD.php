<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../controlador/CRUDcon.php';
use Illuminate\Database\Capsule\Manager as Capsule;
use controlador\CRUDcon;


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

$controlador = new CRUDcon();

if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];
} else {
    $accion = 'index';
}

switch ($accion) {
    case 'crear':
        $controlador->crear();
        break;
    case 'guardar':
        $controlador->guardar($_POST);
        break;
    case 'editar':
        $controlador->editar($_GET['id']);
        break;
    case 'actualizar':
        $controlador->actualizar($_GET['id']);
        break;
    case 'eliminar':
        $controlador->eliminar($_GET['id']);
        break;
    default:
        $controlador->index();
        break;
}