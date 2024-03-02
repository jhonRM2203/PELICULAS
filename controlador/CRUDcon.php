<?php

namespace controlador;
include __DIR__ . '/../Modelo/Pelicula.php';

use Modelo\Pelicula;
use Illuminate\Database\Capsule\Manager as Capsule;

class CRUDcon{
    public function index()
    {
        $peliculas = Pelicula::orderByDesc('id')->get();
        include __DIR__ . '/../public/crud.php';
    }

    public function crear()
    {
        include __DIR__ . '/../public/crear.php';
    }

    public function guardar($datos)
    {
    $pelicula = new Pelicula();
    $pelicula->id_pelicula = $datos['id_pelicula'];
    $pelicula->title = $datos['title'];
    $pelicula->sinopsis = $datos['sinopsis'];
    $pelicula->imagen_principal = $datos['imagen_principal'];
    $pelicula->save();
    header('Location: funcionCRUD.php');
    }

    public function editar($id)
    {
        $pelicula = Pelicula::find($id);
        include __DIR__ . '/../public/editar.php';
    }

    public function actualizar($id)
    {
        $pelicula = Pelicula::find($id);
        $pelicula->title = $_POST['title'];
        $pelicula->sinopsis = $_POST['sinopsis'];
        $pelicula->imagen_principal = $_POST['imagen_principal'];
        $pelicula->save();
        header('Location: funcionCRUD.php');
    }

    public function eliminar($id)
    {
        // Obtener la película a eliminar
    $pelicula = Pelicula::find($id);
    if (!$pelicula) {
        // Película no encontrada, redirigir a la página principal
        header('Location: funcionCRUD.php');
        exit();
    }
    // Mostrar un mensaje de confirmación
    echo "<script>alert('La película se elimino.');</script>";

        // Esperar 5 segundo antes de redirigir
        echo "<meta http-equiv='refresh' content='0.5;url=funcionCRUD.php'>";

    // Eliminar la película
    $pelicula->delete();
}
}