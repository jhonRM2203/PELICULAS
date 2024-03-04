<?php

namespace Modelo;

use Illuminate\Database\Eloquent\Model;

class peliculaEliminada extends Model
{
    protected $table = 'pelicula_eliminada';
    protected $fillable = ['id_pelicula', 'title', 'sinopsis', 'imagen_pincipal', 'video_principal'];
    public $timestamps = false;
}
