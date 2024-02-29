<?php

// Models/pelicula.php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    protected $table = 'peliculas';
    protected $fillable = ['titulo', 'año', 'director', 'sinopsis', 'duracion', 'genero', 'idioma', 'imagen_portada', 'trailer'];
    public $timestamps = false;

    // Función para crear una nueva película
    public static function crearPelicula($datos)
    {
        return self::create($datos);
    }

    // Función para actualizar una película 
    public static function actualizarPelicula($id, $datos)
    {
        $pelicula = self::find($id);
        if ($pelicula) {
            $pelicula->fill($datos)->save();
            return $pelicula;
        }
        return null;
    }

    // Función para eliminar una película
    public static function eliminarPelicula($id)
    {
        $pelicula = self::find($id);
        if ($pelicula) {
            return $pelicula->delete();
        }
        return false;
    }

    // Ejemplo de función para obtener todas las películas
    public static function obtenerTodas()
    {
        return self::all();
    }

    // Función para buscar películas por algún criterio
    public static function buscarPorDirector($director)
    {
        return self::where('director', $director)->get();
    }
}
